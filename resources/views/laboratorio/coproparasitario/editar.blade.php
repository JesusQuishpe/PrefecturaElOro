@extends('laboratorio.plantillas.master')
@section('title', 'Bioquimica-Editar')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Coproparasitario';
    $data->examen = 'Coproparasitario';
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])
    
    <div class="">
        <table id="tb-coproparasitario">
            <thead>
                <tr>
                    <td>Fecha de consulta</td>
                    <td>Doctor</td>
                    <td>Última modificación</td>
                    <td>Observaciones</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
