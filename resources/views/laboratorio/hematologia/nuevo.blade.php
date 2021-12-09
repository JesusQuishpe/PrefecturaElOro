@extends('laboratorio.plantillas.master')
@section('title', 'Hematologia-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Hematologia';
    $data->examen = 'hematologia';
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
    <form method="POST" id="formulario" action="{{ route('hematologia.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="7">
        <input type="hidden" name="id_cita" value="{{isset($ultimaCita) ? $ultimaCita->id_cita : ''}}">
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
            <div class="buttons-container">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-primary">Limpiar</button>
            </div>
            <h3>Hematología</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Sedimento:</span>
                    <input type="text" name="sedimento">
                </div>
                <div class="grid-form-item">
                    <span>Hematocrito:</span>
                    <input type="text" name="hematocrito">
                </div>
                <div class="grid-form-item">
                    <span>Hemoglobina:</span>
                    <input type="text" name="hemoglobina">
                </div>
                <div class="grid-form-item">
                    <span>Hematies:</span>
                    <input type="text" name="hematies">
                </div>
                <div class="grid-form-item">
                    <span>Leucocitos:</span>
                    <input type="text" name="leucocitos">
                </div>
            </div>
            <h3>Formula Leucocitaria</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Segmentados:</span>
                    <input type="text" name="segmentados">
                </div>
                <div class="grid-form-item">
                    <span>Linfocitos:</span>
                    <input type="text" name="linfocitos">
                </div>
                <div class="grid-form-item">
                    <span>Eosinofilos:</span>
                    <input type="text" name="eosinofilos">
                </div>
                <div class="grid-form-item">
                    <span>Monocitos:</span>
                    <input type="text" name="monocitos">
                </div>
            </div>
            <h3>Hemostasia</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>T.Coagulación:</span>
                    <input type="text" name="t_coagulacion">
                </div>
                <div class="grid-form-item">
                    <span>T.Sangría:</span>
                    <input type="text" name="t_sangria">
                </div>
                <div class="grid-form-item">
                    <span>R.Plaquetas:</span>
                    <input type="text" name="t_plaquetas">
                </div>
                <div class="grid-form-item">
                    <span>T.Protombina(TP):</span>
                    <input type="text" name="t_protombina_tp">
                </div>
                <div class="grid-form-item">
                    <span>T.Parcial de Tromboplastine(TPT):</span>
                    <input type="text" name="t_parcial_de_tromboplastine">
                </div>
                <div class="grid-form-item">
                    <span>Fibrinogeno:</span>
                    <input type="text" name="fibrinogeno">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8"></textarea>
        </fieldset>
    </form>
@endsection
