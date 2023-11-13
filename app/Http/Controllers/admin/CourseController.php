<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('user')->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.courses.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $course = Course::create($request->all());

            DB::commit();

            return redirect()->route('admin.courses.show', $course->id)->with('success', 'Curso creado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.courses.index')->with('error', 'Error al crear el curso.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::with('user')->find($id);

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Curso no encontrado.');
        }

        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $users = User::all();

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Curso no encontrado.');
        }

        return view('admin.courses.edit', compact('course', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $course = Course::find($id);

            if (!$course) {
                return redirect()->route('admin.courses.index')->with('error', 'Curso no encontrado.');
            }

            $course->update($request->all());

            DB::commit();

            return redirect()->route('admin.courses.show', $course->id)->with('success', 'Curso actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.courses.index')->with('error', 'Error al actualizar el curso.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $course = Course::find($id);

            if (!$course) {
                return redirect()->route('admin.courses.index')->with('error', 'Curso no encontrado.');
            }

            $course->delete();

            DB::commit();

            return redirect()->route('admin.courses.index')->with('success', 'Curso eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.courses.index')->with('error', 'Error al eliminar el curso.');
        }
    }
}
