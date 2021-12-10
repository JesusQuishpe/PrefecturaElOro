@extends('laboratorio.plantillas.master')
@section('title', 'Bioquimica-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Bioquimica Sanguínea';
    $data->examen = 'bioquimica';
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

    <form id="formulario" method="post" action="{{ route('bioquimica.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="1">
        <input type="hidden" name="id_cita" value="{{isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : ''}}">
        <fieldset {{ !isset($ultimaCita) ? 'disabled' : '' }}>
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
                    <span>Glucosa:</span>
                    <input type="text" name="glucosa">
                </div>
                <div class="grid-form-item">
                    <span>Urea:</span>
                    <input type="text" name="urea">
                </div>
                <div class="grid-form-item">
                    <span>Creátinina:</span>
                    <input type="text" name="creatinina">
                </div>
                <div class="grid-form-item">
                    <span>Ácido úrico:</span>
                    <input type="text" name="acido_urico">
                </div>
                <div class="grid-form-item">
                    <span>Colesterol total:</span>
                    <input type="text" name="colesterol_total">
                </div>
                <div class="grid-form-item">
                    <span>Colesterol hdl:</span>
                    <input type="text" name="colesterol_hdl">
                </div>
                <div class="grid-form-item">
                    <span>Colesterol ldl:</span>
                    <input type="text" name="colesterol_ldl">
                </div>
                <div class="grid-form-item">
                    <span>Trigliceridos:</span>
                    <input type="text" name="trigliceridos">
                </div>
                <div class="grid-form-item">
                    <span>Proteínas totales:</span>
                    <input type="text" name="proteinas_totales">
                </div>
                <div class="grid-form-item">
                    <span>Albumina:</span>
                    <input type="text" name="albumina">
                </div>
                <div class="grid-form-item">
                    <span>Globulina:</span>
                    <input type="text" name="globulina">
                </div>
                <div class="grid-form-item">
                    <span>Relación A/G:</span>
                    <input type="text" name="relacion_ag">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina directa:</span>
                    <input type="text" name="bilirrubina_directa">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina indirecta:</span>
                    <input type="text" name="bilirrubina_indirecta">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina total:</span>
                    <input type="text" name="bilirrubina_total">
                </div>
                <div class="grid-form-item">
                    <span>Gamma glutámil transp:</span>
                    <input type="text" name="gamma_gt">
                </div>
                <div class="grid-form-item">
                    <span>Calcio:</span>
                    <input type="text" name="calcio">
                </div>
            </div>
            <h3>Inmunología</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>VDRL:</span>
                    <input type="text" name="vdrl">
                </div>
                <div class="grid-form-item">
                    <span>Proteína C react:</span>
                    <input type="text" name="proteinas_c_react">
                </div>
                <div class="grid-form-item">
                    <span>R.A test (latex):</span>
                    <input type="text" name="ra_test_latex">
                </div>
                <div class="grid-form-item">
                    <span>A.S.T.O:</span>
                    <input type="text" name="asto">
                </div>
                <div class="grid-form-item">
                    <span>Salmonella O:</span>
                    <input type="text" name="salmonella_o">
                </div>
                <div class="grid-form-item">
                    <span>Salmonella H:</span>
                    <input type="text" name="salmonella_h">
                </div>
                <div class="grid-form-item">
                    <span>Paratifica A:</span>
                    <input type="text" name="paratifica_a">
                </div>
                <div class="grid-form-item">
                    <span>Paratifica B:</span>
                    <input type="text" name="paratifica_b">
                </div>
                <div class="grid-form-item">
                    <span>Proteus 0x19:</span>
                    <input type="text" name="proteus_0x19">
                </div>
                <div class="grid-form-item">
                    <span>Proteus 0x2:</span>
                    <input type="text" name="proteus_0x2">
                </div>
                <div class="grid-form-item">
                    <span>Proteus 0xK:</span>
                    <input type="text" name="proteus_0xk">
                </div>
            </div>
            <h3>Enzimas</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Transaminasa 0X:</span>
                    <input type="text" name="transaminasa_ox">
                </div>
                <div class="grid-form-item">
                    <span>Transaminasa PIR:</span>
                    <input type="text" name="transaminasa_pir">
                </div>
                <div class="grid-form-item">
                    <span>Fosfatasa alcalina adulto:</span>
                    <input type="text" name="fosfatasa_alcalina_adultos">
                </div>
                <div class="grid-form-item">
                    <span>Fosfatasa alcalina niño:</span>
                    <input type="text" name="fosfatasa_alcalina_ninos">
                </div>
                <div class="grid-form-item">
                    <span>Amilasa:</span>
                    <input type="text" name="amilasa">
                </div>
                <div class="grid-form-item">
                    <span>Lipasa:</span>
                    <input type="text" name="lipasa">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8"></textarea>
        </fieldset>
    </form>
@endsection
