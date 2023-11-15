@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Asistencias</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.attendances.store') }}">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Estudiante</th>
                                        @foreach($saturdays as $saturday)
                                            <th>{{ $saturday->format('d/m') }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        @foreach($saturdays as $saturday)
                                            <td>
                                                <input type="hidden" name="attendance[{{ $student->id }}][{{ $saturday->format('Y-m-d') }}]" value="0">
                                                <input type="checkbox" name="attendance[{{ $student->id }}][{{ $saturday->format('Y-m-d') }}]" value="1"
                                                    @if(isset($attendanceStates[$student->id][$saturday->format('Y-m-d')]['state']) && $attendanceStates[$student->id][$saturday->format('Y-m-d')]['state'])
                                                        checked
                                                    @endif
                                                >
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
