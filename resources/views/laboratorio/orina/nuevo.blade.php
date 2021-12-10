@extends('laboratorio.plantillas.master')
@section('title', 'Examen de Orina-Nuevo')
@section('content')
@php
$data = new stdClass();
$data->title = 'Examen de Orina';
$data->examen = 'examenOrina';
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
<form method="POST" id="formulario" action="{{ route('examenOrina.guardar') }}">
    @csrf
        <input type="hidden" name="id_tipo" value="4">
        <input type="hidden" name="id_cita" value="{{isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : ''}}">
    <div class="buttons-container">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-primary" >Limpiar</button>
    </div>
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
        <div class="grid-form">
            <div class="grid-form-item">
                <span>Color:</span>
                <input type="text" name="color">
            </div>
            <div class="grid-form-item">
                <span>Olor:</span>
                <input type="text" name="olor">
            </div>
            <div class="grid-form-item">
                <span>Sedimento:</span>
                <input type="text" name="sedimento">
            </div>
            <div class="grid-form-item">
                <span>Ph:</span>
                <input type="text" name="ph">
            </div>
            <div class="grid-form-item">
                <span>Densidad:</span>
                <input type="text" name="densidad">
            </div>
            <div class="grid-form-item">
                <span>Leucocituria:</span>
                <input type="text" name="leucocituria">
            </div>
            <div class="grid-form-item">
                <span>Nitritos:</span>
                <input type="text" name="nitrito">
            </div>
            <div class="grid-form-item">
                <span>Albumina:</span>
                <input type="text" name="albumina">
            </div>
            <div class="grid-form-item">
                <span>Glucosa:</span>
                <input type="text" name="glucosa">
            </div>
            <div class="grid-form-item">
                <span>Cetonas:</span>
                <input type="text" name="cetonas">
            </div>
            <div class="grid-form-item">
                <span>Urobilinogeno:</span>
                <input type="text" name="urobilinogeno">
            </div>
            <div class="grid-form-item">
                <span>Bilirrubina:</span>
                <input type="text" name="bilirrubina">
            </div>
            <div class="grid-form-item">
                <span>Sangre (Hem.Enteros):</span>
                <input type="text" name="hem_euteros">
            </div>
            <div class="grid-form-item">
                <span>Sangre (H. Lisados):</span>
                <input type="text" name="h_lisados">
            </div>
            <div class="grid-form-item">
                <span>Ácido Ascorbico:</span>
                <input type="text" name="acido_ascorbico">
            </div>
        </div>
        <h3>Microscopio</h3>
        <div class="grid-form">
            <div class="grid-form-item">
                <span>Hematies:</span>
                <input type="text" name="hematies">
            </div>
            <div class="grid-form-item">
                <span>Leucocitos:</span>
                <input type="text" name="leucocitos">
            </div>
            <div class="grid-form-item">
                <span>Cel. Epiteliales:</span>
                <input type="text" name="cel_epiteliales">
            </div>
            <div class="grid-form-item">
                <span>Fil. Mucosos:</span>
                <input type="text" name="fil_mucosos">
            </div>
            <div class="grid-form-item">
                <span>Bacterias:</span>
                <input type="text" name="bacterias">
            </div>
            <div class="grid-form-item">
                <span>Bacilos:</span>
                <input type="text" name="bacilos">
            </div>
            <div class="grid-form-item">
                <span>Cristales:</span>
                <input type="text" name="cristales">
            </div>
            <div class="grid-form-item">
                <span>Cilindros:</span>
                <input type="text" name="cilindros">
            </div>
            <div class="grid-form-item">
                <span>Piocitos:</span>
                <input type="text" name="piocitos">
            </div>
        </div>
        <h3>Observaciones</h3>
        <textarea name="observaciones" id="observaciones" cols="30" rows="8"></textarea>
    </fieldset>
</form>
@endsection
