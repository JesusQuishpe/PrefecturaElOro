@extends('laboratorio.plantillas.master')
@section('title', 'Prueba de embarazo-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Prueba de embarazo (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('embarazo.update', ['id_embarazo' => $embarazo->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $embarazo->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $embarazo->id_cita }}">
        <fieldset>
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
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                        @break
                    @endforeach
                </div>
            @endif
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Resultado:</span>
                        <input class="form-control" type="text" name="resultado" value="{{ $embarazo->resultado}}">
                    </div>
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                rows="8">{{ $embarazo->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
