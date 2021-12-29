@extends('laboratorio.plantillas.master')
@section('title', 'Examen de Orina-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Coprología (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('examenOrina.update', ['id_examenOrina' => $examenOrina->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $examenOrina->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $examenOrina->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
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
                        <span>Color:</span>
                        <input type="text" class="form-control" name="color" value="{{ $examenOrina->color}}">
                    </div>
                    <div class="col">
                        <span>Olor:</span>
                        <input type="text" class="form-control" name="olor" value="{{ $examenOrina->olor}}">
                    </div>
                    <div class="col">
                        <span>Sedimento:</span>
                        <input type="text" class="form-control" name="sedimento" value="{{ $examenOrina->sedimento}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Ph:</span>
                        <input type="text" class="form-control" name="ph" value="{{ $examenOrina->ph}}">
                    </div>
                    <div class="col">
                        <span>Densidad:</span>
                        <input type="text" class="form-control" name="densidad" value="{{ $examenOrina->densidad}}">
                    </div>
                    <div class="col">
                        <span>Leucocituria:</span>
                        <input type="text" class="form-control" name="leucocituria" value="{{ $examenOrina->leucocituria}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Nitritos:</span>
                        <input type="text" class="form-control" name="nitritos" value="{{ $examenOrina->nitritos}}">
                    </div>
                    <div class="col">
                        <span>Albumina:</span>
                        <input type="text" class="form-control" name="albumina" value="{{ $examenOrina->albumina}}">
                    </div>
                    <div class="col">
                        <span>Glucosa:</span>
                        <input type="text" class="form-control" name="glucosa" value="{{ $examenOrina->glucosa}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Cetonas:</span>
                        <input type="text" class="form-control" name="cetonas" value="{{ $examenOrina->cetonas}}">
                    </div>
                    <div class="col">
                        <span>Urobilinogeno:</span>
                        <input type="text" class="form-control" name="urobilinogeno"
                            value="{{ $examenOrina->urobilinogeno}}">
                    </div>
                    <div class="col">
                        <span>Bilirrubina:</span>
                        <input type="text" class="form-control" name="bilirrubina" value="{{ $examenOrina->bilirrubina}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Sangre (Hem.Enteros):</span>
                        <input type="text" class="form-control" name="sangre_enteros"
                            value="{{ $examenOrina->sangre_enteros}}">
                    </div>
                    <div class="col">
                        <span>Sangre (H. Lisados):</span>
                        <input type="text" class="form-control" name="sangre_lisados"
                            value="{{ $examenOrina->sangre_lisados}}">
                    </div>
                    <div class="col">
                        <span>Ácido Ascorbico:</span>
                        <input type="text" class="form-control" name="acido_ascorbico"
                            value="{{ $examenOrina->acido_ascorbico}}">
                    </div>
                </div>
            </div>
            <h3>Microscopio</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Hematies:</span>
                        <input type="text" class="form-control" name="hematies" value="{{ $examenOrina->hematies}}">
                    </div>
                    <div class="col">
                        <span>Leucocitos:</span>
                        <input type="text" class="form-control" name="leucocitos" value="{{ $examenOrina->leucocitos}}">
                    </div>
                    <div class="col">
                        <span>Cel. Epiteliales:</span>
                        <input type="text" class="form-control" name="cel_epiteliales"
                            value="{{ $examenOrina->cel_epiteliales}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Fil. Mucosos:</span>
                        <input type="text" class="form-control" name="fil_mucosos" value="{{ $examenOrina->fil_mucosos}}">
                    </div>
                    <div class="col">
                        <span>Bacterias:</span>
                        <input type="text" class="form-control" name="bacterias" value="{{ $examenOrina->bacterias}}">
                    </div>
                    <div class="col">
                        <span>Bacilos:</span>
                        <input type="text" class="form-control" name="bacilos" value="{{ $examenOrina->bacilos}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Cristales:</span>
                        <input type="text" class="form-control" name="cristales" value="{{ $examenOrina->cristales}}">
                    </div>
                    <div class="col">
                        <span>Cilindros:</span>
                        <input type="text" class="form-control" name="cilindros" value="{{ $examenOrina->cilindros}}">
                    </div>
                    <div class="col">
                        <span>Piocitos:</span>
                        <input type="text" class="form-control" name="piocitos" value="{{ $examenOrina->piocitos}}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                rows="8">{{ $examenOrina->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
