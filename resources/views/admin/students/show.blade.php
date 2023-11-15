@extends('adminlte::page')

@section('title', 'Usuarios')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Estudiante</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nombre:</strong> {{ $student->name }}</li>
                            <li class="list-group-item"><strong>Apellido:</strong> {{ $student->lastname }}</li>
                            <li class="list-group-item"><strong>Curso:</strong> {{ $student->course ? $student->course->name : 'N/A' }}</li>
                            <li class="list-group-item"><strong>Edad:</strong> {{ $student->age }}</li>
                            <li class="list-group-item"><strong>Dirección:</strong> {{ $student->address ?: 'N/A' }}</li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('admin.students.index') }}" class="btn btn-primary">Volver a la Lista</a>
                            @can('students.edit')
                            <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                            @endcan()
                            @can('students.destroy')
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?')">Eliminar</button>
                            </form>
                            @endcan()
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
