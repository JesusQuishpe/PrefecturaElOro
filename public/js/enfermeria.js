import { post, get, fetchDelete, validateInput, isEmpty, validateSelect, addErrorStyle, acceptPattern, removeErrorStyle } from "./utils.js";
import "../../node_modules/bootstrap/dist/js/bootstrap.js";
import { URL_PUBLIC } from "./conf.js";


(function () {
    var errors = [];
    var formInputNames = ['peso', 'temperatura', 'estatura',
        'discapacidad', 'embarazo'];
    var allInputNames=[...formInputNames,'t_resp','inyeccion','curacion'];
    var fields = {
        peso: false,
        temperatura: false,
        estatura: false,
        presion: false,
        discapacidad: false,
        embarazo: false,
        t_resp: false,
        inyeccion: false,
        curacion: false,
        doctor: false,
        enfermera: false
    }
    var enfemeriaModal = new bootstrap.Modal(document.getElementById('modal-enf-nuevo'));
    //Fill table
    fillTable();
    //Click event for link editar
    document.getElementById("tb-enfermeria").addEventListener("click", e => {
        //Para agregar nuevos datos
        if (e.target.classList.contains("btn-primary")) {
            var ide = e.target.getAttribute("data-id");
            var area = e.target.getAttribute("area");

            document.getElementById("btn-save").setAttribute("data-id", ide);
            document.getElementById("btn-save").setAttribute("area", area);
            enfemeriaModal.show();
        }
        //Para eliminar una fila
        if (e.target.classList.contains("btn-danger")) {
            var ide = e.target.getAttribute("data-id");
            deleteEnfermeria(ide);
        }
    });

    document.getElementById('btn-save').addEventListener("click", e => {
        console.log("Hola")
        var ide = e.currentTarget.getAttribute("data-id");
        var area = e.currentTarget.getAttribute("area");
        save(ide, area);
    });


    validateForm();



    function fillTable() {
        get("enfermeria/pacientes")
            .then(res => {
                if (res.ok) {
                    res.json()
                        .then(json => {
                            console.log(json.data);
                            fill(json.data);
                        });
                }
            })
            .catch(err => {
                console.log(err);
            })
    }
    function fill(json) {
        var plantilla = "";
        var tbody = document.querySelector("tbody");
        json.forEach(pac => {
            plantilla += `
            <tr class="align-middle text-center">
                <td>${pac.id_cita}</td>
                <td>${pac.nombre_completo}</td>
                <td>${pac.fecha_nacimiento}</td>
                <td>${pac.sexo}</td>
                <td>${pac.area}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary me-2" 
                                data-id="${pac.id_enfermeria}"
                                area="${pac.area}" >
                                Editar
                        </button>
                        <button class="btn btn-danger" data-id="${pac.id_enfermeria}">Eliminar</button>
                    </div>
                </td>
            </tr>
            `;
        });
        tbody.innerHTML = plantilla;
    }

    function deleteEnfermeria(id) {
        /*axios.delete(URL_PUBLIC+"enfermeria/delete/"+id)
        .then(res=>{
            console.log(res);
        })
        .catch(err=>console.error(err));*/
        var data = new FormData();
        data.append('_method', 'DELETE');
        fetchDelete(URL_PUBLIC + "enfermeria/delete/" + id, data, document.querySelector('input[name=_token]').value)
            .then(res => {
                res.json()
                    .then(json => {
                        console.log(json);
                        if (json.error) return;
                        enfemeriaModal.hide();
                        var alerta = document.getElementById('alerta');
                        alerta.className = "alert alert-success";
                        alerta.textContent = "Se ha eliminado el resgitro correctamente";
                        fillTable();
                    })
                    .catch(err => Promise.reject(err));
            })
            .catch(err => {
                alerta.className = "alert alert-danger";
                alerta.textContent = "No se puede eliminar el registro \n Mensaje del error: " + err.message;
            });
    }

    function validatePresion(params) {
        console.log(errors);
        return acceptPattern(params.formControl, /^[0-9]{2,3}\/[0-9]{2,3}$/);
    }


    function validateForm() {
        document.getElementById('form-enfermeria').addEventListener("keyup", e => {
            //Si el input acepta solo numericos
            if (formInputNames.findIndex(name => name === e.target.name) >= 0) {
                var params = {
                    formControl: e.target,
                    fields,
                    errors,
                    required:true,
                    numeric:true
                };
                if(!validateInput(params))return;
            }

            if (e.target.name === "presion") {
                var params = {
                    formControl: e.target,
                    fields,
                    errors
                };

                if (!validatePresion(params)) {
                    params.errorMessage = "El campo ingresado no es válido";
                    params.errorType = "patron";
                    addErrorStyle(params);
                    console.log(errors);
                    return;
                }
                removeErrorStyle(params);
                params=null;
            }

            if (e.target.name === "t_resp" || e.target.name === "inyeccion" || e.target.name === "curacion") {
                var params = {
                    formControl: e.target,
                    fields,
                    errors,
                    required:true,
                    numeric:false
                };
                if(!validateInput(params))return;
            }

        });

        document.querySelectorAll('#form-enfermeria select').forEach(element => {
            element.addEventListener("change", e => {
                if (e.currentTarget.name == "doctor") {
                    validateSelect(e.currentTarget, errors,fields,"Seleccione un doctor(a)");
                }
                if (e.currentTarget.name == "enfermera") {
                    validateSelect(e.currentTarget,errors,fields,"Seleccione un enfermero(a)");
                }
            });
        });;
    }

    function save(id_enfermeria, area) {
       
        if (errors.length > 0) {
            errors[0].element.focus();
            return;
        }
        var params = {
            fields,
            errors,
            required:true,
            numeric:false
        };
       
        //Validar inputs que no esten vacíos
        params.formControl=document.getElementById('peso');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('estatura');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('temperatura');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('presion');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('t_resp');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('discapacidad');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('embarazo');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('inyeccion');
        if (!validateInput(params,"required|numeric")) return;

        params.formControl=document.getElementById('curacion');
        if (!validateInput(params,"required|numeric")) return;

        //Validar que haya seleccionado un doctor y enfermera
        if (!validateSelect(document.getElementById('doctor'),errors,fields, "Debe seleccionar un doctor(a)")) return;
        if (!validateSelect(document.getElementById('enfermera'),errors,fields, "Debe seleccionar un enfermero(a)")) return;


        var peso = parseFloat(document.getElementById("peso").value);
        var estatura = parseFloat(document.getElementById("estatura").value);
        var temperatura = parseFloat(document.getElementById("temperatura").value);
        var presion = document.getElementById("presion").value;
        var discapacidad = parseFloat(document.getElementById("discapacidad").value);
        var embarazo = parseFloat(document.getElementById("embarazo").value);
        var inyeccion = document.getElementById("inyeccion").value;
        var curacion = document.getElementById("curacion").value;
        var medico = document.getElementById("doctor").value;
        var enfermera = document.getElementById("enfermera").value;
        var atendido = 1;

        //Guardar en la BD
        console.log(document.getElementById('form-modal-enfermeria'));
        console.log(id_enfermeria, peso, estatura);
        post(URL_PUBLIC + "enfermeria/save", {
            id_enfermeria,
            peso,
            estatura,
            temperatura,
            presion,
            discapacidad,
            embarazo,
            inyeccion,
            curacion,
            medico,
            enfermera,
            area,
            atendido
        }, document.querySelector("input[name=_token]").value)
            .then(res => {
                if (res.ok) {
                    res.json()
                        .then(json => {
                            console.log(json);
                            if (json.error) return;
                            enfemeriaModal.hide();
                            var alerta = document.getElementById('alerta');
                            alerta.className = "alert alert-success";
                            alerta.textContent = "Datos guardados correctamente";
                            fillTable();
                            document.getElementById('form-enfermeria').reset();
                            setTimeout(() => {
                                alerta.className = "d-none";
                            }, 3000);
                        });
                } else {

                }
            })
            .catch(err => {
                document.getElementById('alerta')
                    .textContent = "No se ha podido realizar la operación\n Mensaje del error: " + err.message;
            });

    }
})();
