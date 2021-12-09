import { URL_PUBLIC } from "./conf.js";
import {post,postFormData} from "./utils.js";

(function () {
    //seteamos la fecha
    document.getElementById("fecha").value = new Date(Date.now()).toLocaleDateString();
    //Submit form
    document.getElementById("form-caja").addEventListener("submit", e => {
        e.preventDefault();
        var btn = e.submitter;
        console.log(e.submitter);
        //Cuando es el boton >>, es decir "Buscar"
        if (btn.id == "buscar") {
            var cedula = document.getElementById("buscar-cedula").value;
            console.log(cedula);
            buscarPorCedula(cedula);
        }
        //Cuando es el boton Agregar
        if (btn.id == "agregar") {
            guardar();
        }
    });
    document.getElementById("form-busqueda").addEventListener("submit",e=>{
        e.preventDefault();
        var btn = e.submitter;
        //Cuando es ver
        if (btn.id == "ver") {
            console.log("Opcion ver");
            var opcion = document.getElementById("inp-opcion").value;
            
            buscarPorCedulaOApellido(opcion);
        }
    });
})();

function buscarPorCedulaOApellido(opcion) {
    var data = new FormData();
    data.append("opcion", opcion);
    postFormData(URL_PUBLIC+"caja/pacientes", data,document.querySelector("input[name=_token]").value)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        if (!json.err) {
                            //mostrar tabla con resultados
                            console.log(json.result);
                            mostrarPacientes(json.result);
                        } else {
                            document.getElementById("tabla-buscar").innerHTML= "No hay registros";
                        }
                    });
            }

        })
        .catch(err => {
            console.log(err);
        });
}


function mostrarPacientes(json) {
    console.log("SIZE"+json.length);
    if(json.length==0){
        document.getElementById("tabla-buscar").innerHTML= "No hay registros";
        return;
    }
    var plantilla = `<table id="tb-pacientes-busqueda">
                    <thead>
                        <tr>
                            <th><b>Cedula</b></th>
                            <th><b>Apellidos</b></th>
                            <th><b>Nombres</b></th>
                            <th><b>Fecha de Nacimiento</b></th>
                            <th><b>Sexo</b></th>
                            <th><b>Telefono</b></th>
                            <th><b>Domicilio</b></th>
                            <th><b>Provincia</b></th>
                            <th><b>Ciudad</b></th>
                            <th><b>Llenar Cita</b></th>
                        </tr>
                    </thead>
                    <tbody>`;
    json.forEach((element, pos) => {
        console.log(pos);
        plantilla +=
            `<tr>
            <td>${element.cedula}</td>
            <td>${element.apellidos}</td>
            <td>${element.nombres}</td>
            <td>${element.fecha_nacimiento}</td>
            <td>${element.sexo}</td>
            <td>${element.telefono}</td>
            <td>${element.domicilio}</td>
            <td>${element.provincia}</td>
            <td>${element.ciudad}</td>
            <td><input type='button' value='llenar' onclick="mostrar('${pos}','${element.id_paciente}')"/></td>
        </tr>`
    });
    plantilla += `</tbody></table>`;
    document.getElementById("tabla-buscar").innerHTML= plantilla;
    document.getElementById('idpac').value=json.id_paciente;
}



function buscarPorCedula(cedula) {
    console.log({ cedula });
    var data = new FormData();
    data.append('cedula', cedula);
    postFormData(URL_PUBLIC+"caja/buscar", data,document.querySelector("input[name=_token]").value)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        console.log(json.result);
                        if (!json.err) {
                            llenarDatos(json.result);
                        } else {
                            alert("No existe el paciente");
                        }

                    });
            } else {
                console.log(res.statusText);
            }
        })
        .catch(err => {
            console.log(err);
        });
}

function llenarDatos(json) {
    document.getElementById('idpac').value=json.id_paciente;
    document.getElementById('cedula').value = json.cedula;
    document.getElementById('apellidos').value = json.apellidos;
    document.getElementById('nombres').value = json.nombres;
    document.getElementById('fecha_nacimiento').value = json.fecha_nacimiento;
    document.getElementById('sexo').selectedIndex = json.sexo == "Masculino" ? 0 : 1;
    document.getElementById('telefono').value = json.telefono;
    document.getElementById('domicilio').value = json.domicilio;
    document.getElementById("ciudad").value = json.ciudad;
    document.getElementById("provincia").value = json.provincia;
}

function guardar() {
    var id_paciente=document.getElementById('idpac').value;
    var cedula = document.getElementById('cedula').value;
    var apellidos = document.getElementById('apellidos').value;
    var nombres = document.getElementById('nombres').value;
    var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
    var sexo = document.getElementById('sexo').value;
    var telefono = document.getElementById('telefono').value;
    var domicilio = document.getElementById('domicilio').value;
    var provincia = document.getElementById('provincia').value;
    var ciudad = document.getElementById('ciudad').value;
    var area = document.getElementById('area').value;
    var valor = document.getElementById('valor').value;
    var currentDate = moment();
    var fecha = currentDate.format('YYYY/MM/DD');
    var hora = currentDate.format('HH:mm:ss');
    console.log(fecha, hora);
    var json = {
        id_paciente,
        cedula,
        apellidos,
        nombres,
        fecha_nacimiento,
        sexo,
        telefono,
        domicilio,
        fecha,
        hora,
        provincia,
        ciudad,
        area,
        valor
    };
    console.log(json);
    post(URL_PUBLIC+"caja/save", json,document.querySelector("input[name=_token]").value)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        if (json.res) {
                            alert("Se ha guardado correctamente");
                            clearFields();
                        } else {
                            alert("Ha ocurrido un error: "+json.error);
                            console.log("Ha ocurrido un error: "+json.error);
                        }
                    });
            }
        })
        .catch(err => {
            console.log(err);
        });

}

function clearFields() {
    document.getElementById('idpac').value = -1;
    document.getElementById('cedula').value = "";
    document.getElementById('apellidos').value = "";
    document.getElementById('nombres').value = "";
    document.getElementById('fecha_nacimiento').value = new Date(Date.now());
    document.getElementById('sexo').selectedIndex = 0;
    document.getElementById('telefono').value = "";
    document.getElementById('domicilio').value = "";
    document.getElementById('provincia').selectedIndex = 0;
    document.getElementById('ciudad').selectedIndex = 0;
    document.getElementById('area').selectedIndex = 0;
    document.getElementById('valor').value = "";

}