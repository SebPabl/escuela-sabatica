@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Nueva Ofrenda</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.offerings.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="course_id">ID del Curso:</label>
                                <select name="course_id" id="course_id" class="form-control">
                                    <option value="">Seleccionar Curso</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="offering">Ofrenda:</label>
                                <input type="text" name="offering" id="offering" class="form-control" value="{{ old('offering') }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Registrar Ofrenda</button>
                                <a href="{{ route('admin.offerings.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autoNumeric/4.6.4/autoNumeric.min.js"></script>
    <script>
        $(document).ready(function () {
            new AutoNumeric('#offering', {
                currencySymbol: '$',
                digitGroupSeparator: ',',
                decimalCharacter: '.',
                allowDecimalPadding: false,
                decimalPlaces: 2,
            });
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
