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
                    <div class="card-header">Lista de Usuarios
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm float-right">Crear Usuario</a>
                    </div>

                    <div class="card-body">
                        @if(optional($users)->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role ? $user->role->name : 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.show',$user->id ) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay usuarios registrados.</p>
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
