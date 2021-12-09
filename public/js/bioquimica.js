import { URL_PUBLIC } from "./conf.js";
import { postFormData } from "./utils.js";

function buscarUltimaCita(cedula) {
    let data = new FormData();
    let token = document.querySelector("input[name=_token]").value;
    data.append('cedula', cedula);
    postFormData(URL_PUBLIC + `laboratorio/bioquimica/ultimaCita`, data,token)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        console.log(json);
                        addInformacionPersonal(json);
                    })
                    .catch(err => console.error(err));
            }
        })
        .catch(err => console.error(err));
}

function addInformacionPersonal(data) {
    document.getElementById('nombres').textContent=data.nombres;
    document.getElementById('apellidos').textContent=data.apellidos;
    document.getElementById('cedula').textContent=data.cedula;
    document.getElementById('sexo').textContent=data.sexo;
}




document.getElementById("btn-buscar").addEventListener("click", e => {
    let cedula = document.getElementById("input-buscar").value;
    let alert = document.getElementById('alert');
    let spinner=document.getElementById('spinner');
    if (cedula === "") {
        alert.classList.add("alert");
        alert.classList.add("alert-error");
        alert.textContent = "Debe proporcionar el número de cedula o apellidos";
        return;
    }
    spinner.style.display="flex";
    buscarUltimaCita(cedula);
    spinner.style.display="none";
});