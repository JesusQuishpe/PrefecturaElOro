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
        <fieldset {{!isset($ultimaCita) || is_int($ultimaCita) ? 'disabled' : ''}}>
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
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Consistencia:</span>
                        <input type="text" class="form-control" name="consistencia" value="{{old('consistencia')}}">
                    </div>
                    <div class="col">
                        <span>Moco:</span>
                        <input type="text" class="form-control" name="moco" value="{{old('moco')}}">
                    </div>
                    <div class="col">
                        <span>Sangre:</span>
                        <input type="text" class="form-control" name="sangre" value="{{old('sangre')}}"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Ph:</span>
                        <input type="text" class="form-control" name="ph" value="{{old('ph')}}">
                    </div>
                    <div class="col">
                        <span>Azúcares reductores:</span>
                        <input type="text" class="form-control" name="azucares_reductores" value="{{old('azucares_reductores')}}">
                    </div>
                    <div class="col">
                        <span>Levadura y micelios:</span>
                        <input type="text" class="form-control" name="levadura_y_micelos" value="{{old('levadura_y_micelos')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Gram:</span>
                        <input type="text" class="form-control" name="gram" value="{{old('gram')}}">
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
                        <input type="text" class="form-control" name="leucocitos" value="{{old('leucocitos')}}">
                    </div>
                    <div class="col">
                        <span>Polimorfonucleares:</span>
                        <input type="text" class="form-control" name="polimorfonucleares" value="{{old('polimorfonucleares')}}">
                    </div>
                    <div class="col">
                        <span>Mononucleares:</span>
                        <input type="text" class="form-control" name="mononucleares" value="{{old('mononucleares')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Protozoarios:</span>
                        <input type="text" class="form-control" name="protozoarios" value="{{old('protozoarios')}}">
                    </div>
                    <div class="col">
                        <span>Helmintos:</span>
                        <input type="text" class="form-control" name="helmintos" value="{{old('helmintos')}}">
                    </div>
                    <div class="col">
                        <span>Esteatorrea:</span>
                        <input type="text" class="form-control" name="esteatorrea" value="{{old('esteatorrea')}}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{old('observaciones')}}</textarea>
        </fieldset>
    </form>
@endsection
