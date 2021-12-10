@extends('laboratorio.plantillas.master')
@section('title', 'Tiroideas-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Tiroideas (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('tiroideas.update', ['id_tiroideas' => $tiroideas->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $tiroideas->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $tiroideas->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{ $doctor->id === $tiroideas->id_doc ? 'selected' : '' }}>
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
            <h3>T3-T4-TSH</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>T3:</span>
                    <input type="text" name="t3" value="{{$tiroideas->t3}}">
                </div>
                <div class="grid-form-item">
                    <span>T4:</span>
                    <input type="text" name="t4" value="{{$tiroideas->t4}}">
                </div>
                <div class="grid-form-item">
                    <span>TSH:</span>
                    <input type="text" name="tsh" value="{{$tiroideas->tsh}}">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{$tiroideas->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
