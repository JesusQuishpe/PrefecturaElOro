@extends('laboratorio.plantillas.master')
@section('title', 'Examen de Orina-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Coprología (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('examen-orina.update', ['id_examenOrina' => $examenOrina->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $examenOrina->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $examenOrina->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{$doctor->id===$examenOrina->id_doc ? 'selected' : ''}}>{{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
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
                    <span>Color:</span>
                    <input type="text" name="color" value="{{$examenOrina->color}}">
                </div>
                <div class="grid-form-item">
                    <span>Olor:</span>
                    <input type="text" name="olor" value="{{$examenOrina->olor}}">
                </div>
                <div class="grid-form-item">
                    <span>Sedimento:</span>
                    <input type="text" name="sedimento" value="{{$examenOrina->sedimento}}">
                </div>
                <div class="grid-form-item">
                    <span>Ph:</span>
                    <input type="text" name="ph" value="{{$examenOrina->ph}}">
                </div>
                <div class="grid-form-item">
                    <span>Densidad:</span>
                    <input type="text" name="densidad" value="{{$examenOrina->densidad}}">
                </div>
                <div class="grid-form-item">
                    <span>Leucocituria:</span>
                    <input type="text" name="leucocituria" value="{{$examenOrina->leucocituria}}">
                </div>
                <div class="grid-form-item">
                    <span>Nitritos:</span>
                    <input type="text" name="nitrito" value="{{$examenOrina->nitrito}}">
                </div>
                <div class="grid-form-item">
                    <span>Albumina:</span>
                    <input type="text" name="albumina" value="{{$examenOrina->albumina}}">
                </div>
                <div class="grid-form-item">
                    <span>Glucosa:</span>
                    <input type="text" name="glucosa" value="{{$examenOrina->glucosa}}">
                </div>
                <div class="grid-form-item">
                    <span>Cetonas:</span>
                    <input type="text" name="cetonas" value="{{$examenOrina->cetonas}}">
                </div>
                <div class="grid-form-item">
                    <span>Urobilinogeno:</span>
                    <input type="text" name="urobilinogeno" value="{{$examenOrina->urobilinogeno}}">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina:</span>
                    <input type="text" name="bilirrubina" value="{{$examenOrina->bilirrubina}}">
                </div>
                <div class="grid-form-item">
                    <span>Sangre (Hem.Enteros):</span>
                    <input type="text" name="hem_euteros" value="{{$examenOrina->hem_euteros}}">
                </div>
                <div class="grid-form-item">
                    <span>Sangre (H. Lisados):</span>
                    <input type="text" name="h_lisados" value="{{$examenOrina->h_lisados}}">
                </div>
                <div class="grid-form-item">
                    <span>Ácido Ascorbico:</span>
                    <input type="text" name="acido_ascorbico" value="{{$examenOrina->acido_ascorbico}}">
                </div>
            </div>
            <h3>Microscopio</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Hematies:</span>
                    <input type="text" name="hematies" value="{{$examenOrina->hematies}}"> 
                </div>
                <div class="grid-form-item">
                    <span>Leucocitos:</span>
                    <input type="text" name="leucocitos" value="{{$examenOrina->leucocitos}}">
                </div>
                <div class="grid-form-item">
                    <span>Cel. Epiteliales:</span>
                    <input type="text" name="cel_epiteliales" value="{{$examenOrina->cel_epiteliales}}">
                </div>
                <div class="grid-form-item">
                    <span>Fil. Mucosos:</span>
                    <input type="text" name="fil_mucosos" value="{{$examenOrina->fil_mucosos}}">
                </div>
                <div class="grid-form-item">
                    <span>Bacterias:</span>
                    <input type="text" name="bacterias" value="{{$examenOrina->bacterias}}">
                </div>
                <div class="grid-form-item">
                    <span>Bacilos:</span>
                    <input type="text" name="bacilos" value="{{$examenOrina->bacilos}}">
                </div>
                <div class="grid-form-item">
                    <span>Cristales:</span>
                    <input type="text" name="cristales" value="{{$examenOrina->cristales}}">
                </div>
                <div class="grid-form-item">
                    <span>Cilindros:</span>
                    <input type="text" name="cilindros" value="{{$examenOrina->cilindros}}">
                </div>
                <div class="grid-form-item">
                    <span>Piocitos:</span>
                    <input type="text" name="piocitos" value="{{$examenOrina->piocitos}}">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{$examenOrina->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
