@extends('laboratorio.plantillas.master')
@section('title', 'HelicobacterHeces-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'HelicobacterHeces';
    $data->examen = 'helicobacterHeces';
    $data->opcion='nuevo';
    $data->showInfo=true;
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])

    
    <h3>Insertar datos</h3>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="list-group-item">{{ $error }}</li>
                    @break
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" id="formulario" action="{{ route('helicobacterHeces.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="5">
        <input type="hidden" name="id_cita" value="{{isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : ''}}">
        <fieldset {{!isset($ultimaCita) ? 'disabled' : ''}}>
            <h5>Selección del doctor</h5>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="buttons-container">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-primary">Limpiar</button>
            </div>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Resultado:</span>
                    <input type="text" name="resultado">
                </div>
            </div>
        
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8"></textarea>
        </fieldset>
    </form>
@endsection
