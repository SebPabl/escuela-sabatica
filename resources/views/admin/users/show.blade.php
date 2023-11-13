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
                    <div class="card-header">Detalles del Usuario</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
                            <li class="list-group-item"><strong>Nombre:</strong> {{ $user->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>Rol:</strong> {{ $user->role ? $user->role->name : 'N/A' }}</li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Volver a la Lista</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?')">Eliminar</button>
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
