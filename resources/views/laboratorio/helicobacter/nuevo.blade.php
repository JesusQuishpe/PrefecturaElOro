@extends('laboratorio.plantillas.master')
@section('title', 'HelicoBacter Pylori IgG-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'HelicoBacter Pylori IgG';
    $data->examen = 'helicobacter';
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
    <form method="POST" id="formulario" action="{{ route('helicobacter.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="6">
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
                    <input type="text" name="resultado" value="{{old('resultado')}}">
                </div>
        
            </div>
        
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{old('observaciones')}}</textarea>
        </fieldset>
    </form>
@endsection
