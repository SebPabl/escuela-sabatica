@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Nuevo Curso</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.courses.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">Usuario:</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Seleccionar Usuario</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Nombre del Curso:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Crear Curso</button>
                                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancelar</a>
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