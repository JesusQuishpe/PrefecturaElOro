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
        <input type="hidden" name="id_cita"
            value="{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : '' }}">
        <fieldset {{ !isset($ultimaCita) || is_int($ultimaCita) ? 'disabled' : ' ' }}>
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
                    <div class="col d-flex flex-column">
                        <span>Glucosa (75 - 115 mg%):</span>
                        <input type="text" class="form-control" name="glucosa" value="{{ old('glucosa') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Urea (10 - 50 mg%):</span>
                        <input type="text" class="form-control" name="urea" value="{{ old('urea') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Creátinina (0.4 - 1.1 mg%):</span>
                        <input type="text" class="form-control" name="creatinina" value="{{ old('creatinina') }}">
                        <p class="d-none"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Ácido úrico (2.5 - 6 mg%):</span>
                        <input type="text" class="form-control" name="acido_urico" value="{{ old('acido_urico') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Colesterol total (150 - 200 mg%):</span>
                        <input type="text" class="form-control" id="colesterol_total" name="colesterol_total"
                            value="{{ old('colesterol_total') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Colesterol hdl (55 mg%):</span>
                        <input type="text" class="form-control" readonly id="colesterol_hdl" name="colesterol_hdl"
                            value="{{ old('colesterol_hdl') }}">
                        <p class="d-none"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Trigliceridos (200 mg%):</span>
                        <input type="text" class="form-control" id="trigliceridos" name="trigliceridos"
                            value="{{ old('trigliceridos') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Colesterol ldl (140 mg%):</span>
                        <input type="text" class="form-control" readonly id="colesterol_ldl" name="colesterol_ldl"
                            value="{{ old('colesterol_ldl') }}">
                        <p class="d-none"></p>
                    </div>

                    <div class="col d-flex flex-column">
                        <span>Proteínas totales (6 - 8 mg%):</span>
                        <input type="text" class="form-control" id="proteinas_totales" name="proteinas_totales"
                            value="{{ old('proteinas_totales') }}">
                        <p class="d-none"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Albumina (3.5 - 5.5 mg%):</span>
                        <input type="text" class="form-control" id="albumina" name="albumina"
                            value="{{ old('albumina') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Globulina (2.4 mg%):</span>
                        <input type="text" class="form-control" readonly id="globulina" name="globulina"
                            value="{{ old('globulina') }}">

                    </div>
                    <div class="col d-flex flex-column">
                        <span>Relación A/G (1.4 - 3):</span>
                        <input type="text" class="form-control" id="relacion_ag" readonly name="relacion_ag"
                            value="{{ old('relacion_ag') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Bilirrubina directa (0.25 mg%):</span>
                        <input type="text" class="form-control" id="bilirrubina_directa" name="bilirrubina_directa"
                            value="{{ old('bilirrubina_directa') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Bilirrubina total (1 mg%):</span>
                        <input type="text" class="form-control" id="bilirrubina_total" name="bilirrubina_total"
                            value="{{ old('bilirrubina_total') }}">
                        <p class="d-none"></p>
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Bilirrubina indirecta (1 mg%):</span>
                        <input type="text" class="form-control" id="bilirrubina_indirecta" name="bilirrubina_indirecta"
                            value="{{ old('bilirrubina_indirecta') }}" readonly>
                    </div>

                </div>
                <div class="row justify-content-start">
                    <div class="col d-flex flex-column">
                        <span>Gamma glutámil transp (9 - 61 U/L):</span>
                        <input type="text" class="form-control" name="gamma_gt" value="{{ old('gamma_gt') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Calcio (9 - 11 mg%):</span>
                        <input type="text" class="form-control" name="calcio" value="{{ old('calcio') }}">
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
                        <input type="text" class="form-control" name="vdrl" value="{{ old('vdrl') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteína C react:</span>
                        <input type="text" class="form-control" name="proteinas_c_react"
                            value="{{ old('proteinas_c_react') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>R.A test (latex):</span>
                        <input type="text" class="form-control" name="ra_test_latex"
                            value="{{ old('ra_test_latex') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>A.S.T.O:</span>
                        <input type="text" class="form-control" name="asto" value="{{ old('asto') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Salmonella O:</span>
                        <input type="text" class="form-control" name="salmonella_o" value="{{ old('salmonella_o') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Salmonella H:</span>
                        <input type="text" class="form-control" name="salmonella_h" value="{{ old('salmonella_h') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Paratifica A:</span>
                        <input type="text" class="form-control" name="paratifica_a" value="{{ old('paratifica_a') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Paratifica B:</span>
                        <input type="text" class="form-control" name="paratifica_b" value="{{ old('paratifica_b') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteus 0x19:</span>
                        <input type="text" class="form-control" name="proteus_0x19" value="{{ old('proteus_0x19') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Proteus 0x2:</span>
                        <input type="text" class="form-control" name="proteus_0x2" value="{{ old('proteus_0x2') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Proteus 0xK:</span>
                        <input type="text" class="form-control" name="proteus_0xk" value="{{ old('proteus_0xk') }}">
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
                        <input type="text" class="form-control" name="transaminasa_ox"
                            value="{{ old('transaminasa_ox') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Transaminasa PIR:</span>
                        <input type="text" class="form-control" name="transaminasa_pir"
                            value="{{ old('transaminasa_pir') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Fosfatasa alcalina adulto:</span>
                        <input type="text" class="form-control" name="fosfatasa_alcalina_adultos"
                            value="{{ old('fosfatasa_alcalina_adultos') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <span>Fosfatasa alcalina niño:</span>
                        <input type="text" class="form-control" name="fosfatasa_alcalina_ninos"
                            value="{{ old('fosfatasa_alcalina_ninos') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Amilasa:</span>
                        <input type="text" class="form-control" name="amilasa" value="{{ old('amilasa') }}">
                    </div>
                    <div class="col d-flex flex-column">
                        <span>Lipasa:</span>
                        <input type="text" class="form-control" name="lipasa" value="{{ old('lipasa') }}">
                    </div>
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/bioquimica.js') }}" type="module"></script>
@endsection
