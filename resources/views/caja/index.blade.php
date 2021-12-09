<!DOCTYPE html>
<html>
<head>
	<title>Listado Caja</title>
	
	<link rel="stylesheet" href="{{ asset('scss/caja/caja.css') }}">
	<script type="application/javascript">
		function mostrar(i,idpac) {
			var table = document.querySelector('#tb-pacientes-busqueda tbody');
			console.log(table);
			document.getElementById('idpac').value=idpac;
			document.getElementById('cedula').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[0].innerText;
			document.getElementById('apellidos').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[1].innerText;
			document.getElementById('nombres').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[2].innerText;
			document.getElementById('fecha_nacimiento').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[3].innerText;
			document.getElementById('sexo').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[4].innerText;
			document.getElementById('telefono').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[5].innerText;
			document.getElementById('domicilio').value = table.getElementsByTagName("tr")[i].getElementsByTagName("td")[6].innerText;
		}
	</script>

</head>

<body>
	<input type="hidden" id="idpac" value=-1>
	<header class="centrar" style="margin: 15px;">
		<h2 class="bg-dark">CENTRO DE MEDICO</h2>
	</header>
	<div id="">
		<section id="">
			<section id="">
				<form id="form-caja">
					@csrf
					<div class="centrar">
						<table id='tabla2'>
							<tr>
								<td>Buscar por Cedula</td>
								<td><input type="text" id="buscar-cedula" /></td>
								<td><input type="submit" name="btn1" value=">>" id="buscar" /></td>
							</tr>

						</table>

						<table>
							<tr>
								<td>Fecha (DD-MM-YYYY)</td>
								<td><input type="text" name="fecha" id="fecha" disabled /></td>
							</tr>
							<tr>
								<td>Cedula</td>
								<td><input type="text" name="cedula" id="cedula" maxlength="10" /></td>
							</tr>
							<tr>
								<td>Apellidos</td>
								<td><input type="text" name="apellidos" id="apellidos" /></td>
							</tr>
							<tr>
								<td>Nombres</td>
								<td><input type="text" name="nombres" id="nombres" /></td>
							</tr>
							<tr>
								<td>Nacimiento (DD-MM-YYYY)</td>
								<td><input type="date" name="fecha_nacimiento" id="fecha_nacimiento" /></td>
							</tr>
							<tr>
								<td>Sexo</td>
								<td><select name="sexo" id="sexo">
										<option selected>Masculino</option>
										<option>Femenino</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Telefono</td>
								<td><input type="text" type="" name="telefono" id="telefono" maxlength="10" placeholder="(07)2xxx-xxx" /></td>
							</tr>
							<tr>
								<td>Domicilio</td>
								<td><input type="text" name="domicilio" id="domicilio" maxlength="50" /></td>
							</tr>
							<tr>
								<td>Provincias</td>
								<td><select name="provincias" id="provincia">
										<option>El Oro</option>
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
								</td>
							</tr>
							<tr>
								<td>Ciudad</td>
								<td><select name="ciudad" id="ciudad">
										<option>Machala</option>
										<option>Arenillas</option>
										<option>Atahualpa</option>
										<option>Balsas</option>
										<option>Chilla</option>
										<option>El Guabo</option>
										<option>Huaquillas</option>
										<option>Las Lajas</option>
										<option>Marcabeli</option>
										<option>Pasaje</option>
										<option>Piñas</option>
										<option>Portovelo</option>
										<option>Santa Rosa</option>
										<option>Zaruma</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Area a Atenderse</td>
								<td><select name="area" id="area">
										<option>Medicina</option>
										<option>Pediatria</option>
										<option>Ginecologia</option>
										<option>Reumatologia</option>
										<option>Dermatologia</option>
										<option>Terapia Energetica</option>
										<option>Terapia Fisica</option>
										<option>Terapia Respiratoria</option>
										<option>Cardiologia</option>
										<option>Alergologia</option>
										<option>Laboratorio</option>
										<option>Odontologia</option>
										<option>Psicologia</option>
										<option>Inyeccion</option>
										<option>Curacion</option>
										<option>Presion Arterial</option>
										<option>Ecografia</option>
									</select>
								</td>
							</tr>

							<tr>
								<td>Valor</td>
								<td><input type="number" name="valor" step="0.01" min="0.00" maxlength="4" placeholder="$2.00" id="valor" /></td>
							</tr>
							<!--<tr>
								<td>Factura</td>
								<td><input type="text" name="factura" maxlength="16" placeholder="001-0001-999999"  /></td>
							</tr>-->
							<tr>
								<td colspan="2" class="centrar-td">
									<input type="submit" name="btn1" value="Actualizar" DISABLED />
									<input type="submit" name="btn1" value="Eliminar" DISABLED />
									<input type="submit" name="btn1" value="Agregar" id="agregar" />
								</td>
							</tr>
							<tr><a href="/">Atras</a></tr>
						</table>
					</div>
					<br />
					<hr>
				</form>
				<br />

				<div class="centrar" id="contenedor-buspacientes">
					<table>
						<form id="form-busqueda">
							<tr>
								<td>Busqueda de Usuarios</td>
								<td><input type="text" id="inp-opcion" /></td>
								<td><input type="submit" id="ver" value="ver" /></td>
							</tr>
						</form>
					</table>
					<div id="tabla-buscar">

					</div>
				</div>
				<br>
				<hr />
	</div>
	<footer id="aranda">
		<div class="centrar">
			<h3>CENTRO DE COMPUTO 2016</h3>
			<h5>Lic. Christian Matamoros e Tnglo. Jose Morales</h5>
			<h5>Ing. Hernan Sanchez</h5>
			<h5>Secretaria Computo : Diana Rojas</h5>
			<h5>Ext. 604 - 605</h5>
			<h4>© 2016-2017 Php y MYSQL</h4>
		</div>
	</footer>
	<script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('js/caja.js') }}" type="module"></script>
</body>

</html>