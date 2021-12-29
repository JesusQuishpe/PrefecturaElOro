@extends('laboratorio.plantillas.master')
@section('title', 'Coproparasitario-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Coprología (Editar)</h1>
    <form id="formulario" method="POST"
        action="{{ route('coproparasitario.update', ['id_coproparasitario' => $coproparasitario->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $coproparasitario->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $coproparasitario->id_cita }}">
        <fieldset>
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
                    <div class="col">
                        <span>Protozoarios:</span>
                        <input type="text" class="form-control" name="protozoarios" value="{{ $coproparasitario->protozoarios }}">
                    </div>
                    <div class="col">
                        <span>Ameba Histolica:</span>
                        <input type="text" class="form-control" name="ameba_histolitica" value="{{ $coproparasitario->ameba_histolitica }}">
                    </div>
                    <div class="col">
                        <span>Ameba Coli:</span>
                        <input type="text" class="form-control" name="ameba_coli" value="{{ $coproparasitario->ameba_coli }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Giardia lmblia:</span>
                        <input type="text" class="form-control" name="giardia_lmblia" value="{{ $coproparasitario->giardia_lmblia }}">
                    </div>
                    <div class="col">
                        <span>Trichomona Homnis:</span>
                        <input type="text" class="form-control" name="trichomona_hominis" value="{{ $coproparasitario->trichomona_hominis }}">
                    </div>
                    <div class="col">
                        <span>Chilomatik Mes</span>
                        <input type="text" class="form-control" name="chilomastik_mesnile" value="{{ $coproparasitario->chilomastik_mesnile }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Helmintos</span>
                        <input type="text" class="form-control" name="helmintos" value="{{ $coproparasitario->helmintos }}">
                    </div>
                    <div class="col">
                        <span>Trichuris Trichura</span>
                        <input type="text" class="form-control" name="trichuris_trichura" value="{{ $coproparasitario->trichuris_trichura }}">
                    </div>
                    <div class="col">
                        <span>Ascaris Lumbicoide</span>
                        <input type="text" class="form-control" name="ascaris_lumbricoides" value="{{ $coproparasitario->ascaris_lumbricoides }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Strongyloides Stecolaries</span>
                        <input type="text" class="form-control" name="strongyloides_stercolarie" value="{{ $coproparasitario->strongyloides_stercolarie }}">
                    </div>
                    <div class="col">
                        <span>Oxiuros</span>
                        <input type="text" class="form-control" name="oxiuros" value="{{ $coproparasitario->oxiuros }}">
                    </div>
                    <div class="col"></div>
                </div>
            </div>

            <h3>Observaciones</h3>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="8">{{ $coproparasitario->observaciones }}</textarea>
        </fieldset>
    </form>
@endsection
