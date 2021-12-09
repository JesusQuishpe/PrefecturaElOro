import { URL_PUBLIC } from "./conf.js";
import { Odontograma } from "./odo.js";
import { get, post, postFormData } from "./utils.js";

var odontograma = new Odontograma({
    disabled: false,
    enableEvents: false,
    showPaleta: false
});
odontograma.crearOdontogramaAsync()
    .then(odo => {
        document.querySelector(".odo-container").appendChild(odo);
    });

(function () {
    var idOdo = parseInt(document.getElementById("input-idOdo").value);
    //console.log("IDODO:"+idOdo);
    getFicha(idOdo);
    document.getElementById('visualizar').addEventListener("click", e => {
        //Hacer captura del odontograma
        /*html2canvas(document.querySelector(".odo-container"), {
            allowTaint: false,
            useCors: false,
            scale: 1,
            logging: true,
        }).then(canvas => {
            var img = document.createElement("img");
            img.crossOrigin="Anonymous";
            img.src = canvas.toDataURL();
            console.log(canvas.toDataURL());
            document.body.appendChild(img);
        })*/
        domtoimage.toJpeg(document.querySelector("#odontograma"), {
            width: 1153,
            height: 500,
            style: {
                "transform": "scale(1)"
            }
        })
            .then(function (dataUrl) {
                var img = new Image();
                img.src = dataUrl;
                document.body.appendChild(img);
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });
        /*var template=document.documentElement.innerHTML;
        console.log(template);
        var data={
            idOdo,
            template
        }*/
        /*console.log(URL_PUBLIC+`odontologia/historial/pdf`);
        post(URL_PUBLIC+`odontologia/download`,data,document.querySelector('input[name=_token]').value)
        .then(res=>{
            if(res.ok){
                res.text()
                .then(text=>{
                    //var blob=new Blob(text,{type: 'application/pdf'});
                    console.log(text);
                    var htmlText = '<embed width=100% height=100%'
                 + ' type="application/pdf"'
                 + ' src="data:application/pdf;base64,'
                 + text
                 + '"></embed>'; 
                 document.querySelector('body').innerHTML=htmlText;
                });
            }
        })
        .catch(err=>{
            console.error(err);
        });*/

    });
})();

//Obtiene los datos de la ficha en formato json
function getFicha(idOdo) {
    get(URL_PUBLIC + `odontologia/historial/${idOdo}`)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        console.log(json);
                        cargarDatosPersonales(json);
                    });
            }
        })
        .catch(err => console.error(err));
}

function cargarDatosPersonales(datos) {
    var informacion = datos.informacion;
    var antecedentes = datos.antecedentes;
    var examen = datos.examen;
    var indicadores = datos.indicadores;
    var indices = datos.indices;
    var planDiagnostico = datos.planDiagnostico;
    var diagnosticos = datos.diagnosticos;
    var tratamientos = datos.tratamientos;
    var odonto = datos.odontograma;
    //Informacion personal
    document.getElementById("cedula").innerText = informacion.cedula;
    document.getElementById("nombres").innerText = informacion.nombres;
    document.getElementById("apellidos").innerText = informacion.apellidos;
    document.getElementById("sexo").innerText = informacion.sexo;
    document.getElementById("ciudad").innerText = informacion.ciudad;
    document.getElementById("provincias").innerText = informacion.provincias;
    document.getElementById("telefono").innerText = informacion.telefono;
    //Antecedentes
    var antecedentesText = "";
    antecedentes.detalles.forEach((detalle, pos) => {
        antecedentesText += detalle.nombre + ", ";

    });
    //Quitamos la ultima coma y el espacio
    antecedentesText = antecedentesText.replace(/,\s*$/, "");
    document.getElementById("ant-list").innerText = antecedentesText;
    document.getElementById("ant-descripcion").innerText = antecedentes.general.descripcion;

    //Examen estomatognatico
    var patologiasText = "";
    examen.detalles.forEach(detalle => {
        patologiasText += detalle.nombre + ", ";
    });
    //Quitamos la ultima coma y el espacio
    patologiasText = patologiasText.replace(/,\s*$/, "");
    document.getElementById("exa-list").innerText = patologiasText;
    document.getElementById("exa-descripcion").innerText = examen.general.descripcion;

    //Indicadores de salud bucal
    document.getElementById("enf-periodontal").innerText = indicadores.general.enfPeriod;
    document.getElementById("mal-oclu").innerText = indicadores.general.malOclu;
    document.getElementById("fluorosis").innerText = indicadores.general.fluorosis;

    var rows = document.querySelectorAll("#tb-piezas tbody tr");
    rows.forEach((row, pos) => {
        var td = row.cells[0];
        var checks = td.getElementsByClassName("col-check");

        checks[0].checked = indicadores.detalles[pos].numPieza1 ? true : false;
        checks[1].checked = indicadores.detalles[pos].numPieza2 ? true : false;
        checks[2].checked = indicadores.detalles[pos].numPieza3 ? true : false;

        row.cells[1].innerText = indicadores.detalles[pos].numPlaca;
        row.cells[2].innerText = indicadores.detalles[pos].numCalc;
        row.cells[3].innerText = indicadores.detalles[pos].numGin;

    });

    document.getElementById("total-placa").innerText = indicadores.general.totalPlaca;
    document.getElementById("total-calc").innerText = indicadores.general.totalCalc;
    document.getElementById("total-gin").innerText = indicadores.general.totalGin;

    //Indices cpo-ceo
    document.getElementById('cpo-c').innerText = indices.cd;
    document.getElementById('cpo-p').innerText = indices.pd;
    document.getElementById('cpo-o').innerText = indices.od;
    document.getElementById('ceo-c').innerText = indices.ce;
    document.getElementById('ceo-e').innerText = indices.ee;
    document.getElementById('ceo-o').innerText = indices.oe;

    //Plan Diagnostico
    document.getElementById('plan-list').innerText = planDiagnostico.nombre;
    document.getElementById('plan-descripcion').innerText = planDiagnostico.descripcion;

    //Diagnosticos
    let diagTemplateRow = "";
    diagnosticos.forEach(diag => {
        diagTemplateRow += `<div class="diag-container">
        <div class="flex-diag">
            <div>
                <span>CIE:</span>
                <p>${diag.cie}</p>
            </div>
            <div>
                <span>Tipo:</span>
                <p>${diag.tipo}</p>
            </div>
        </div>
        <span>Diagnóstico:</span>
        <p>${diag.diagnostico}</p>
        </div>`;
    });
    document.getElementById('diagnosticos').innerHTML += diagTemplateRow;

    //Diagnosticos
    let tratTemplateRow = "";
    tratamientos.forEach(trat => {
        tratTemplateRow += `<div class="trat-container">
        <span>Sesión:</span>
        <p>${trat.sesion}</p>
        <span>Diagnosticos y complicaciones:</span>
        <p>${trat.diagComplica}</p>
        <span>Procedimientos:</span>
        <p>${trat.procedimientos}</p>
        <span>Prescripciones:</span>
        <p>${trat.prescripciones}</p> 
        </div>`;
    });
    document.getElementById('tratamientos').innerHTML += tratTemplateRow;

    //Odontograma
    odontograma.setDataMovilidadYRecesion(odonto.recmovs);
    odontograma.setDataDientes(odonto.dientes);
}