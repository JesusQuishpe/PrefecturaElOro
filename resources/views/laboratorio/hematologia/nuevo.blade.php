@extends('laboratorio.plantillas.master')
@section('title', 'Hematologia-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Hematologia';
    $data->examen = 'hematologia';
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
    <form method="POST" id="formulario" action="{{ route('hematologia.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="7">
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
            <h3>Hematología</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col-4">
                        <span>Sedimento:</span>
                        <input type="text" class="form-control" name="sedimento" value="{{ old('sedimento') }}">
                    </div>
                    <div class="col-4">
                        <span>Hematocrito:</span>
                        <input type="text" class="form-control" name="hematocrito" value="{{ old('hematocrito') }}">
                    </div>
                    <div class="col-4">
                        <span>Hemoglobina:</span>
                        <input type="text" class="form-control" name="hemoglobina" value="{{ old('hemoglobina') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <span>Hematies:</span>
                        <input type="text" class="form-control" name="hematies" value="{{ old('hematies') }}">
                    </div>
                    <div class="col-4">
                        <span>Leucocitos:</span>
                        <input type="text" class="form-control" name="leucocitos" value="{{ old('leucocitos') }}">
                    </div>
                    <div class="col"></div>
                </div>
                
            </div>
            <h3>Formula Leucocitaria</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Segmentados:</span>
                        <input type="text" class="form-control" name="segmentados" value="{{ old('segmentados') }}">
                    </div>
                    <div class="col">
                        <span>Linfocitos:</span>
                        <input type="text" class="form-control" name="linfocitos" value="{{ old('linfocitos') }}">
                    </div>
                    <div class="col">
                        <span>Eosinofilos:</span>
                        <input type="text" class="form-control" name="eosinofilos" value="{{ old('eosinofilos') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Monocitos:</span>
                        <input type="text" class="form-control" name="monocitos" value="{{ old('monocitos') }}">
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
                            value="{{ old('t_coagulacion') }}">
                    </div>
                    <div class="col">
                        <span>T.Sangría:</span>
                        <input type="text" class="form-control" name="t_sangria" value="{{ old('t_sangria') }}">
                    </div>
                    <div class="col">
                        <span>R.Plaquetas:</span>
                        <input type="text" class="form-control" name="t_plaquetas" value="{{ old('t_plaquetas') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <span>T.Protombina(TP):</span>
                        <input type="text" class="form-control" name="t_protombina_tp"
                            value="{{ old('t_protombina_tp') }}">
                    </div>
                    <div class="col">
                        <span>T.Parcial de Tromboplastine(TPT):</span>
                        <input type="text" class="form-control" name="t_parcial_de_tromboplastine"
                            value="{{ old('t_parcial_de_tromboplastine') }}">
                    </div>
                    <div class="col">
                        <span>Fibrinogeno:</span>
                        <input type="text" class="form-control" name="fibrinogeno" value="{{ old('fibrinogeno') }}">
                    </div>
                </div>
            
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
