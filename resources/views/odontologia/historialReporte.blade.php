<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/cb939f18a3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('scss/odontologia/reportes/historepo.css') }}">
</head>

<body>
    
    <header>

    </header>
    <main>
        <h2>HISTORIAL DEL PACIENTE</h2>
        <div>
            <span>FECHA:</span>
            <span>{{ $data['informacion']->fechaConsultaClie }}</span>
        </div>
        <h3>1. INFORMACIÓN PERSONAL</h3>
        <div class="info-container">
            <span>Nombres y apellidos: {{ $data['informacion']->nombres }}</span>
            <div>
                <span>Fecha de nacimiento: 17/07/1999</span>
                <span>Edad: 22 años</span>
                <span>Sexo: {{ $data['informacion']->sexo }}</span>
            </div>
            <div>
                <span>Celular: {{ $data['informacion']->telefono }}</span>
                <span>Provincia: {{ $data['informacion']->provincias }}</span>
                <span>Ciudad: {{ $data['informacion']->ciudad }}</span>
            </div>
        </div>
        <h3>2. MOTIVO DE LA CONSULTA</h3>
        <span>{{ $data['informacion']->motivoConsulta }}</span>
        <h3>3. ENFERMEDAD O PROBLEMA ACTUAL</h3>
        <span>{{ $data['informacion']->enfermedadProblema }}</span>
        <h3>4. ANTECEDENTES PERSONALES Y FAMILIARES</h3>
        <p>Antecedentes:</p>
        <div class="ant-container">
            
            @foreach ($antecedentes as $ant)
                <div class="ant-item">
                    <span>{{ $ant->nombre }}</span>
                    <input type="checkbox">
                </div>
            @endforeach
        </div>


        <span>Descripción:</span>
        <p id="ant-descripcion">{{ $data['antecedentes']['general']->descripcion }}</p>
        <h3>5. SIGNOS VITALES (Datos de enfermería)</h3>
        <p>Peso: {{ $data['informacion']->peso }}</p>
        <p>Estatura: {{ $data['informacion']->estatura }}</p>
        <p>Temperatura: {{ $data['informacion']->temperatura }}</p>
        <p>Presion: {{ $data['informacion']->presion }}</p>
        <h3>6. EXAMEN DEL SISTEMA ESTOMATOGNÁTICO</h3>
        <span>Patologías:</span>
        @php
            $exaList = '';
            foreach ($data['examen']['detalles'] as $exa) {
                $exaList .= $exa->nombre . ', ';
            }
            
        @endphp
        <p>{{ $exaList }}</p>
        <span>Descripción:</span>
        <p id="exa-descripcion">{{ $data['examen']['general']->descripcion }}</p>
        <h3>7. ODONTOGRAMA</h3>
        <h3>8. INDICADORES DE SALUD BUCAL</h3>
        <ol type="a">
            <li>
                <span>Enfermedad periodontal</span>
                <div>
                    <span>Leve</span>
                    <input type="checkbox">
                    <span>Moderada</span>
                    <input type="checkbox">
                    <span>Severa</span>
                    <input type="checkbox">
                </div>
            </li>
            <li>
                <span>Mal oclusión</span>
                <div>
                    <span>Leve</span>
                    <input type="checkbox">
                    <span>Moderada</span>
                    <input type="checkbox">
                    <span>Severa</span>
                    <input type="checkbox">
                </div>
            </li>
            <li>
                <span>Fluorosis</span>
                <div>
                    <span>Leve</span>
                    <input type="checkbox">
                    <span>Moderada</span>
                    <input type="checkbox">
                    <span>Severa</span>
                    <input type="checkbox">
                </div>
            </li>
        </ol>
        <table id="tb-piezas">
            <thead>
                <tr>
                    <th>Piezas dentales</th>
                    <th>Placa <br>0-1-2-3-9</th>
                    <th>Cálculo <br>0-1-2-3</th>
                    <th>Gingivitis <br>0-1</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-inline">
                        <div class="td-container">
                            <span>16</span>
                            <input type="checkbox">
                            <span>17</span>
                            <input type="checkbox">
                            <span>55</span>
                            <input type="checkbox">
                        </div>
                    </td>
                    <td>{{ $data['indicadores']['detalles'][0]->numPlaca }}</td>
                    <td>{{ $data['indicadores']['detalles'][0]->numCalc }}</td>
                    <td>{{ $data['indicadores']['detalles'][0]->numGin }}</td>
                </tr>
                <tr>
                    <td class="td-inline">
                        <div class="td-container">
                            <span>11</span>
                            <input type="checkbox">
                            <span>21</span>
                            <input type="checkbox">
                            <span>51</span>
                            <input type="checkbox">
                        </div>
                    </td>
                    <td>{{ $data['indicadores']['detalles'][1]->numPlaca }}</td>
                    <td>{{ $data['indicadores']['detalles'][1]->numCalc }}</td>
                    <td>{{ $data['indicadores']['detalles'][1]->numGin }}</td>
                </tr>
                <tr>
                    <td class="td-inline">
                        <div class="td-container">
                            <span>26</span>
                            <input type="checkbox">
                            <span>27</span>
                            <input type="checkbox">
                            <span>65</span>
                            <input type="checkbox">
                        </div>
                    </td>
                    <td>{{ $data['indicadores']['detalles'][2]->numPlaca }}</td>
                    <td>{{ $data['indicadores']['detalles'][2]->numCalc }}</td>
                    <td>{{ $data['indicadores']['detalles'][2]->numGin }}</td>
                </tr>
                <tr>
                    <td class="td-inline">
                        <div class="td-container">
                            <span>36</span>
                            <input type="checkbox">
                            <span>37</span>
                            <input type="checkbox">
                            <span>75</span>
                            <input type="checkbox">
                        </div>
                    </td>
                    <td>{{ $data['indicadores']['detalles'][3]->numPlaca }}</td>
                    <td>{{ $data['indicadores']['detalles'][3]->numCalc }}</td>
                    <td>{{ $data['indicadores']['detalles'][3]->numGin }}</td>
                </tr>
                <tr>
                    <td class="td-inline">
                        <div class="td-container">
                            <span>31</span>
                            <input type="checkbox">
                            <span>41</span>
                            <input type="checkbox">
                            <span>71</span>
                            <input type="checkbox">
                        </div>
                    </td>
                    <td>{{ $data['indicadores']['detalles'][4]->numPlaca }}</td>
                    <td>{{ $data['indicadores']['detalles'][4]->numCalc }}</td>
                    <td>{{ $data['indicadores']['detalles'][4]->numGin }}</td>
                </tr>
                <tr>
                    <td class="td-inline">
                        <div class="td-container">
                            <span>46</span>
                            <input type="checkbox">
                            <span>47</span>
                            <input type="checkbox">
                            <span>85</span>
                            <input type="checkbox">
                        </div>
                    </td>
                    <td>{{ $data['indicadores']['detalles'][5]->numPlaca }}</td>
                    <td>{{ $data['indicadores']['detalles'][5]->numCalc }}</td>
                    <td>{{ $data['indicadores']['detalles'][5]->numGin }}</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <span>Totales</span>
                    </td>
                    <td id="total-placa">{{ $data['indicadores']['general']->totalPlaca }}</td>
                    <td id="total-calc">{{ $data['indicadores']['general']->totalCalc }}</td>
                    <td id="total-gin">{{ $data['indicadores']['general']->totalGin }}</td>
                </tr>
            </tfoot>
        </table>
        <h3>9. INDICES CPO-CEO</h3>
        <table id="tb-indices">

            <tr>
                <th rowspan="2">D</th>
                <th>C</th>
                <th>P</th>
                <th>O</th>
                <th>Total</th>
            </tr>
            <tr>
                <td id="cpo-c">{{ $data['indices']->cd }}</td>
                <td id="cpo-p">{{ $data['indices']->pd }}</td>
                <td id="cpo-o">{{ $data['indices']->od }}</td>
                <td id="cpo-total">{{ $data['indices']->totalCpo }}</td>
            </tr>
            <tr>
                <th rowspan="2">d</th>
                <th>c</th>
                <th>e</th>
                <th>o</th>
                <th>Total</th>
            </tr>
            <tr>
                <td id="ceo-c">{{ $data['indices']->ce }}</td>
                <td id="ceo-e">{{ $data['indices']->ee }}</td>
                <td id="ceo-o">{{ $data['indices']->oe }}</td>
                <td id="ceo-total">{{ $data['indices']->totalCeo }}</td>
            </tr>
        </table>
    </main>

</body>

</html>
