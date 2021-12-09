import { deleteRequest, get, loadTemplateToElement, post } from "./utils.js";
import { Odontograma } from "./odo.js";
import { URL_PUBLIC } from "./conf.js";
(function () {
    document.querySelector("#tb-historiales").addEventListener("click", e => {
        if (e.target.classList.contains("link")) {
            console.log("ENTRO");
            let id_odo = parseInt(e.target.getAttribute("id_odo"));
            if (!isNaN(id_odo)) {
                verHistorial(id_odo)
            } else {
                console.log("IDODO no es un número: !!error en la conversión");
            }

        }
    });
    addOptionsListener();
    //LlenarPacientes();
    LlenarHistoriales();
    buttonBuscarListener();
})();

function quitarPaciente(idOdo) {
    deleteRequest(URL_PUBLIC+`odontologia/delete/${idOdo}`)
    .then(res=>{
        if(res.ok){
            LlenarPacientes();
        }
    })
    .then(err=>console.error(err));
}
function buttonBuscarListener(params) {
    document.querySelector(".panels").addEventListener("click",e=>{
        
        if(e.target.classList.contains("quitar")){
            var idOdo=parseInt(e.target.getAttribute("id_odo"));
            quitarPaciente(idOdo);
        }
    });
    
    document.getElementById("btn-buscar").addEventListener("click", e => {
        var opcion = document.getElementById("input-buscar").value;
        buscarPorCedulaOApellido(opcion);
    });
}

function LlenarPacientes() {
    get("odontologia/pacientes")
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        if (!json.err) {
                            console.log(json.result);
                            agregarPacientesATBody(json.result);
                        }
                    });
            }
        })
        .catch(err => console.log(err));
}
function LlenarHistoriales() {
    get("odontologia/historiales")
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        if (!json.err) {
                            console.log(json.result);
                            agregarHistorialesATBody(json.result);
                        }
                    });
            }
        })
        .catch(err => console.log(err));
}

function addOptionsListener() {
    let options = Array.prototype.slice.apply(document.querySelectorAll(".option"));
    let panels = Array.prototype.slice.apply(document.querySelectorAll(".panels-item"));
    document.querySelectorAll(".option").forEach(optionElem => {
        optionElem.addEventListener("click", e => {
            let i = options.indexOf(e.currentTarget);
            //Map devuelve un nuevo array con los cambios especificados
            options.map(option => option.classList.remove("active"));
            options[i].classList.add("active");
            panels.map(panel => panel.classList.remove("active"));
            panels[i].classList.add("active");
            console.log(options[i].innerText);
        });
    });
}

function agregarPacientesATBody(json) {
    var tbody = document.querySelector("#tb-pacientes tbody");
    var plantilla = "";
    json.forEach(pac => {
        plantilla += `
        <tr>
            <input type='hidden' id_pac=${pac.num}>
            <td>${pac.cedula}</td>
            <td>${pac.nombres}</td>
            <td>${pac.apellidos}</td>
            <td>${pac.sexo}</td>
            <td>
                <a href='odontologia/ficha/${pac.idOdo}' tipo='nuevo' target="_blank">Nuevo</a>
                <a class="quitar" id_odo=${pac.idOdo}>Quitar</a> 
            </td>
        </tr>`;
    });
    tbody.innerHTML = plantilla;
}

function agregarHistorialesATBody(json) {
    var tbody = document.querySelector("#tb-historiales tbody");
    var plantilla = "";
    json.forEach(pac => {
        plantilla += `
        <tr>
            <input type='hidden' id_pac=${pac.num}>
            <td>${pac.cedula}</td>
            <td>${pac.nombres}</td>
            <td>${pac.apellidos}</td>
            <td>${pac.fecha_consulta_clie}</td>
            <td>
                <a class='link' href="${URL_PUBLIC}odontologia/${pac.id_odo}/pdf" target="_blank">Ver</a>
            </td>
        </tr>`;
    });
    tbody.innerHTML = plantilla;
}
function verHistorial(idOdo) {
    post(URL_PUBLIC + "odontologia/download", json, document.querySelector("input[name=_token]").value)
        .then(res => {
            res.text()
                .then(text => {
                    console.log(text);
                    var byteCharacters = atob(text);
                    var byteNumbers = new Array(byteCharacters.length);
                    for (var i = 0; i < byteCharacters.length; i++) {
                        byteNumbers[i] = byteCharacters.charCodeAt(i);
                    }
                    var byteArray = new Uint8Array(byteNumbers);
                    var file = new Blob([byteArray], { type: 'application/pdf;base64' });
                    var fileURL = URL.createObjectURL(file);
                    window.open(fileURL);
                    //pdfjsLib.getDocument(byteCharacters);
                })
                .catch(err => console.error(err));
        })
        .catch(err => {
            console.error(err);
        })
    /*let odo = new Odontograma({
        disabled: false,
        tenableEvents: false,
        showPaleta: false
    });
    let odontograma = odo.crearOdontograma();
    odontograma.style.visibility="hidden";
    document.body.appendChild(odontograma);

    //odontograma.querySelector("#odontograma").style.width="1000px";
    //odontograma.querySelector("#odontograma").style.height="500px";
    const scale = 2;
    let elm=odontograma.querySelector("#odontograma");
    domtoimage.toJpeg(elm, {
        height: elm.offsetHeight * scale,
        style: {
          transform: `scale(${scale}) translate(${elm.offsetWidth / 2 / scale}px, ${elm.offsetHeight / 2 / scale}px)`
        },
        width: elm.offsetWidth * scale
    })
        .then(function (dataUrl) {
            let json = {
                idOdo,
                odontogramaImage: dataUrl
            };
            var img=new Image();
            img.src=dataUrl;
            document.body.appendChild(img);
            //Post 
            console.log(dataUrl);
            post(URL_PUBLIC + "odontologia/download", json, document.querySelector("input[name=_token]").value)
                .then(res => {
                    res.text()
                        .then(text => {
                            console.log(text);
                            var byteCharacters = atob(text);
                            var byteNumbers = new Array(byteCharacters.length);
                            for (var i = 0; i < byteCharacters.length; i++) {
                                byteNumbers[i] = byteCharacters.charCodeAt(i);
                            }
                            var byteArray = new Uint8Array(byteNumbers);
                            var file = new Blob([byteArray], { type: 'application/pdf;base64' });
                            var fileURL = URL.createObjectURL(file);
                            window.open(fileURL);
                            //pdfjsLib.getDocument(byteCharacters);
                        })
                        .catch(err => console.error(err));
                })
                .catch(err => {
                    console.error(err);
                })

        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });*/
}
function buscarPorCedulaOApellido(opcion) {
    get(`odontologia/paciente/${opcion}`)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        if (!json.err) {
                            console.log(json.result);
                            agregarHistorialesATBody(json.result);
                        }
                    });
            }
        })
        .catch(err => console.log(err));
}

