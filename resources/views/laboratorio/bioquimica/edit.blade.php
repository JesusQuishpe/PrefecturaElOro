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
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{ $error }}</li>
                        @break
            @endforeach
            </ul>
            </div>
            @endif
            <div class="grid-form">
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Glucosa:</span>
                        <input type="text" class="form-control" name="glucosa" value="{{$bioquimica->glucosa}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Urea:</span>
                        <input type="text" class="form-control" name="urea" value="{{$bioquimica->urea}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Creátinina:</span>
                        <input type="text" class="form-control" name="creatinina" value="{{$bioquimica->creatinina}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Ácido úrico:</span>
                        <input type="text" class="form-control" name="acido_urico" value="{{$bioquimica->acido_urico}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Colesterol total:</span>
                        <input type="text" class="form-control" name="colesterol_total" value="{{$bioquimica->colesterol_total}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Colesterol hdl:</span>
                        <input type="text" class="form-control" name="colesterol_hdl" value="{{$bioquimica->colesterol_hdl}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Colesterol ldl:</span>
                        <input type="text" class="form-control" name="colesterol_ldl" value="{{$bioquimica->colesterol_ldl}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Trigliceridos:</span>
                        <input type="text" class="form-control" name="trigliceridos" value="{{$bioquimica->trigliceridos}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteínas totales:</span>
                        <input type="text" class="form-control" name="proteinas_totales" value="{{$bioquimica->proteinas_totales}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Albumina:</span>
                        <input type="text" class="form-control" name="albumina" value="{{$bioquimica->albumina}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Globulina:</span>
                        <input type="text" class="form-control" name="globulina" value="{{$bioquimica->globulina}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Relación A/G:</span>
                        <input type="text" class="form-control" name="relacion_ag" value="{{$bioquimica->relacion_ag}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Bilirrubina directa:</span>
                        <input type="text" class="form-control" name="bilirrubina_directa" value="{{$bioquimica->bilirrubina_directa}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Bilirrubina indirecta:</span>
                        <input type="text" class="form-control" name="bilirrubina_indirecta" value="{{$bioquimica->bilirrubina_indirecta}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Bilirrubina total:</span>
                        <input type="text" class="form-control" name="bilirrubina_total" value="{{$bioquimica->bilirrubina_total}}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col d-flex flex-column">
                        <span>Gamma glutámil transp:</span>
                        <input type="text" class="form-control" name="gamma_gt" value="{{$bioquimica->gamma_gt}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Calcio:</span>
                        <input type="text" class="form-control" name="calcio" value="{{$bioquimica->calcio}}">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <h3>Inmunología</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>VDRL:</span>
                        <input type="text" class="form-control" name="vdrl" value="{{$bioquimica->vdrl}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteína C react:</span>
                        <input type="text" class="form-control" name="proteinas_c_react" value="{{$bioquimica->proteinas_c_react}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>R.A test (latex):</span>
                        <input type="text" class="form-control" name="ra_test_latex" value="{{$bioquimica->ra_test_latex}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>A.S.T.O:</span>
                        <input type="text" class="form-control" name="asto" value="{{$bioquimica->asto}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Salmonella O:</span>
                        <input type="text" class="form-control" name="salmonella_o" value="{{$bioquimica->salmonella_o}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Salmonella H:</span>
                        <input type="text" class="form-control" name="salmonella_h" value="{{$bioquimica->salmonella_h}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Paratifica A:</span>
                        <input type="text" class="form-control" name="paratifica_a" value="{{$bioquimica->paratifica_a}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Paratifica B:</span>
                        <input type="text" class="form-control" name="paratifica_b" value="{{$bioquimica->paratifica_b}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteus 0x19:</span>
                        <input type="text" class="form-control" name="proteus_0x19" value="{{$bioquimica->proteus_0x19}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Proteus 0x2:</span>
                        <input type="text" class="form-control" name="proteus_0x2" value="{{$bioquimica->proteus_0x2}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteus 0xK:</span>
                        <input type="text" class="form-control" name="proteus_0xk" value="{{$bioquimica->proteus_0xk}}">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <h3>Enzimas</h3>
            <div class="grid-form">
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Transaminasa 0X:</span>
                        <input type="text" class="form-control" name="transaminasa_ox" value="{{$bioquimica->transaminasa_ox}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Transaminasa PIR:</span>
                        <input type="text" class="form-control" name="transaminasa_pir" value="{{$bioquimica->transaminasa_pir}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Fosfatasa alcalina adulto:</span>
                        <input type="text" class="form-control" name="fosfatasa_alcalina_adultos" value="{{$bioquimica->fosfatasa_alcalina_adultos}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Fosfatasa alcalina niño:</span>
                        <input type="text" class="form-control" name="fosfatasa_alcalina_ninos" value="{{$bioquimica->fosfatasa_alcalina_ninos}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Amilasa:</span>
                        <input type="text" class="form-control" name="amilasa" value="{{$bioquimica->amilasa}}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Lipasa:</span>
                        <input type="text" class="form-control" name="lipasa" value="{{$bioquimica->lipasa}}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{$bioquimica->observaciones}}</textarea>
        </fieldset>
    </form>
@endsection
