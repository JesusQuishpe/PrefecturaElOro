@extends('laboratorio.plantillas.master')
@section('title', 'Coproparasitario-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Coproparasitario';
    $data->examen = 'coproparasitario';
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
    <form method="POST" id="formulario" action="{{ route('coproparasitario.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="3">
        <input type="hidden" name="id_cita" value="{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : '' }}">
        <fieldset {{ !isset($ultimaCita) ? 'disabled' : '' }}>
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
                    <span>Protozoarios:</span>
                    <input type="text" name="protozoarios" value="{{ old('protozoarios') }}">
                </div>
                <div class="grid-form-item">
                    <span>Ameba Histolica:</span>
                    <input type="text" name="ameba_histolica" value="{{ old('ameba_histolica') }}">
                </div>
                <div class="grid-form-item">
                    <span>Ameba Coli:</span>
                    <input type="text" name="ameba_coli" value="{{ old('ameba_coli') }}">
                </div>
                <div class="grid-form-item">
                    <span>Giardia lmblia:</span>
                    <input type="text" name="giardia_lmblia" value="{{ old('giardia_lmblia') }}">
                </div>
                <div class="grid-form-item">
                    <span>Trichomona Homnis:</span>
                    <input type="text" name="trichomona_homnis" value="{{ old('trichomona_homnis') }}">
                </div>
                <div class="grid-form-item">
                    <span>Chilomatik Mes</span>
                    <input type="text" name="chilomatik_mes" value="{{ old('chilomatik_mes') }}">
                </div>
                <div class="grid-form-item">
                    <span>Helmintos</span>
                    <input type="text" name="helmintos" value="{{ old('helmintos') }}">
                </div>
                <div class="grid-form-item">
                    <span>Trichuris Trichura</span>
                    <input type="text" name="trichuris_trichura" value="{{ old('trichuris_trichura') }}">
                </div>
                <div class="grid-form-item">
                    <span>Ascaris Lumbicoide</span>
                    <input type="text" name="ascaris_lumbicoide" value="{{ old('ascaris_lumbicoide') }}">
                </div>
                <div class="grid-form-item">
                    <span>Strongyloides Stecolaries</span>
                    <input type="text" name="strongyloides_stecolaries" value="{{ old('strongyloides_stecolaries') }}">
                </div>
                <div class="grid-form-item">
                    <span>Oxiuros</span>
                    <input type="text" name="oxiuros" value="{{ old('oxiuros') }}">
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
