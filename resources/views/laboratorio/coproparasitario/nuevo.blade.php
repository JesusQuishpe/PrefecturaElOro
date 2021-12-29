@extends('laboratorio.plantillas.master')
@section('title', 'Coproparasitario-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Coproparasitario';
    $data->examen = 'coproparasitario';
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
    <form method="POST" id="formulario" action="{{ route('coproparasitario.guardar') }}">
        @csrf
        <input type="hidden" name="id_tipo" value="3">
        <input type="hidden" name="id_cita" value="{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->id_cita : '' }}">
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
            <div class="grid-form">
                <div class="row">
                    <div class="col">
                        <span>Protozoarios:</span>
                        <input type="text" class="form-control" name="protozoarios" value="{{ old('protozoarios') }}">
                    </div>
                    <div class="col">
                        <span>Ameba Histolica:</span>
                        <input type="text" class="form-control" name="ameba_histolitica" value="{{ old('ameba_histolitica') }}">
                    </div>
                    <div class="col">
                        <span>Ameba Coli:</span>
                        <input type="text" class="form-control" name="ameba_coli" value="{{ old('ameba_coli') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Giardia lmblia:</span>
                        <input type="text" class="form-control" name="giardia_lmblia" value="{{ old('giardia_lmblia') }}">
                    </div>
                    <div class="col">
                        <span>Trichomona Homnis:</span>
                        <input type="text" class="form-control" name="trichomona_hominis" value="{{ old('trichomona_hominis') }}">
                    </div>
                    <div class="col">
                        <span>Chilomatik Mes</span>
                        <input type="text" class="form-control" name="chilomastik_mesnile" value="{{ old('chilomastik_mesnile') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Helmintos</span>
                        <input type="text" class="form-control" name="helmintos" value="{{ old('helmintos') }}">
                    </div>
                    <div class="col">
                        <span>Trichuris Trichura</span>
                        <input type="text" class="form-control" name="trichuris_trichura" value="{{ old('trichuris_trichura') }}">
                    </div>
                    <div class="col">
                        <span>Ascaris Lumbicoide</span>
                        <input type="text" class="form-control" name="ascaris_lumbricoides" value="{{ old('ascaris_lumbricoides') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Strongyloides Stecolaries</span>
                        <input type="text" class="form-control" name="strongyloides_stercolarie" value="{{ old('strongyloides_stercolarie') }}">
                    </div>
                    <div class="col">
                        <span>Oxiuros</span>
                        <input type="text" class="form-control" name="oxiuros" value="{{ old('oxiuros') }}">
                    </div>
                    <div class="col"></div>
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{ old('observaciones') }}</textarea>
        </fieldset>
    </form>
@endsection
