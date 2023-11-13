@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Student</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Lista de Estudiantes <a href="{{ route('admin.students.create') }}" class="btn btn-primary btn-sm float-right">Crear Estudiante</a></div>

                    <div class="card-body">
                        @if(count($students) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Curso</th>
                                        <th>Edad</th>
                                        <th>Dirección</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>{{ $student->course ? $student->course->name : 'N/A' }}</td>
                                            <td>{{ $student->age }}</td>
                                            <td>{{ $student->address ?: 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin.students.show',$student->id ) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay estudiantes registrados.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
