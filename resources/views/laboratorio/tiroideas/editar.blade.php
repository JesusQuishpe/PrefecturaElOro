@extends('laboratorio.plantillas.master')
@section('title', 'Tiroideas-Editar')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Tiroideas';
    $data->examen = 'tiroideas';
    $data->opcion = 'editar'; //Tiene que ser igual al de la url
    $data->showInfo = false;
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])

    <div>
        <table id="tb-tiroideas" class="lab-table">
            <thead>
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
                        <tr>
                            <td>{{ $dato->nombres . ' ' . $dato->apellidos }}</td>
                            <td>{{ $dato->fecha_cita }}</td>
                            <td>{{ $dato->nombres }}</td>
                            <td>{{ $dato->updated_at }}</td>
                            <td>
                                <div class="link-container">
                                    <a href="{{ route('tiroideas.edit', ['id_tiroideas'=>$dato->id]) }}" class="link edit">Editar</a>
                                    <form action="{{ route('tiroideas.delete', ['id_tiroideas'=>$dato->id]) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="link delete">Eliminar</button>
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
