@extends('laboratorio.plantillas.master')
@section('title', 'Coprologia-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Coprología (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('coprologia.update', ['id_coprologia' => $coprologia->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $coprologia->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $coprologia->id_cita }}">
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
                        <span>Consistencia:</span>
                        <input type="text" class="form-control" name="consistencia"
                            value="{{ $coprologia->consistencia }}">
                    </div>
                    <div class="col">
                        <span>Moco:</span>
                        <input type="text" class="form-control" name="moco" value="{{ $coprologia->moco }}">
                    </div>
                    <div class="col">
                        <span>Sangre:</span>
                        <input type="text" class="form-control" name="sangre" value="{{ $coprologia->sangre }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Ph:</span>
                        <input type="text" class="form-control" name="ph" value="{{ $coprologia->ph }}">
                    </div>
                    <div class="col">
                        <span>Azúcares reductores:</span>
                        <input type="text" class="form-control" name="azucares_reductores"
                            value="{{ $coprologia->azucares_reductores }}">
                    </div>
                    <div class="col">
                        <span>Levadura y micelios:</span>
                        <input type="text" class="form-control" name="levadura_y_micelos"
                            value="{{ $coprologia->levadura_y_micelos }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Gram:</span>
                        <input type="text" class="form-control" name="gram" value="{{ $coprologia->gram }}">
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <h3>Inmunología</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Leucocitos:</span>
                        <input type="text" class="form-control" name="leucocitos" value="{{ $coprologia->leucocitos }}">
                    </div>
                    <div class="col">
                        <span>Polimorfonucleares:</span>
                        <input type="text" class="form-control" name="polimorfonucleares"
                            value="{{ $coprologia->polimorfonucleares }}">
                    </div>
                    <div class="col">
                        <span>Mononucleares:</span>
                        <input type="text" class="form-control" name="mononucleares"
                            value="{{ $coprologia->mononucleares }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Protozoarios:</span>
                        <input type="text" class="form-control" name="protozoarios"
                            value="{{ $coprologia->protozoarios }}">
                    </div>
                    <div class="col">
                        <span>Helmintos:</span>
                        <input type="text" class="form-control" name="helmintos" value="{{ $coprologia->helmintos }}">
                    </div>
                    <div class="col">
                        <span>Esteatorrea:</span>
                        <input type="text" class="form-control" name="esteatorrea"
                            value="{{ $coprologia->esteatorrea }}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                rows="8">{{ $coprologia->observaciones }}</textarea>
        </fieldset>
    </form>
@endsection
