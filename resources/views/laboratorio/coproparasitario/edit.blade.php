@extends('laboratorio.plantillas.master')
@section('title', 'Coproparasitario-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Coprología (Editar)</h1>
    <form id="formulario" method="POST"
        action="{{ route('coproparasitario.update', ['id_coproparasitario' => $coproparasitario->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $coproparasitario->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $coproparasitario->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{ $doctor->id === $coproparasitario->id_doc ? 'selected' : '' }}>
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
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{ $error }}</li>
                        @break
            @endforeach
            </ul>
            </div>
            @endif
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Protozoarios:</span>
                    <input type="text" name="protozoarios" value="{{$coproparasitario->protozoarios}}">
                </div>
                <div class="grid-form-item">
                    <span>Ameba Histolica:</span>
                    <input type="text" name="ameba_histolica" value="{{$coproparasitario->ameba_histolica}}">
                </div>
                <div class="grid-form-item">
                    <span>Ameba Coli:</span>
                    <input type="text" name="ameba_coli" value="{{$coproparasitario->ameba_coli}}">
                </div>
                <div class="grid-form-item">
                    <span>Giardia lmblia:</span>
                    <input type="text" name="giardia_lmblia" value="{{$coproparasitario->giardia_lmblia}}">
                </div>
                <div class="grid-form-item">
                    <span>Trichomona Homnis:</span>
                    <input type="text" name="trichomona_homnis" value="{{$coproparasitario->trichomona_homnis}}">
                </div>
                <div class="grid-form-item">
                    <span>Chilomatik Mes</span>
                    <input type="text" name="chilomatik_mes" value="{{$coproparasitario->chilomatik_mes}}">
                </div>
                <div class="grid-form-item">
                    <span>Helmintos</span>
                    <input type="text" name="helmintos" value="{{$coproparasitario->helmintos}}">
                </div>
                <div class="grid-form-item">
                    <span>Trichuris Trichura</span>
                    <input type="text" name="trichuris_trichura" value="{{$coproparasitario->trichuris_trichura}}">
                </div>
                <div class="grid-form-item">
                    <span>Ascaris Lumbicoide</span>
                    <input type="text" name="ascaris_lumbicoide" value="{{$coproparasitario->ascaris_lumbicoide}}">
                </div>
                <div class="grid-form-item">
                    <span>Strongyloides Stecolaries</span>
                    <input type="text" name="strongyloides_stecolaries" value="{{$coproparasitario->strongyloides_stecolaries}}">
                </div>
                <div class="grid-form-item">
                    <span>Oxiuros</span>
                    <input type="text" name="oxiuros" value="{{$coproparasitario->oxiuros}}">
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8" >{{$coproparasitario->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
