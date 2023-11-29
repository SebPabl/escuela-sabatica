@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de la Ofrenda</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ID:</strong> {{ $offering->id }}</li>
                            <li class="list-group-item"><strong>Ofrenda:</strong> {{ $offering->offering }}</li>
                            <li class="list-group-item"><strong>Clase:</strong> {{ $offering->course->name ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Fecha de Creación:</strong> {{ $offering->created_at }}</li>
                            <li class="list-group-item"><strong>Fecha de Actualización:</strong> {{ $offering->updated_at }}</li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('admin.offerings.index') }}" class="btn btn-primary">Volver a la Lista</a>
                            @can('offerings.edit')
                            <a href="{{ route('admin.offerings.edit', $offering->id) }}" class="btn btn-warning">Editar</a>
                            @endcan()
                            @can('offerings.destroy')
                            <form action="{{ route('admin.offerings.destroy', $offering->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta oferta?')">Eliminar</button>
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
