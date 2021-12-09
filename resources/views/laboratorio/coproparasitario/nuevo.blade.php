@extends('laboratorio.plantillas.master')
@section('title', 'Bioquimica-Nuevo')
@section('content')
    @php
    $data = new stdClass();
    $data->title = 'Coproparasitario';
    $data->examen = 'Coproparasitario';
    @endphp

    @include('laboratorio.plantillas.searchForm',['data'=>$data])

    <h3>Selección del doctor</h3>
    <div class="container">
        <span>Doctor:</span>
        <select name="" id="select-doctor">
            <option value="">Jose Guillermo Diaz Peñafiel</option>
            <option value="">Josue Raul Zambrano Chuchuca</option>
        </select>
    </div>
    <h3>Insertar datos</h3>
    <form action="post" id="formulario">
        <div class="buttons-container">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-primary" >Limpiar</button>
        </div>
        <fieldset>
            <div class="grid-form">
                <div class="grid-form-item">
                    <span>Protozoarios:</span>
                    <input type="text" name="protozoarios">
                </div>
                <div class="grid-form-item">
                    <span>Ameba Histolitica:</span>
                    <input type="text" name="ameba_histolitica">
                </div>
                <div class="grid-form-item">
                    <span>Ameba Coli:</span>
                    <input type="text" name="ameba_coli">
                </div>
                <div class="grid-form-item">
                    <span>Giardia Lamblia:</span>
                    <input type="text" name="giardia_lamblia">
                </div>
                <div class="grid-form-item">
                    <span>Trichomona Hominis:</span>
                    <input type="text" name="trichomona_hominis">
                </div>
                <div class="grid-form-item">
                    <span>Chilomastik Mesnile:</span>
                    <input type="text" name="chilomastik_mesnile">
                </div>
                <div class="grid-form-item">
                    <span>Helmintos:</span>
                    <input type="text" name="helmintos">
                </div>
                <div class="grid-form-item">
                    <span>Trichuris Trichura:</span>
                    <input type="text" name="trichuris_trichura">
                </div>
                <div class="grid-form-item">
                    <span>Ascaris Lumbricoides:</span>
                    <input type="text" name="ascaris_lumbricoides">
                </div>
                <div class="grid-form-item">
                    <span>Strongyloides Stercolaries:</span>
                    <input type="text" name="strongyloides_stercolaries">
                </div>
                <div class="grid-form-item">
                    <span>Oxiuros:</span>
                    <input type="text" name="oxiuros">
                </div>
                
            </div>
            <h3>Observaciones</h3>
            <textarea name="observaciones" id="observaciones" cols="30" rows="8"></textarea>
        </fieldset>
    </form>
@endsection
