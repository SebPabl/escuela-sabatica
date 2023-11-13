@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Lista de Cursos <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm float-right">Crear Cursos</a></div>
                    <div class="card-body">
                        @if(optional($courses)->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Fecha de Creación</th>
                                        <th>Fecha de Actualización</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{ $course->id }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->user ? $course->user->name : 'N/A' }}</td>
                                            <td>{{ $course->created_at }}</td>
                                            <td>{{ $course->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay cursos registrados.</p>
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