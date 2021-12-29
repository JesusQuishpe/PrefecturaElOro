@extends('laboratorio.plantillas.master')
@section('title', 'Coproparasitario-Editar')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Coproparasitario';
    $data->examen = 'coproparasitario';
    $data->opcion = 'editar'; //Tiene que ser igual al de la url
    $data->showInfo = false;
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])

    <div>
        <table id="tb-coproparasitario" class="table">
            <thead class="table-dark text-center">
                <tr>
                    <td>Paciente</td>
                    <td>Fecha de consulta</td>
                    <td>Doctor</td>
                    <td>Última modificación</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @if (isset($datos) && count($datos) > 0)

                    @foreach ($datos as $dato)
                        <tr class="text-center align-middle">
                            <td>{{ $dato->nombres . ' ' . $dato->apellidos }}</td>
                            <td>{{ $dato->fecha_cita }}</td>
                            <td>{{ $dato->nombres }}</td>
                            <td>{{ $dato->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('coproparasitario.edit', ['id_coproparasitario'=>$dato->id]) }}" class="btn btn-primary me-2">Editar</a>
                                    <form action="{{ route('coproparasitario.delete', ['id_coproparasitario'=>$dato->id]) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @isset($datos)
            <div class="d-flex justify-content-center mt-2">
                {{$datos->links()}}
            </div>
        @endisset
    </div>
@endsection
