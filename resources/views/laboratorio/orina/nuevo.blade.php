@extends('laboratorio.plantillas.master')
@section('title', 'Examen de Orina-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Examen de Orina';
    $data->examen = 'examenOrina';
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
    <form method="POST" id="formulario" action="{{ route('examenOrina.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="4">
        <input type="hidden" name="id_cita"
            value="{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : '' }}">
        <fieldset {{ !isset($ultimaCita) || is_int($ultimaCita) ? 'disabled' : '' }}>
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
            <h3>Físico Quimico</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Color:</span>
                        <input type="text" class="form-control" name="color" value="{{ old('color') }}">
                    </div>
                    <div class="col">
                        <span>Olor:</span>
                        <input type="text" class="form-control" name="olor" value="{{ old('olor') }}">
                    </div>
                    <div class="col">
                        <span>Sedimento:</span>
                        <input type="text" class="form-control" name="sedimento" value="{{ old('sedimento') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Ph:</span>
                        <input type="text" class="form-control" name="ph" value="{{ old('ph') }}">
                    </div>
                    <div class="col">
                        <span>Densidad:</span>
                        <input type="text" class="form-control" name="densidad" value="{{ old('densidad') }}">
                    </div>
                    <div class="col">
                        <span>Leucocituria:</span>
                        <input type="text" class="form-control" name="leucocituria" value="{{ old('leucocituria') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Nitritos:</span>
                        <input type="text" class="form-control" name="nitritos" value="{{ old('nitritos') }}">
                    </div>
                    <div class="col">
                        <span>Albumina:</span>
                        <input type="text" class="form-control" name="albumina" value="{{ old('albumina') }}">
                    </div>
                    <div class="col">
                        <span>Glucosa:</span>
                        <input type="text" class="form-control" name="glucosa" value="{{ old('glucosa') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Cetonas:</span>
                        <input type="text" class="form-control" name="cetonas" value="{{ old('cetonas') }}">
                    </div>
                    <div class="col">
                        <span>Urobilinogeno:</span>
                        <input type="text" class="form-control" name="urobilinogeno"
                            value="{{ old('urobilinogeno') }}">
                    </div>
                    <div class="col">
                        <span>Bilirrubina:</span>
                        <input type="text" class="form-control" name="bilirrubina" value="{{ old('bilirrubina') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Sangre (Hem.Enteros):</span>
                        <input type="text" class="form-control" name="sangre_enteros"
                            value="{{ old('sangre_enteros') }}">
                    </div>
                    <div class="col">
                        <span>Sangre (H. Lisados):</span>
                        <input type="text" class="form-control" name="sangre_lisados"
                            value="{{ old('sangre_lisados') }}">
                    </div>
                    <div class="col">
                        <span>Ácido Ascorbico:</span>
                        <input type="text" class="form-control" name="acido_ascorbico"
                            value="{{ old('acido_ascorbico') }}">
                    </div>
                </div>
            </div>
            <h3>Microscopio</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Hematies:</span>
                        <input type="text" class="form-control" name="hematies" value="{{ old('hematies') }}">
                    </div>
                    <div class="col">
                        <span>Leucocitos:</span>
                        <input type="text" class="form-control" name="leucocitos" value="{{ old('leucocitos') }}">
                    </div>
                    <div class="col">
                        <span>Cel. Epiteliales:</span>
                        <input type="text" class="form-control" name="cel_epiteliales"
                            value="{{ old('cel_epiteliales') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Fil. Mucosos:</span>
                        <input type="text" class="form-control" name="fil_mucosos" value="{{ old('fil_mucosos') }}">
                    </div>
                    <div class="col">
                        <span>Bacterias:</span>
                        <input type="text" class="form-control" name="bacterias" value="{{ old('bacterias') }}">
                    </div>
                    <div class="col">
                        <span>Bacilos:</span>
                        <input type="text" class="form-control" name="bacilos" value="{{ old('bacilos') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Cristales:</span>
                        <input type="text" class="form-control" name="cristales" value="{{ old('cristales') }}">
                    </div>
                    <div class="col">
                        <span>Cilindros:</span>
                        <input type="text" class="form-control" name="cilindros" value="{{ old('cilindros') }}">
                    </div>
                    <div class="col">
                        <span>Piocitos:</span>
                        <input type="text" class="form-control" name="piocitos" value="{{ old('piocitos') }}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
