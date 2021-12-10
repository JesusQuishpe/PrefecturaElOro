@extends('laboratorio.plantillas.master')
@section('title', 'Hematologia-Actualizar')
@section('content')
    <h1 id="tipo_examen_title">Hematologia (Editar)</h1>
    <form id="formulario" method="POST"
        action="{{ route('hematologia.update', ['id_hematologia' => $hematologia->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_tipo" value="{{ $hematologia->id_tipo }}">
        <input type="hidden" name="id_cita" value="{{ $hematologia->id_cita }}">
        <fieldset>
            <h3>Selección del doctor</h3>
            <div class="container">
                <span>Doctor:</span>
                <select name="id_doc" id="select-doctor">
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{ $doctor->id === $hematologia->id_doc ? 'selected' : '' }}>
                            {{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="buttons-container">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-primary">Limpiar</button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @break
                    @endforeach
                </div>
            @endif
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Sedimento:</span>
                    <input type="text" name="sedimento" value="{{ $hematologia->sedimento }}">
                </div>
                <div class="grid-form-item">
                    <span>Hematocrito:</span>
                    <input type="text" name="hematocrito" value="{{ $hematologia->hematocrito }}">
                </div>
                <div class="grid-form-item">
                    <span>Hemoglobina:</span>
                    <input type="text" name="hemoglobina" value="{{ $hematologia->hemoglobina }}">
                </div>
                <div class="grid-form-item">
                    <span>Hematies:</span>
                    <input type="text" name="hematies" value="{{ $hematologia->hematies }}">
                </div>
                <div class="grid-form-item">
                    <span>Leucocitos:</span>
                    <input type="text" name="leucocitos" value="{{ $hematologia->leucocitos }}">
                </div>
            </div>
            <h3>Formula Leucocitaria</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Segmentados:</span>
                    <input type="text" name="segmentados" value="{{ $hematologia->segmentados }}">
                </div>
                <div class="grid-form-item">
                    <span>Linfocitos:</span>
                    <input type="text" name="linfocitos" value="{{ $hematologia->linfocitos }}">
                </div>
                <div class="grid-form-item">
                    <span>Eosinofilos:</span>
                    <input type="text" name="eosinofilos" value="{{ $hematologia->eosinofilos }}">
                </div>
                <div class="grid-form-item">
                    <span>Monocitos:</span>
                    <input type="text" name="monocitos" value="{{ $hematologia->monocitos }}">
                </div>
            </div>
            <h3>Hemostasia</h3>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>T.Coagulación:</span>
                    <input type="text" name="t_coagulacion" value="{{ $hematologia->t_coagulacion }}">
                </div>
                <div class="grid-form-item">
                    <span>T.Sangría:</span>
                    <input type="text" name="t_sangria" value="{{ $hematologia->t_sangria }}">
                </div>
                <div class="grid-form-item">
                    <span>R.Plaquetas:</span>
                    <input type="text" name="t_plaquetas" value="{{ $hematologia->t_plaquetas }}">
                </div>
                <div class="grid-form-item">
                    <span>T.Protombina(T:</span>
                    <input type="text" name="t_protombina_tp" value="{{ $hematologia->t_protombina_tp }}">
                </div>
                <div class="grid-form-item">
                    <span>T.Parcial de Tromboplastine(TP:</span>
                    <input type="text" name="t_parcial_de_tromboplastine"
                        value="{{ $hematologia->t_parcial_de_tromboplastine }}">
                </div>
                <div class="grid-form-item">
                    <span>Fibrinogeno:</span>
                    <input type="text" name="fibrinogeno" value="{{ $hematologia->fibrinogeno }}">
                </div>
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30"
                rows="8">{{ $hematologia->observaciones }}</textarea>
        </fieldset>
    </form>
@endsection
