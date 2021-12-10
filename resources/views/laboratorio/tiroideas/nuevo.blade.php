@extends('laboratorio.plantillas.master')
@section('title', 'Tiroideas-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Tiroideas';
    $data->examen = 'tiroideas';
    $data->opcion='nuevo';
    $data->showInfo=true;
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])

    
    <h3>Insertar datos</h3>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @break
            @endforeach
        </div>
    @endif
    <form method="POST" id="formulario" action="{{ route('tiroideas.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="10">
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
            <h3>T3-T4-TSH</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>T3:</span>
                    <input type="text" name="t3" value="{{old('t3')}}">
                </div>
                <div class="grid-form-item">
                    <span>T4:</span>
                    <input type="text" name="t4" value="{{old('t4')}}">
                </div>
                <div class="grid-form-item">
                    <span>TSH:</span>
                    <input type="text" name="tsh" value="{{old('tsh')}}">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{old('observaciones')}}</textarea>
        </fieldset>
    </form>
@endsection
