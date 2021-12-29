import { URL_PUBLIC } from "./conf.js";
import { colesterolLdl, calcularGlobulina, calcularRelacionAG, calcularBilirrubinaIndirecta } from "./helpers/formulas.js";
import { addErrorStyle, isEmpty, postFormData, roundToTwo, validateInput } from "./utils.js";


var errors = [];
var fields = [];

/**
 * Agrega errores de tipo "empty" para todos los inputs del formulario
 * @param {Array} errors 
 * @param {HTMLFormElement} form 
 */
function inicializarInputsErrors(errors, form) {
    var inputs = form.querySelectorAll("input[type=text]");
    for (let index = 0; index < inputs.length; index++) {
        const element = inputs[index];
        errors.push({
            type: "empty",
            element
        });
    }
}

function buscarUltimaCita(cedula) {
    let data = new FormData();
    let token = document.querySelector("input[name=_token]").value;
    data.append('cedula', cedula);
    postFormData(URL_PUBLIC + `laboratorio/bioquimica/ultimaCita`, data, token)
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
    document.getElementById('nombres').textContent = data.nombres;
    document.getElementById('apellidos').textContent = data.apellidos;
    document.getElementById('cedula').textContent = data.cedula;
    document.getElementById('sexo').textContent = data.sexo;
}

/*document.getElementById("btn-buscar").addEventListener("click", e => {
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
});*/




function events() {
    inicializarInputsErrors(errors, document.getElementById('formulario'));

    document.getElementById('formulario').addEventListener("keyup", e => {
        if (e.target.name === "colesterol_total") {
            var params = {
                formControl: e.target,
                errors,
                fields,
                required: true,
                numeric: true
            };
            if (!validateInput(params)) {
                document.getElementById('colesterol_hdl').value = 0;
                return;
            };
            var colesterol_total = parseFloat(e.target.value);
            var colesterol_hdl = roundToTwo(colesterol_total * 0.20);

            document.getElementById('colesterol_hdl').value = colesterol_hdl;

            if (errors.findIndex(err => err.element === document.getElementById('trigliceridos')) < 0) {
                var trigliceridos = parseFloat(document.getElementById('trigliceridos').value);
                var colesterol_ldl = colesterolLdl(trigliceridos, colesterol_total, colesterol_hdl);
                document.getElementById('colesterol_ldl').value = colesterol_ldl;
            }
        }

        if (e.target.name === "trigliceridos") {
            var params = {
                formControl: e.target,
                errors,
                fields,
                required: true,
                numeric: true
            };
            if (!validateInput(params)) {
                document.getElementById('colesterol_ldl').value = 0;
                return;
            };

            params.formControl = document.getElementById('colesterol_total');

            if (!validateInput(params)) {
                document.getElementById('colesterol_ldl').value = 0;
                return;
            };

            var colesterol_total = parseFloat(document.getElementById('colesterol_total').value);
            var trigliceridos = parseFloat(e.target.value);
            var colesterol_hdl = parseFloat(document.getElementById('colesterol_hdl').value);
            var colesterol_ldl = colesterolLdl(trigliceridos, colesterol_total, colesterol_hdl);
            document.getElementById('colesterol_ldl').value = colesterol_ldl;
        }

        if (e.target.name === "albumina") {
            var params = {
                formControl: e.target,
                errors,
                fields,
                required: true,
                numeric: true
            };
            if (!validateInput(params)) {
                document.getElementById('globulina').value = 0;
                return;
            };

            params.formControl = document.getElementById('proteinas_totales');

            if (!validateInput(params)) {
                document.getElementById('globulina').value = 0;
                return;
            };

            var proteinas_totales = parseFloat(document.getElementById('proteinas_totales').value);
            var albumina = parseFloat(e.target.value);
            var globulina = calcularGlobulina(proteinas_totales, albumina);
            var relacion_ag = calcularRelacionAG(albumina, globulina);
            document.getElementById('globulina').value = globulina;
            document.getElementById('relacion_ag').value = relacion_ag;
        }
        if (e.target.name === "proteinas_totales") {
            var params = {
                formControl: e.target,
                errors,
                fields,
                required: true,
                numeric: true
            };
            if (!validateInput(params)) {
                document.getElementById('globulina').value = 0;
                return;
            };

            params.formControl = document.getElementById('albumina');

            if (!validateInput(params)) {
                document.getElementById('globulina').value = 0;
                return;
            };

            var albumina = parseFloat(document.getElementById('albumina').value);
            var proteinas_totales = parseFloat(e.target.value);
            var globulina = calcularGlobulina(proteinas_totales, albumina);
            var relacion_ag = calcularRelacionAG(albumina, globulina);
            document.getElementById('globulina').value = globulina;
            document.getElementById('relacion_ag').value = relacion_ag;
        }

        if (e.target.name === "bilirrubina_total") {
            var params = {
                formControl: e.target,
                errors,
                fields,
                required: true,
                numeric: true
            };
            if (!validateInput(params)) {
                document.getElementById('bilirrubina_indirecta').value = 0;
                return;
            };

            params.formControl = document.getElementById('bilirrubina_directa');

            if (!validateInput(params)) {
                document.getElementById('bilirrubina_indirecta').value = 0;
                return;
            };

            var bilirrubina_directa = parseFloat(document.getElementById('bilirrubina_directa').value);
            var bilirrubina_total = parseFloat(e.target.value);
            var bilirrubina_indirecta = calcularBilirrubinaIndirecta(bilirrubina_total, bilirrubina_directa);

            document.getElementById('bilirrubina_indirecta').value = bilirrubina_indirecta;
        }

        if (e.target.name === "bilirrubina_directa") {
            var params = {
                formControl: e.target,
                errors,
                fields,
                required: true,
                numeric: true
            };
            if (!validateInput(params)) {
                document.getElementById('bilirrubina_indirecta').value = 0;
                return;
            };

            params.formControl = document.getElementById('bilirrubina_total');

            if (!validateInput(params)) {
                document.getElementById('bilirrubina_indirecta').value = 0;
                return;
            };

            var bilirrubina_total = parseFloat(document.getElementById('bilirrubina_total').value);
            var bilirrubina_directa = parseFloat(e.target.value);
            var bilirrubina_indirecta = calcularBilirrubinaIndirecta(bilirrubina_total, bilirrubina_directa);

            document.getElementById('bilirrubina_indirecta').value = bilirrubina_indirecta;
        }
    });
    document.getElementById('formulario').addEventListener("submit", e => {
        e.preventDefault();
        if (errors.length > 0) {
            alert("Hay errores");
            addErrorStyle({
                formControl:errors[0].element,
                fields,
                errors,
                errorMessage:"El campo no debe estar vacío",
                errorType:"empty"
            });
            console.log(errors);
            return;
        }

        var params = {
            fields,
            errors,
            required: true,
            numeric: false
        };

        //Validar inputs que no esten vacíos
        params.formControl = document.getElementById('peso');
        if (!validateInput(params, "required|numeric")) return;
    });
}

function guardar() {

}

events();