<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offering;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class OfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos los registros de la tabla 'offerings'
        $offerings = Offering::with('course')->get();

        // Retorna la vista 'index' con los datos recuperados
        return view('admin.offerings.index', compact('offerings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.offerings.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'offering' => ['required', 'regex:/^\$?\s?\d{1,3}(,\d{3})*(\.\d{1,2})?$/', 'max:255'],
        ]);

        // Asignar valores a los campos del modelo Offering
        $offering = new Offering();
        $offering->course_id = $request->course_id;
        $offering->offering = $request->offering;
        
        // Guardar la oferta
        $offering->save();

        if($offering->save()) {
            return redirect()->route('admin.offerings.index')->with('success', 'Oferta creada correctamente.');
        } else {
            dd($offering->errors());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offering = Offering::with('course')->find($id); // Obtener el curso por su ID

        return view('admin.offerings.show', compact('offering'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offering = Offering::find($id);
        $courses = Course::all();

        if (!$offering) {
            return redirect()->route('admin.offerings.index')->with('error', 'Oferta no encontrada.');
        }

        return view('admin.offerings.edit', compact('offering', 'courses'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'offering' => ['required', 'regex:/^\$?\s?\d{1,3}(,\d{3})*(\.\d{1,2})?$/', 'max:255'],
        ]);
    
        try {
            // Encontrar la oferta por su ID
            $offering = Offering::findOrFail($id);
    
            if (!$offering) {
                return redirect()->route('admin.offerings.index')->with('error', 'Oferta no encontrada.');
            }
    
            // Actualizar los datos de la oferta con los nuevos valores
            $offering->course_id = $request->input('course_id');
            $offering->offering = $request->input('offering');
            // Asegúrate de ajustar los nombres de los campos según tu modelo Offering
    
            $offering->save(); // Guardar los cambios en la base de datos
    
            return redirect()->route('admin.offerings.show', $offering->id)->with('success', 'Oferta actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.offerings.index')->with('error', 'Error al actualizar la oferta.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $offering = Offering::findOrFail($id);
    
            if (!$offering) {
                return redirect()->route('admin.offerings.index')->with('error', 'Oferta no encontrada.');
            }
            
            $offering->delete();
    
            return redirect()->route('admin.offerings.index')->with('success', 'Oferta eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.offerings.index')->with('error', 'Error al eliminar la oferta.');
        }
    }
}
