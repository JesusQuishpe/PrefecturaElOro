<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300&display=swap"
        rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cb939f18a3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('scss/odontologia/historial.css') }}">

</head>

<body style="min-height: 100vh;height: 100vh;">
    <input type="hidden" value={{ $idOdo }} id="input-idOdo">
    <button id="visualizar">Visualizar</button>
    <div class="content-historial">
        @csrf
        <div class="main-odo">
            <div class="header">
                <div class="head">

                </div>
                <div class="title">
                    Información del paciente
                </div>
            </div>
            








            <!--
            <div class="body">
                
                <section id="datos-personales">
                    <h3>Datos personales</h3>
                    <div class="container">
                        <table id="tb-datos">
                            <tr>
                                <td>Cedula:</td>
                                <td id="cedula"></td>
                                <td>Sexo:</td>
                                <td id="sexo"></td>
                                <td>Provincia:</td>
                                <td id="provincias"></td>
                            </tr>
                            <tr>
                                <td>Nombres:</td>
                                <td id="nombres"></td>
                                <td>Edad:</td>
                                <td id="edad">24 años</td>
                                <td>Ciudad:</td>
                                <td id="ciudad"></td>
                            </tr>
                            <tr>
                                <td>Apellidos:</td>
                                <td id="apellidos"></td>
                                <td>Celular:</td>
                                <td id="telefono"></td>
                            </tr>
                        </table>
                    </div>
                </section>
                <section id="antecedentes">
                    <h3>Antecedentes personales y familiares</h3>
                    <div class="container">
                        <span>Antecedentes:</span>
                        <p id="ant-list">

                        </p>

                        <span>Descripción:</span>
                        <p id="ant-descripcion"></p>
                    </div>
                </section>
                <section id="examen">
                    <h3>Examen del sistema estomatognático</h3>
                    <div class="container">
                        <span>Patologías:</span>
                        <p id="exa-list">
                        </p>
                        <span>Descripción:</span>
                        <p id="exa-descripcion"></p>
                    </div>
                </section>
                <section id="indicadores">
                    <h3>Indicadores de salud bucal</h3>
                    <div class="container">
                        <div class="flex">
                            <div>
                                <span>Enfermedad periodontal:</span>
                                <span id="enf-periodontal"></span>
                            </div>
                            <div>
                                <span>Mal oclusión:</span>
                                <span id="mal-oclu"></span>
                            </div>
                            <div>
                                <span>Fluorosis:</span>
                                <span id="fluorosis"></span>
                            </div>
                        </div>
                        <table id="tb-piezas">
                            <thead>
                                <tr>
                                    <th>Piezas dentales</th>
                                    <th>Placa 0-1-2-3-9</th>
                                    <th>Cálculo 0-1-2-3</th>
                                    <th>Gingivitis 0-1</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="piezas-container">
                                            <div class="pieza-item">
                                                <div><span>16</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>17</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>55</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="piezas-container">
                                            <div class="pieza-item">
                                                <div><span>11</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>21</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>51</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="piezas-container">
                                            <div class="pieza-item">
                                                <div><span>26</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>27</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>65</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="piezas-container">
                                            <div class="pieza-item">
                                                <div><span>36</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>37</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>75</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="piezas-container">
                                            <div class="pieza-item">
                                                <div><span>31</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>41</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>71</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="piezas-container">
                                            <div class="pieza-item">
                                                <div><span>46</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>47</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                            <div class="pieza-item">
                                                <div><span>85</span></div>
                                                <input type="checkbox" class="col-check" />
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <span>Totales</span>
                                    </td>
                                    <td id="total-placa">0</td>
                                    <td id="total-calc">0</td>
                                    <td id="total-gin">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
                <section id="indices">
                    <h3>Indices cpo-ceo</h3>
                    <div class="container">
                        <table id="tb-indices">

                            <tr>
                                <th rowspan="2">D</th>
                                <th>C</th>
                                <th>P</th>
                                <th>O</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td id="cpo-c">0</td>
                                <td id="cpo-p">0</td>
                                <td id="cpo-o">0</td>
                                <td id="cpo-total">0</td>
                            </tr>
                            <tr>
                                <th rowspan="2">d</th>
                                <th>c</th>
                                <th>e</th>
                                <th>o</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td id="ceo-c">0</td>
                                <td id="ceo-e">0</td>
                                <td id="ceo-o">0</td>
                                <td id="ceo-total">0</td>
                            </tr>
                        </table>
                    </div>
                </section>
                <section id="planes">
                    <h3>Planes de diagnótico, terapeutico y educacional</h3>
                    <div class="container">
                        <span>Plan:</span>
                        <p id="plan-list">Biometría</p>
                        <span>Descripción:</span>
                        <p id="plan-descripcion">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, harum
                            recusandae! Dignissimos iure, explicabo tenetur magnam nihil ullam fugit officia sit saepe
                            minima, eveniet eaque eligendi consectetur. Voluptate, asperiores vitae?</p>
                    </div>
                </section>
                <section id="diagnosticos">
                    <h3>Diagnósticos</h3>

                </section>
                <section id="tratamientos">
                    <h3>Tratamientos</h3>

                </section>
                <section id="seccion-odontograma">
                    <h3>Odontograma</h3>
                    <div class="odo-container">

                    </div>
                </section>
            </div>-->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="{{ asset('js/historial.js') }}" type="module"></script>

</body>

</html>
