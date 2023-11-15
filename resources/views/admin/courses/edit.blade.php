@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Curso</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.courses.update', $course->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="user_id">Usuario:</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Seleccionar Usuario</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $course->user_id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Nombre del Curso:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-secondary">Cancelar</a>
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