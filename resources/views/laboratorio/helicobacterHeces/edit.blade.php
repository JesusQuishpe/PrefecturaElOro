@extends('laboratorio.plantillas.master')
@section('title', 'Helicobacter Heces-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">HelicoBacter Pylori IgG Heces (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('helicobacterHeces.update', ['id_helicobacterHeces' => $helicobacterHeces->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $helicobacterHeces->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $helicobacterHeces->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{$doctor->id===$helicobacterHeces->id_doc ? 'selected' : ''}}>{{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
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
                    <span>Resultado:</span>
                    <input type="text" name="resultado" value="{{$helicobacterHeces->resultado}}">
                </div>
            </div>
        
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8">{{$helicobacterHeces->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
