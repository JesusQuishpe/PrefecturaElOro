@extends('laboratorio.plantillas.master')
@section('title', 'Tiroideas-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Tiroideas';
    $data->examen = 'tiroideas';
    $data->opcion = 'nuevo';
    $data->showInfo = true;
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
        <input type="hidden" name="id_cita"
            value="{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : '' }}">
        <fieldset {{ !isset($ultimaCita)  || is_int($ultimaCita) ? 'disabled' : '' }}>
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

            <h3>T3-T4-TSH</h3>

            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>T3:</span>
                        <input type="text" class="form-control" name="t3" value="{{ old('t3') }}">
                    </div>
                    <div class="col">
                        <span>T4:</span>
                        <input type="text" class="form-control" name="t4" value="{{ old('t4') }}">
                    </div>
                    <div class="col">
                        <span>TSH:</span>
                        <input type="text" class="form-control" name="tsh" value="{{ old('tsh') }}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
