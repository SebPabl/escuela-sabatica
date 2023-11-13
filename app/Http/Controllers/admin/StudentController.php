<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('course')->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $student = Student::create($request->all());

            DB::commit();

            return redirect()->route('admin.students.index')->with('success', 'Estudiante creado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.students.index')->with('error', 'Error al crear el estudiante.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('course')->find($id);

        if (!$student) {
            return redirect()->route('admin.students.index')->with('error', 'Estudiante no encontrado.');
        }

        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::all();

        return view('admin.students.edit', compact('student', 'courses'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $student = Student::find($id);
            
            if (!$student) {
                return redirect()->route('admin.students.index')->with('error', 'Estudiante no encontrado.');
            }

            $student->update($request->all());

            DB::commit();

            return redirect()->route('admin.students.show', $student->id)->with('success', 'Estudiante actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.students.index')->with('error', 'Error al actualizar el estudiante.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $student = Student::find($id);

            if (!$student) {
                return redirect()->route('admin.students.index')->with('error', 'Estudiante no encontrado.');
            }

            $student->delete();

            DB::commit();

            return redirect()->route('admin.students.index')->with('success', 'Estudiante eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.students.index')->with('error', 'Error al eliminar el estudiante.');
        }
    }
}
