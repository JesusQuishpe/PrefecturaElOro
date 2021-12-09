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
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{$doctor->id===$coprologia->id_doc ? 'selected' : ''}}>{{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
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
                    <span>Consistencia:</span>
                    <input type="text" name="consistencia" value="{{$coprologia->consistencia}}">
                </div>
                <div class="grid-form-item">
                    <span>Moco:</span>
                    <input type="text" name="moco" value="{{$coprologia->moco}}">
                </div>
                <div class="grid-form-item">
                    <span>Sangre:</span>
                    <input type="text" name="sangre" value="{{$coprologia->sangre}}">
                </div>
                <div class="grid-form-item">
                    <span>Ph:</span>
                    <input type="text" name="ph" value="{{$coprologia->ph}}">
                </div>
                <div class="grid-form-item">
                    <span>Azúcares reductores:</span>
                    <input type="text" name="azucares_reductores" value="{{$coprologia->azucares_reductores}}">
                </div>
                <div class="grid-form-item">
                    <span>Levadura y micelios:</span>
                    <input type="text" name="levadura_y_micelos" value="{{$coprologia->levadura_y_micelos}}">
                </div>
                <div class="grid-form-item">
                    <span>Gram:</span>
                    <input type="text" name="gram" value="{{$coprologia->consistencia}}">
                </div>
            </div>
            <h3>Inmunología</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Leucocitos:</span>
                    <input type="text" name="leucocitos" value="{{$coprologia->leucocitos}}">
                </div>
                <div class="grid-form-item">
                    <span>Polimorfonucleares:</span>
                    <input type="text" name="polimorfonucleares" value="{{$coprologia->polimorfonucleares}}">
                </div>
                <div class="grid-form-item">
                    <span>Mononucleares:</span>
                    <input type="text" name="mononucleares" value="{{$coprologia->mononucleares}}">
                </div>
                <div class="grid-form-item">
                    <span>Protozoarios:</span>
                    <input type="text" name="protozoarios" value="{{$coprologia->protozoarios}}">
                </div>
                <div class="grid-form-item">
                    <span>Helmintos:</span>
                    <input type="text" name="helmintos" value="{{$coprologia->helmintos}}">
                </div>
                <div class="grid-form-item">
                    <span>Esteatorrea:</span>
                    <input type="text" name="esteatorrea" value="{{$coprologia->esteatorrea}}">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{$coprologia->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
