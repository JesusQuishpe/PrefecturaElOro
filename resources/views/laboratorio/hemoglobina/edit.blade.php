@extends('laboratorio.plantillas.master')
@section('title', 'Hemoglobina glicosilada-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Hemoglobina glicosilada (Editar)</h1>
    <form id="formulario" method="POST"
        action="{{ route('hemoglobina.update', ['id_hemoglobina' => $hemoglobina->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $hemoglobina->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $hemoglobina->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{ $doctor->id === $hemoglobina->id_doc ? 'selected' : '' }}>
                            {{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="buttons-container">
                <button class="btn btn-primary" type="submit">Guardar</button>
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
                <div class="grid-form-item">
                    <span>Resultado:</span>
                    <input type="text" name="resultado" value="{{ $hemoglobina->resultado }}">
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30"
                rows="8">{{ $hemoglobina->observaciones }}</textarea>
        </fieldset>
    </form>
@endsection
