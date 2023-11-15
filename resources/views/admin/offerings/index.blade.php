@extends('adminlte::page')

@section('title', 'Offering')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @can('offerings.create')
                    <div class="card-header">Lista de Ofertas <a href="{{ route('admin.offerings.create') }}" class="btn btn-primary btn-sm float-right">Crear Oferta</a></div>
                    @endcan()
                    <div class="card-body">
                        @if($offerings->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Oferta</th>
                                        <th>Clase</th>
                                        <th>Fecha de Creación</th>
                                        <th>Fecha de Actualización</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($offerings as $offering)
                                        <tr>
                                            <td>{{ $offering->id }}</td>
                                            <td>{{ $offering->offering }}</td>
                                            <td>{{ $offering->course->name }}</td>
                                            <td>{{ $offering->created_at }}</td>
                                            <td>{{ $offering->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.offerings.show', $offering->id) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay ofertas registradas.</p>
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
