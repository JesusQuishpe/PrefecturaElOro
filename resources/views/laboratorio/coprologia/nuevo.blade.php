@extends('laboratorio.plantillas.master')
@section('title', 'Coprología-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Coprología';
    $data->examen = 'coprologia';
    $data->opcion='nuevo';
    $data->showInfo=true;
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
    <form method="POST" id="formulario" action="{{ route('coprologia.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="2">
        <input type="hidden" name="id_cita" value="{{isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : ''}}">
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
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Consistencia:</span>
                    <input type="text" name="consistencia">
                </div>
                <div class="grid-form-item">
                    <span>Moco:</span>
                    <input type="text" name="moco">
                </div>
                <div class="grid-form-item">
                    <span>Sangre:</span>
                    <input type="text" name="sangre">
                </div>
                <div class="grid-form-item">
                    <span>Ph:</span>
                    <input type="text" name="ph">
                </div>
                <div class="grid-form-item">
                    <span>Azúcares reductores:</span>
                    <input type="text" name="azucares_reductores">
                </div>
                <div class="grid-form-item">
                    <span>Levadura y micelios:</span>
                    <input type="text" name="levadura_y_micelos">
                </div>
                <div class="grid-form-item">
                    <span>Gram:</span>
                    <input type="text" name="gram">
                </div>
            </div>
            <h3>Inmunología</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Leucocitos:</span>
                    <input type="text" name="leucocitos">
                </div>
                <div class="grid-form-item">
                    <span>Polimorfonucleares:</span>
                    <input type="text" name="polimorfonucleares">
                </div>
                <div class="grid-form-item">
                    <span>Mononucleares:</span>
                    <input type="text" name="mononucleares">
                </div>
                <div class="grid-form-item">
                    <span>Protozoarios:</span>
                    <input type="text" name="protozoarios">
                </div>
                <div class="grid-form-item">
                    <span>Helmintos:</span>
                    <input type="text" name="helmintos">
                </div>
                <div class="grid-form-item">
                    <span>Esteatorrea:</span>
                    <input type="text" name="esteatorrea">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8"></textarea>
        </fieldset>
    </form>
@endsection
