@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Estudiante</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.students.update', $student->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="course_id">Curso:</label>
                                <select name="course_id" id="course_id" class="form-control">
                                    <option value="">Seleccionar Curso</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ $course->id == $student->course_id ? 'selected' : '' }}>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Apellido:</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $student->lastname) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="age">Edad:</label>
                                <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $student->age) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Dirección:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $student->address) }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
