<!DOCTYPE html>
<html>

<head>
    <title>Listado Caja</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="application/javascript">
        function mostrar(i, idpac) {
            var table = document.querySelector('#tabla-buscar tbody');
            console.log(table);
            document.getElementById('idpac').value = idpac;
            document.getElementById('cedula').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[0]
                .innerText;
            document.getElementById('apellidos').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[1]
                .innerText;
            document.getElementById('nombres').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[2]
                .innerText;
            document.getElementById('fecha_nacimiento').value = table.getElementsByTagName("tr")[i].getElementsByTagName(
                "td")[3].innerText;
            document.getElementById('sexo').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[4]
                .innerText;
            document.getElementById('telefono').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[5]
                .innerText;
            document.getElementById('domicilio').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[6]
                .innerText;
        }
    </script>

</head>

<body class="min-vh-100 vh-100 overflow-auto p-5">
    <input type="hidden" id="idpac" value=-1>
    <header class="d-flex justify-content-center" style="margin: 15px;">
        <h1>CENTRO DE MEDICO</h1>
    </header>
    <div>


        <form action="" id="form-caja">
			@csrf
            <div class="d-flex align-items-center w-50 mx-auto mb-4">
                <input type="text" class="form-control me-2 w-100" id="buscar-cedula" placeholder="Buscar por cedula" />
                <input class="btn btn-secondary" type="submit" name="btn1" value=">>" id="buscar" />
            </div>
            <div class="w-50 mx-auto mb-3">
                <div class="d-flex flex-column">
                    <div class="">
                        <div class="row mb-1">
                            <div class="col">Fecha (DD-MM-YYYY)</div>
                            <div class="col"><input type="text" class="form-control" name="fecha"
                                    id="fecha" disabled /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Cedula</div>
                            <div class="col"><input type="text" class="form-control" name="cedula"
                                    id="cedula" maxLength="10" /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Apellidos</div>
                            <div class="col"><input type="text" class="form-control" name="apellidos"
                                    id="apellidos" /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Nombres</div>
                            <div class="col"><input type="text" class="form-control" name="nombres"
                                    id="nombres" /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Nacimiento (DD-MM-YYYY)</div>
                            <div class="col"><input class="form-control" type="date" name="fechaNacimiento"
                                    id="fecha_nacimiento" /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Sexo)</div>
                            <div class="col">
                                <select class="form-control" name="sexo" id="sexo">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Telefono</div>
                            <div class="col"><input type="text" class="form-control" name="telefono"
                                    id="telefono" maxLength="10" placeholder="(07)2xxx-xxx" /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Domicilio</div>
                            <div class="col"><input type="text" class="form-control" name="domicilio"
                                    id="domicilio" maxLength="50" /></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Provincias</div>
                            <div class="col">
                                <select name="provincia" id="provincia" class="form-control">
                                    <option value="El Oro">El Oro</option>
                                    <option>Azuay</option>
                                    <option>Bolívar</option>
                                    <option>Cañar</option>
                                    <option>Carchi</option>
                                    <option>Chimborazo</option>
                                    <option>Cotopaxi</option>
                                    <option>Esmeraldas</option>
                                    <option>Galápagos</option>
                                    <option>Guayas</option>
                                    <option>Imbabura</option>
                                    <option>Loja</option>
                                    <option>Los Rios</option>
                                    <option>Manabi</option>
                                    <option>Morona Santiago</option>
                                    <option>Napo</option>
                                    <option>Orellana</option>
                                    <option>Pastaza</option>
                                    <option>Pichincha</option>
                                    <option>Santa Elena</option>
                                    <option>Santo Domingo</option>
                                    <option>Sucumbíos</option>
                                    <option>Tungurahua</option>
                                    <option>Zamora</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Ciudad</div>
                            <div class="col">
                                <select name="ciudad" id="ciudad" class="form-select">
                                    <option value="Machala">Machala</option>
                                    <option value="">Arenillas</option>
                                    <option value="">Atahualpa</option>
                                    <option value="">Balsas</option>
                                    <option value="">Chilla</option>
                                    <option value="">El Guabo</option>
                                    <option value="">Huaquillas</option>
                                    <option value="">Las Lajas</option>
                                    <option value="">Marcabeli</option>
                                    <option value="">Pasaje</option>
                                    <option value="">Piñas</option>
                                    <option value="">Portovelo</option>
                                    <option value="">Santa Rosa</option>
                                    <option value="">Zaruma</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">Area a Atenderse</div>
                            <div class="col">
                                <select name="area" id="area" class="form-select">
                                    <option value="Medicina">Medicina</option>
                                    <option value="Pediatria">Pediatria</option>
                                    <option value="Ginecologia">Ginecologia</option>
                                    <option value="Reumatologia">Reumatologia</option>
                                    <option value="Dermatologia">Dermatologia</option>
                                    <option value="Terapia Energetica">Terapia Energetica</option>
                                    <option value="Terapia Fisica">Terapia Fisica</option>
                                    <option value="Terapia Respiratoria">Terapia Respiratoria</option>
                                    <option value="Cardiologia">Cardiologia</option>
                                    <option value="Alergologia">Alergologia</option>
                                    <option value="Laboratorio">Laboratorio</option>
                                    <option value="Odontologia">Odontologia</option>
                                    <option value="Psicologia">Psicologia</option>
                                    <option value="Inyeccion">Inyeccion</option>
                                    <option value="Curacion">Curacion</option>
                                    <option value="Presion Arterial">Presion Arterial</option>
                                    <option value="Ecografia">Ecografia</option>
                                </select>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">Valor</div>
                            <div class="col"><input type="number" class="form-control" name="valor"
                                    step="0.01" min="0.00" maxLength="4" placeholder="$2.00" id="valor" /></div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <input class="btn" type="submit" name="btn1" value="Actualizar" disabled />
                            <input class="btn" type="submit" name="btn1" value="Eliminar" disabled />
                            <input class="btn btn-primary" type="submit" name="btn1" value="Agregar" id="agregar" />
                        </div>
                        <a href="/">Atras</a>
                    </div>
                </div>

            </div>
        </form>
        <div class="w-50 mx-auto mb-4">
            <form action="" id="form-busqueda">
                <h4 class="text-center">Buscar por cédula o apellidos</h4>
                <div class="d-flex align-items-center ">
                    <input type="text" class="form-control me-2 w-100" 
                        placeholder="Buscar por cedula o apellido" id="inp-opcion"/>
                    <input class="btn btn-secondary" type="submit" name="btn1" value=">>" id="ver"/>
                </div>
            </form>
        </div>
        <table class="table" id="tabla-buscar">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Llenar cita</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <footer id="aranda">
        <h3 class="text-center">CENTRO DE COMPUTO 2016</h3>
        <div class="w-100 d-flex justify-content-center text-center">
            <div>
                <h6>Lic. Christian Matamoros e Tnglo. Jose Morales</h6>
                <h6>Ing. Hernan Sanchez</h6>
                <h6>Secretaria Computo : Diana Rojas</h6>
                <h6>Ext. 604 - 605</h6>
                <h6>© 2016-2017 Php y MYSQL</h6>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/caja.js') }}" type="module"></script>
</body>

</html>
