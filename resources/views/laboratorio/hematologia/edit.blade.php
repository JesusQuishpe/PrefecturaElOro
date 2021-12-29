@extends('laboratorio.plantillas.master')
@section('title', 'Hematologia-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Hematologia (Editar)</h1>
    <form id="formulario" method="POST"
        action="{{ route('hematologia.update', ['id_hematologia' => $hematologia->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $hematologia->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $hematologia->id_cita }}">
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
            <h3>Hematología</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col-4">
                        <span>Sedimento:</span>
                        <input type="text" class="form-control" name="sedimento" value="{{ $hematologia->sedimento}}">
                    </div>
                    <div class="col-4">
                        <span>Hematocrito:</span>
                        <input type="text" class="form-control" name="hematocrito" value="{{ $hematologia->hematocrito}}">
                    </div>
                    <div class="col-4">
                        <span>Hemoglobina:</span>
                        <input type="text" class="form-control" name="hemoglobina" value="{{ $hematologia->hemoglobina}}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <span>Hematies:</span>
                        <input type="text" class="form-control" name="hematies" value="{{ $hematologia->hematies}}">
                    </div>
                    <div class="col-4">
                        <span>Leucocitos:</span>
                        <input type="text" class="form-control" name="leucocitos" value="{{ $hematologia->leucocitos}}">
                    </div>
                    <div class="col"></div>
                </div>
                
            </div>
            <h3>Formula Leucocitaria</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Segmentados:</span>
                        <input type="text" class="form-control" name="segmentados" value="{{ $hematologia->segmentados}}">
                    </div>
                    <div class="col">
                        <span>Linfocitos:</span>
                        <input type="text" class="form-control" name="linfocitos" value="{{ $hematologia->linfocitos}}">
                    </div>
                    <div class="col">
                        <span>Eosinofilos:</span>
                        <input type="text" class="form-control" name="eosinofilos" value="{{ $hematologia->eosinofilos}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Monocitos:</span>
                        <input type="text" class="form-control" name="monocitos" value="{{ $hematologia->monocitos}}">
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <h3>Hemostasia</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col-4">
                        <span>T.Coagulación:</span>
                        <input type="text" class="form-control" name="t_coagulacion"
                            value="{{ $hematologia->t_coagulacion}}">
                    </div>
                    <div class="col">
                        <span>T.Sangría:</span>
                        <input type="text" class="form-control" name="t_sangria" value="{{ $hematologia->t_sangria}}">
                    </div>
                    <div class="col">
                        <span>R.Plaquetas:</span>
                        <input type="text" class="form-control" name="t_plaquetas" value="{{ $hematologia->t_plaquetas}}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <span>T.Protombina(TP):</span>
                        <input type="text" class="form-control" name="t_protombina_tp"
                            value="{{ $hematologia->t_protombina_tp}}">
                    </div>
                    <div class="col">
                        <span>T.Parcial de Tromboplastine(TPT):</span>
                        <input type="text" class="form-control" name="t_parcial_de_tromboplastine"
                            value="{{ $hematologia->t_parcial_de_tromboplastine}}">
                    </div>
                    <div class="col">
                        <span>Fibrinogeno:</span>
                        <input type="text" class="form-control" name="fibrinogeno" value="{{ $hematologia->fibrinogeno}}">
                    </div>
                </div>
            
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{ $hematologia->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
