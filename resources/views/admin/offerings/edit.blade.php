@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Oferta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.offerings.update', $offering->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="course_id">Curso:</label>
                                <select name="course_id" id="course_id" class="form-control">
                                    <option value="">Seleccionar Curso</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ $course->id == $offering->course_id ? 'selected' : '' }}>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="offering">Ofrenda:</label>
                                <input type="text" name="offering" id="offering" class="form-control" value="{{ old('offering', $offering->offering) }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="{{ route('admin.offerings.show', $offering->id) }}" class="btn btn-secondary">Cancelar</a>
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
