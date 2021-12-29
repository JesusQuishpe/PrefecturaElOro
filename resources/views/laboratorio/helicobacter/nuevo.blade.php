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
        <fieldset {{!isset($ultimaCita) || is_int($ultimaCita) ? 'disabled' : ''}}>
            <div>
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor" class="form-select w-50 mb-2">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-primary me-2" type="submit">Guardar</button>
                <button class="btn btn-primary">Limpiar</button>
            </div>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Resultado:</span>
                        <input class="form-control" type="text" name="resultado" value="{{ old('resultado') }}">
                    </div>
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
