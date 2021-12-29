@extends('laboratorio.plantillas.master')
@section('title', 'Historial')
@section('content')
    <h1 id="tipo_examen_title">Consultar historial médico del paciente</h1>

    <form action="{{ route('historial.index') }}" method="GET">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <span>Buscar:</span>
            <input class="form-control w-50 mx-2" name="texto" type="text" id="input-buscar"
                placeholder="Cédula o nombres del paciente" value="{{ isset($texto) ? $texto : '' }}">
            <button id="btn-buscar" type="submit" class="btn btn-primary">Buscar</button>
        </div>

        <div id="spinner" class="spinner-container">
            <img class="spinner" src="{{ asset('images/gif/spinner.gif') }}" width="48px" height="48px"></img>
            <span>Buscando paciente...</span>
        </div>

    </form>

    <div>
        <table id="tb-historial" class="table">
            <thead class="table-dark text-center">
                <tr>
                    <td>Doctor</td>
                    <td>Examen</td>
                    <td>Fecha</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>

                @if (isset($datos) && count($datos) > 0)
                    @foreach ($datos as $dato)
                        <tr class="text-center align-middle">
                            <td>{{ $dato->doctor }}</td>
                            <td>{{ $dato->examen }}</td>
                            <td>{{ $dato->fecha }}</td>

                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('historial.ver', ['idTipoExamen' => $dato->id_tipo, 'idExamen' => $dato->id]) }}"
                                        class="btn btn-primary">Ver</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center align-middle">
                        <td colspan="4">No hay resultados</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @isset($datos)
            <div class="d-flex justify-content-center mt-2">
                {{ $datos->links() }}
            </div>
        @endisset
    </div>
@endsection
