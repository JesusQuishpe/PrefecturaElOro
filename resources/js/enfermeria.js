import {post,get} from "./utils.js";
(function () {
    //Fill table
    fillTable();
    //Click event for link editar
    document.getElementById("tb-enfermeria").addEventListener("click", e => {
        if (e.target.classList.contains("edit")) {
            var ide = e.target.getAttribute("data-id");
            var area=e.target.getAttribute("area");
            document.getElementById("btn-save").setAttribute("data-id", ide);
            document.getElementById("btn-save").setAttribute("area", area);
            var container = document.querySelector(".modal-container");
            var modal = document.querySelector(".modal");
            showModal([container, modal]);
        }
    });

    //Click event for save button
    document.getElementById("btn-save").addEventListener("click", e => {
        var ide = parseInt(e.currentTarget.getAttribute("data-id"));
        var areaaCita=e.currentTarget.getAttribute("area");
        save(ide,areaaCita);
    });

    //Click event for cancel button
    document.getElementById("btn-cancel").addEventListener("click", e => {
        var container = document.querySelector(".modal-container");
        var modal = document.querySelector(".modal");
        hideModal([container, modal]);
    });

    
})();

function save(ide,areaaCita) {
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
    
    //Guardar en la BD
    console.log(ide, peso, estatura);
    post("enfermeria/save", {
        ide,
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
        areaaCita
    },document.querySelector("input[name=_token]").value)
        .then(res => {
            if (res.ok) {
                res.json().then(json => {
                    console.log(json);
                    if(json.res){
                        var container = document.querySelector(".modal-container");
                        var modal = document.querySelector(".modal");
                        clearModal();
                        hideModal([container, modal]);
                        fillTable();
                    }else{
                        console.error(json.error);
                    }
                });

            }
        })
        .catch(err => {
            console.log(err);
        });

}

function showModal(elements) {
    elements.forEach(element => {
        element.style.opacity = "1";
        element.style.visibility = "visible";
    });
}
function hideModal(elements) {
    elements.forEach(element => {
        element.style.opacity = "0";
        element.style.visibility = "hidden";
    });
}
function clearModal() {
    document.querySelectorAll("#client input").forEach(element => {
        element.value="";
    });
}

function fillTable() {
    get("enfermeria/pacientes")
    .then(res=>{
        if(res.ok){
            res.json()
            .then(json=>{
                fill(json);
            });
        }
    })
    .catch(err=>{
        console.log(err);
    })
}
function fill(json) {
    var plantilla="";
    var tbody=document.querySelector("tbody");
    json.forEach(pac => {
        plantilla+=`
        <tr>
            <td>${pac.id}</td>
            <td>${pac.apenom}</td>
            <td>${pac.nacimiento}</td>
            <td>${pac.sexo}</td>
            <td>${pac.areaaCita}</td>
            <td><a class="edit" href="javascript:void(0);" data-id="${pac.ide}" area="${pac.areaaCita}">Editar</a></td>
        </tr>
        `;      
    });
    tbody.innerHTML=plantilla;
}
/*function showModal() {
    getTemplate(URL_ENFERMERIA_VIEWS+"clientForm.php")
    .then(res=>{
        if(res.ok){
            res.text()
            .then(template=>{
                var modal=new Modal({
                    html:template
                });
                modal.show();
                //Submit event for save data in enfermeria DB
    document.getElementById("btn-save").addEventListener("click",e=>{
        var id=e.target.getAttribute("data-id");
        var peso=document.getElementById("peso").value;
        var estatura=document.getElementById("estatura").value;
        var temperatura=document.getElementById("temperatura").value;
        var presion=document.getElementById("presion").value;
        var discapacidad=document.getElementById("discapacidad").value;
        var embarazo=document.getElementById("embarazo").value;
        var inyeccion=document.getElementById("inyeccion").value;
        var curacion=document.getElementById("curacion").value;
        var medico=document.getElementById("doctor").value;
        var enfermera=document.getElementById("enfermera").value;
        //Guardar en la BD
        console.log(id,peso,estatura);
        post(URL_CONTROLLERS+"enfermeria/save",{
            id,
            peso,
            estatura,
            temperatura,
            presion,
            discapacidad,
            embarazo,
            inyeccion,
            curacion,
            medico,
            enfermera
        })
        .then(res=>{
            if(res.ok){
                res.text().then(text=>console.log(text));
            }
        })
        .catch(err=>{
            console.log(err);
        });
    });
            });
        }
    })
    .catch(err=>console.log(err));
}*/
