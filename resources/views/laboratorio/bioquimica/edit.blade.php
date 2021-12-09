@extends('laboratorio.plantillas.master')
@section('title', 'Bioquimica-Editar')
@section('content')
    <h1 id="tipo_examen_title">Bioquímica Sanguinea (Editar)</h1>
    <form id="formulario" method="POST" action="{{ route('bioquimica.update', ['id_bioquimica' => $bioquimica->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $bioquimica->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $bioquimica->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{$doctor->id===$bioquimica->id_doc ? 'selected' : ''}}>{{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
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
                    <span>Glucosa:</span>
                    <input type="text" name="glucosa" value="{{ $bioquimica->glucosa }}">
                </div>
                <div class="grid-form-item">
                    <span>Urea:</span>
                    <input type="text" name="urea" value="{{ $bioquimica->urea }}">
                </div>
                <div class="grid-form-item">
                    <span>Creátinina:</span>
                    <input type="text" name="creatinina" value="{{ $bioquimica->creatinina }}">
                </div>
                <div class="grid-form-item">
                    <span>Ácido úrico:</span>
                    <input type="text" name="acido_urico" value="{{ $bioquimica->acido_urico }}">
                </div>
                <div class="grid-form-item">
                    <span>Colesterol total:</span>
                    <input type="text" name="colesterol_total" value="{{ $bioquimica->colesterol_total }}">
                </div>
                <div class="grid-form-item">
                    <span>Colesterol hdl:</span>
                    <input type="text" name="colesterol_hdl" value="{{ $bioquimica->colesterol_hdl }}">
                </div>
                <div class="grid-form-item">
                    <span>Colesterol ldl:</span>
                    <input type="text" name="colesterol_ldl" value="{{ $bioquimica->colesterol_ldl }}">
                </div>
                <div class="grid-form-item">
                    <span>Trigliceridos:</span>
                    <input type="text" name="trigliceridos" value="{{ $bioquimica->trigliceridos }}">
                </div>
                <div class="grid-form-item">
                    <span>Proteínas totales:</span>
                    <input type="text" name="proteinas_totales" value="{{ $bioquimica->proteinas_totales }}">
                </div>
                <div class="grid-form-item">
                    <span>Albumina:</span>
                    <input type="text" name="albumina" value="{{ $bioquimica->albumina }}">
                </div>
                <div class="grid-form-item">
                    <span>Globulina:</span>
                    <input type="text" name="globulina" value="{{ $bioquimica->globulina }}">
                </div>
                <div class="grid-form-item">
                    <span>Relación A/G:</span>
                    <input type="text" name="relacion_ag" value="{{ $bioquimica->relacion_ag }}">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina directa:</span>
                    <input type="text" name="bilirrubina_directa" value="{{ $bioquimica->bilirrubina_directa }}">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina indirecta:</span>
                    <input type="text" name="bilirrubina_indirecta" value="{{ $bioquimica->bilirrubina_indirecta }}">
                </div>
                <div class="grid-form-item">
                    <span>Bilirrubina total:</span>
                    <input type="text" name="bilirrubina_total" value="{{ $bioquimica->bilirrubina_total }}">
                </div>
                <div class="grid-form-item">
                    <span>Gamma glutámil transp:</span>
                    <input type="text" name="gamma_gt" value="{{ $bioquimica->gamma_gt }}">
                </div>
                <div class="grid-form-item">
                    <span>Calcio:</span>
                    <input type="text" name="calcio" value="{{ $bioquimica->calcio }}">
                </div>
            </div>
            <h3>Inmunología</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>VDRL:</span>
                    <input type="text" name="vdrl" value="{{ $bioquimica->vdrl }}">
                </div>
                <div class="grid-form-item">
                    <span>Proteína C react:</span>
                    <input type="text" name="proteinas_c_react" value="{{ $bioquimica->proteinas_c_react }}">
                </div>
                <div class="grid-form-item">
                    <span>R.A test (latex):</span>
                    <input type="text" name="ra_test_latex" value="{{ $bioquimica->ra_test_latex }}">
                </div>
                <div class="grid-form-item">
                    <span>A.S.T.O:</span>
                    <input type="text" name="asto" value="{{ $bioquimica->asto }}">
                </div>
                <div class="grid-form-item">
                    <span>Salmonella O:</span>
                    <input type="text" name="salmonella_o" value="{{ $bioquimica->salmonella_o }}">
                </div>
                <div class="grid-form-item">
                    <span>Salmonella H:</span>
                    <input type="text" name="salmonella_h" value="{{ $bioquimica->salmonella_h }}">
                </div>
                <div class="grid-form-item">
                    <span>Paratifica A:</span>
                    <input type="text" name="paratifica_a" value="{{ $bioquimica->paratifica_a }}">
                </div>
                <div class="grid-form-item">
                    <span>Paratifica B:</span>
                    <input type="text" name="paratifica_b" value="{{ $bioquimica->paratifica_b }}">
                </div>
                <div class="grid-form-item">
                    <span>Proteus 0x19:</span>
                    <input type="text" name="proteus_0x19" value="{{ $bioquimica->proteus_0x19 }}">
                </div>
                <div class="grid-form-item">
                    <span>Proteus 0x2:</span>
                    <input type="text" name="proteus_0x2" value="{{ $bioquimica->proteus_0x2 }}">
                </div>
                <div class="grid-form-item">
                    <span>Proteus 0xK:</span>
                    <input type="text" name="proteus_0xk" value="{{ $bioquimica->proteus_0xk }}">
                </div>
            </div>
            <h3>Enzimas</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Transaminasa 0X:</span>
                    <input type="text" name="transaminasa_ox" value="{{ $bioquimica->transaminasa_ox }}">
                </div>
                <div class="grid-form-item">
                    <span>Transaminasa PIR:</span>
                    <input type="text" name="transaminasa_pir" value="{{ $bioquimica->transaminasa_pir }}">
                </div>
                <div class="grid-form-item">
                    <span>Fosfatasa alcalina adulto:</span>
                    <input type="text" name="fosfatasa_alcalina_adultos"
                        value="{{ $bioquimica->fosfatasa_alcalina_adultos }}">
                </div>
                <div class="grid-form-item">
                    <span>Fosfatasa alcalina niño:</span>
                    <input type="text" name="fosfatasa_alcalina_ninos" value="{{ $bioquimica->fosfatasa_alcalina_ninos }}">
                </div>
                <div class="grid-form-item">
                    <span>Amilasa:</span>
                    <input type="text" name="amilasa" value="{{ $bioquimica->amilasa }}">
                </div>
                <div class="grid-form-item">
                    <span>Lipasa:</span>
                    <input type="text" name="lipasa" value="{{ $bioquimica->lipasa }}">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30"
                rows="8">{{ $bioquimica->observaciones }}</textarea>
        </fieldset>
    </form>
@endsection
