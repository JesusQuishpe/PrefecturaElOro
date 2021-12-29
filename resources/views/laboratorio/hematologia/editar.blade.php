@extends('laboratorio.plantillas.master')
@section('title', 'Hematología-Editar')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Hematología';
    $data->examen = 'hematologia';
    $data->opcion = 'editar'; //Tiene que ser igual al de la url
    $data->showInfo = false;
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])

    <div>
        <table id="tb-hematologia" class="table">
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
                                    <a href="{{ route('hematologia.edit', ['id_hematologia'=>$dato->id]) }}" class="btn btn-primary me-2">Editar</a>
                                    <form action="{{ route('hematologia.delete', ['id_hematologia'=>$dato->id]) }}" method="POST">
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
