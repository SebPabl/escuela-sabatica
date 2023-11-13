@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Curso</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ID:</strong> {{ $course->id }}</li>
                            <li class="list-group-item"><strong>Nombre del Curso:</strong> {{ $course->name }}</li>
                            <li class="list-group-item"><strong>Usuario:</strong> {{ $course->user ? $course->user->name : 'N/A' }}</li>
                            <li class="list-group-item"><strong>Fecha de Creación:</strong> {{ $course->created_at }}</li>
                            <li class="list-group-item"><strong>Fecha de Actualización:</strong> {{ $course->updated_at }}</li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">Volver a la Lista</a>
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
