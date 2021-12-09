import { dataURLtoFile, get, post, postFormData } from "./utils.js";
import { URL_PUBLIC, URL_ROOT, URL_VIEWS } from "./conf.js";
import { Odontograma } from "./odo.js";

//Variables globales
var diagnosticosList = [];
var tratamientosList = [];
var indexDiag = 0;
var sesion = 0;
var selectedFile=null;
var odontograma = new Odontograma({
    disabled:false,
    enableEvents:true,
    showPaleta:true
});
//--------------Main ---------------------

/**
 * Muestra el modal principal
 */
function showMainModal() {
    //Iniciar modal principal
    document.querySelector("#modal-principal").classList.add("mostrar");
}
/**
 * Agrega evento click al boton continuar del modal principal
 */
function clickContinuar() {

    document.getElementById("btn-continuar").addEventListener("click", e => {
        document.querySelector("#modal-principal").classList.add("out");
    });
}

//----------Sidebar------------

/**
 * Agrega evento click al boton menu, para ocultar y mostrar la sidebar
 */
function clickMenu() {
    document.getElementById("btn-menu").addEventListener("click", e => {
        document.getElementById("sidebar").classList.toggle("active");
    });
}


//---------General----------




//--------------Indicadores-------------

/**
 * Evento para autosumar las columnas cuando haya un cambio en la tabla indicadores de salud bucal
 */
function autoSumIndicadoresListener() {

    var inputs = document.querySelectorAll("#tb-piezas tbody .col-input");
    inputs.forEach(input => {
        input.addEventListener("input", function (e) {
            sumarTotalesIndicadores(e.currentTarget);
        });
    });
}

/**
 * Suma los valores de los input y cambia el valor total.
 * @param {HTMLInputElement} element
 */
function sumarTotalesIndicadores(element) {
    var td = element.parentElement;
    var rows = document.querySelectorAll("#tb-piezas tbody tr");
    var total = 0;
    rows.forEach(row => {
        console.log(row.cells[td.cellIndex].firstElementChild.value);
        var valor = row.cells[td.cellIndex].firstElementChild.value;
        if (valor != "" && !isNaN(valor)) {
            total += parseInt(valor);
        }
    });
    document.querySelector("#tb-piezas tfoot tr").cells[td.cellIndex].firstElementChild.value = total;
}



//-------------Indices -----------------

/**
 * Evento para sumar los input cpo
 */
function autoSumIndicesListener() {

    var inputs = document.querySelectorAll(".input-cpo");
    inputs.forEach(input => {
        input.addEventListener("input", function (e) {
            sumarTotalesIndices(e.currentTarget);
        });
    });
}

/**
 * Suma los valores de los input y cambia el valor total.
 * @param {HTMLInputElement} element
 */
function sumarTotalesIndices(element) {
    var td = element.parentElement;
    if (td.cellIndex == 0 || td.cellIndex == 2) {
        return;
    }
    var rows = document.querySelectorAll("#tb-indices tbody tr");
    var total = 0;
    rows.forEach(row => {
        console.log(row.cells[td.cellIndex].firstElementChild.value);
        var valor = row.cells[td.cellIndex].firstElementChild.value;
        if (valor != "" && !isNaN(valor)) {
            total += parseInt(valor);
        }

    });
    document.querySelector("#tb-indices tfoot tr").cells[td.cellIndex].firstElementChild.value = total;
}



//---------------Diagnosticos-----------------

/**
 * Agrega eventos click a los botones guardar y cancelar del modal Diagnostico
 */
function modalDiagnosticoListeners() {
    document.getElementById("btn-nuevo-diag").addEventListener("click", e => {
        document.getElementById("btn-guardar-diag").setAttribute("nuevo", "true");
        cleanModalDiag();
        showModalDiag();
    });
    document.getElementById("btn-cancelar-diag").addEventListener("click", e => {
        closeModalDiag();
    });
    //Evento para el boton guardar del modal diagnostico
    document.getElementById("btn-guardar-diag").addEventListener("click", e => {
        saveDiagnostico();
    });
    //Evento para el boton editar de la tabla diagnostico
    document.getElementById("btn-edit-diag").addEventListener("click", e => {
        document.getElementById("btn-guardar-diag").setAttribute("nuevo", "false");
        prepareEditModalDiag();
    });
    //Evento para el boton eliminar de la tabla diagnostico
    document.getElementById("btn-elim-diag").addEventListener("click", e => {
        deleteDiagnostico();
    });
}

/**
 * Muestra el modal Diagnostico
 */
function showModalDiag() {
    //Primero removemos las clases de mostrar y out
    document.querySelector("#modal-diagnostico").classList.remove("mostrar");
    document.querySelector("#modal-diagnostico").classList.remove("out");
    //Agregamos la clase mostrar para que aparezca el modal
    document.querySelector("#modal-diagnostico").classList.add("mostrar");
}

/**
 * Oculta el modal Diagnostico
 */
function closeModalDiag() {
    document.querySelector("#modal-diagnostico").classList.add("out");
}

/**
 * Agrega evento change a los elementos input[type=radio] del grupo-plan
 * para deshabilitar el textarea "ta_plan"
 */
function changeGrupoPlanEvent() {
    document.getElementsByName("grupo-plan").forEach((radio) => {
        console.log(radio.parentElement.textContent);
        radio.addEventListener("change", (e) => {
            if (e.currentTarget.checked) {
                var subcontainer = document.getElementById("ta_plan").parentElement;
                if (e.currentTarget.parentElement.innerText.trim() == "Otros") {
                    console.log("Check otros");
                    if (subcontainer.classList.contains("disabled")) {
                        subcontainer.classList.remove("disabled");
                    }
                } else {
                    subcontainer.classList.add("disabled");
                }
            }
        });
    });
}

/**
 * Agrega el efecto de selección de filas
 */
function diagSelectionRowEffect() {
    var tbDiag = document.getElementById("tb-diag");

    tbDiag.tBodies[0].addEventListener("click", e => {
        if (e.target.parentElement instanceof HTMLTableRowElement) {
            var rowSelected = tbDiag.querySelector("tbody tr.selected");
            if (rowSelected) {
                rowSelected.classList.remove("selected");
                e.target.parentElement.classList.add("selected");
            } else {
                e.target.parentElement.classList.add("selected");
            }
        }
    });
}

/**
 * Limpia el modal diagnostico
 */
function cleanModalDiag() {
    var selectTipo = document.getElementById("select-tipo-diag");
    var taDiag = document.getElementById("ta-diag");
    var selectCie = document.getElementById("select-cie");
    selectTipo.selectedIndex = 0;
    taDiag.value = "";
    selectCie.selectedIndex = 0;
}

/**
 * Guarda el diagnostico en el array y crea una nueva fila
 */
function saveDiagnostico() {
    var selectTipo = document.getElementById("select-tipo-diag");
    var taDiag = document.getElementById("ta-diag");
    var tipo = selectTipo.value;
    var descripcion = taDiag.value;
    var idCie = parseInt(document.getElementById("select-cie").value);//Cambiar
    var cie = document.getElementById("select-cie").selectedOptions[0].innerText.trim().toLowerCase();

    var btnGuardarDiag = document.getElementById("btn-guardar-diag");
    var esNuevo = btnGuardarDiag.getAttribute("nuevo");

    if (esNuevo == "true") {
        let diagnostico = {
            tipo,
            descripcion,
            idCie,
            cie
        };
        //Creamos una nueva fila
        newRowDiag(diagnostico);
        //Guardamos el diagnostico en el array
        diagnosticosList.push(diagnostico);

    } else {
        //Buscar en el arraylist y actualizar
        let rowSelected = document.querySelector("#tb-diag tbody tr.selected");
        let diagnostico = {
            tipo,
            descripcion,
            idCie,
            cie
        };
        diagnosticosList[rowSelected.sectionRowIndex] = diagnostico;
        //Actualizamos la fila
        updateRowDiag(rowSelected, diagnostico);
    }
    //Cerramos el modal
    closeModalDiag();
}

/**
 * Actualiza los datos en cada una de las celdas
 * @param {HTMLTableRowElement} row 
 * @param {Object} diagnostico 
 */
function updateRowDiag(row, diagnostico) {
    row.cells[0].innerText = diagnostico.descripcion;
    row.cells[1].innerText = diagnostico.cie;
    row.cells[2].innerText = diagnostico.tipo;
}

/**
 * Encuntra el diagnostico de la fila seleccionada y lo carga al modal
 * @returns 
 */
function prepareEditModalDiag() {
    var rowSelected = document.querySelector("#tb-diag tbody tr.selected");
    if (!rowSelected) {
        alert("No ha seleccionado una fila!!");
        return;
    }
    var diagnostico = diagnosticosList.find(function (diag,pos) {
        return pos == rowSelected.sectionRowIndex;
    });

    if (diagnostico) {
        console.log(diagnostico);
        fillModalDiag(diagnostico);
    }
}

/**
 * Agrega el diagnostico a cada uno de los componentes del modal
 * @param {Object} diag 
 */
function fillModalDiag(diag) {
    var selectTipo = document.getElementById("select-tipo-diag");
    var taDiag = document.getElementById("ta-diag");
    var selectCie = document.getElementById("select-cie");

    selectTipo.value = diag.tipo;
    taDiag.value = diag.descripcion;
    selectCie.selectedIndex = diag.idCie - 1;

    showModalDiag();
}


/**
 * Crea una nueva fila para la tabla diagnostico
 * @param {Object} diagnostico
 * @returns {int} indice de la fila 
 */
function newRowDiag(diagnostico) {
    var tbody = document.querySelector("#tb-diag tbody");
    
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");

    td1.classList.add("text");
    td2.classList.add("text");
    td1.innerText = diagnostico.descripcion;
    td2.innerText = diagnostico.cie;
    td3.innerText = diagnostico.tipo;

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    //tr.id = diagnostico.id;
    console.log("Fila antes:"+tr.sectionRowIndex);
    tbody.appendChild(tr);
    console.log("Fila despues:"+tr.sectionRowIndex);
    return tr.sectionRowIndex;
}

/**
 * Elimina un diagnostico de la tabla 
 */
function deleteDiagnostico() {
    var tbody = document.querySelector("#tb-diag tbody");
    var rowSelected = tbody.querySelector("tr.selected");
    if (!rowSelected) {
        alert("Debe seleccionar al menos una fila!!")
        return;
    }
    //Eliminamos el diagnostico del array
    diagnosticosList.splice(rowSelected.sectionRowIndex, 1);
    //Quitamos la fila de la tabla
    tbody.removeChild(rowSelected);
}


//-----------------Tratamientos----------------------

/**
 * Agrega eventos click a los botones guardar y cancelar del modal Tratamiento
 */
function modalTratamientoListeners() {
    //Evento para el boton nuevo de la tabla tratamiento
    document.getElementById("btn-nuevo-trat").addEventListener("click", e => {
        document.getElementById("btn-guardar-trat").setAttribute("nuevo", "true");
        document.getElementById("sesion-trat").innerText = sesion + 1;
        cleanModalTrat();
        showModalTrat();
    });
    //Evento para el boton editar de la tabla tratamiento
    document.getElementById("btn-edit-trat").addEventListener("click", e => {
        document.getElementById("btn-guardar-trat").setAttribute("nuevo", "false");
        prepareEditModalTrat();
    });
    //Evento para el boton eliminar de la tabla tratamiento
    document.getElementById("btn-elim-trat").addEventListener("click", e => {
        deleteTratamiento();
    });
    //Evento para el boton guardar del modal tratamiento
    document.getElementById("btn-guardar-trat").addEventListener("click", e => {
        saveTratamiento();
    });
    //Evento para el boton cancelar del modal tratamiento
    document.getElementById("btn-cancelar-trat").addEventListener("click", e => {
        closeModalTrat();
    });

}

/**
 * Muestra el modal Tratamiento
 */
function showModalTrat() {
    //Removemos las clases de mostrar y out
    document.querySelector("#modal-tratamiento").classList.remove("mostrar");
    document.querySelector("#modal-tratamiento").classList.remove("out");
    //Agregamos la clase mostrar para que aparezca el modal
    document.querySelector("#modal-tratamiento").classList.add("mostrar");
}

/**
 * Oculta el modal Tratamiento
 */
function closeModalTrat() {
    document.querySelector("#modal-tratamiento").classList.add("out");
}

/**
 * Limpia el modal tratamiento
 */
function cleanModalTrat() {
    var taDiagCompli = document.getElementById("ta-diag-compli");
    var taProc = document.getElementById("ta-proc");
    var taPres = document.getElementById("ta-pres");

    taDiagCompli.value = "";
    taProc.value = "";
    taPres.value = "";
}

/**
 * Agrega el efecto de selección de filas
 */
function tratSelectionRowEffect() {
    var tbTrat = document.getElementById("tb-trat");
    tbTrat.tBodies[0].addEventListener("click", e => {
        if (e.target.parentElement instanceof HTMLTableRowElement) {
            var rowSelected = tbTrat.querySelector("tbody tr.selected");
            if (rowSelected) {
                rowSelected.classList.remove("selected");
                e.target.parentElement.classList.add("selected");
            } else {
                e.target.parentElement.classList.add("selected");
            }
        }
    });
}

/**
 * Guarda el tratamiento en el array y crea una nueva fila o actualiza.
 */
function saveTratamiento() {
    //var sesion = document.getElementById("sesion-trat").innerText;
    var diagComplica = document.getElementById("ta-diag-compli").value;
    var procedimientos = document.getElementById("ta-proc").value;
    var prescripciones = document.getElementById("ta-pres").value;
    var btnGuardarTrat = document.getElementById("btn-guardar-trat");
    var esNuevo = btnGuardarTrat.getAttribute("nuevo");

    if (esNuevo == "true") {
        var tratamiento = {
            sesion,
            diagComplica,
            procedimientos,
            prescripciones
        };
        //Guardamos el tratamiento en el array
        tratamientosList.push(tratamiento);
        //Creamos una nueva fila
        newRowTrat(tratamiento);
        //Aumentamos la sesion en 1
        sesion++;
        console.log("Sesion:" + sesion);
    } else {
        //Buscar en el arraylist y actualizar
        var rowSelected = document.querySelector("#tb-trat tbody tr.selected");
        var id = parseInt(rowSelected.id);
        var tratamiento = {
            "sesion": id,
            diagComplica,
            procedimientos,
            prescripciones
        };
        tratamientosList[id] = tratamiento;
        //Actualizamos la fila
        updateRowTrat(rowSelected, tratamiento);
    }
    //Cerramos el modal
    closeModalTrat();
    console.log(tratamientosList);
}

/**
 * Crea una nueva fila para la tabla tratamiento
 * @param {Object} tratamiento 
 */
function newRowTrat(tratamiento) {
    var tbody = document.querySelector("#tb-trat tbody");
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");

    td1.innerText = tratamiento.sesion + 1;
    td2.innerText = tratamiento.diagComplica;
    td3.innerText = tratamiento.procedimientos;

    td2.classList.add("text");
    td3.classList.add("text");

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    tr.id = tratamiento.sesion;
    tbody.appendChild(tr);
}

/**
 * Actualiza los datos en cada una de las celdas
 * @param {HTMLTableRowElement} row 
 * @param {Object} tratamiento 
 */
function updateRowTrat(row, tratamiento) {
    row.cells[0].innerText = tratamiento.sesion + 1;
    row.cells[1].innerText = tratamiento.diagComplica;
    row.cells[2].innerText = tratamiento.procedimientos;
}

/**
 * Encuntra el tratamiento de la fila seleccionada y lo carga al modal
 * @returns 
 */
function prepareEditModalTrat() {
    var rowSelected = document.querySelector("#tb-trat tbody tr.selected");
    if (!rowSelected) {
        alert("No ha seleccionado una fila!!");
        return;
    }
    var tratamiento = tratamientosList.find(function (trat) {
        return trat.sesion == parseInt(rowSelected.id);
    });
    if (tratamiento) {
        fillModalTrat(tratamiento);
    }
}

/**
 * Agrega el tratamiento a cada uno de los componentes del modal
 * @param {Object} trat 
 */
function fillModalTrat(trat) {

    document.getElementById("sesion-trat").innerText = trat.sesion + 1;
    document.getElementById("ta-diag-compli").value = trat.diagComplica;
    document.getElementById("ta-proc").value = trat.procedimientos;
    document.getElementById("ta-pres").value = trat.prescripciones;

    showModalTrat();
}

/**
 * Elimina un tratamiento de la tabla
 * @returns 
 */
function deleteTratamiento() {
    var tbody = document.querySelector("#tb-trat tbody");
    var rowSelected = tbody.querySelector("tr.selected");
    if (!rowSelected) {
        alert("Debe seleccionar al menos una fila!!")
        return;
    }
    //Eliminamos el tratamiento del array
    tratamientosList.splice(parseInt(rowSelected.id), 1);
    //Quitamos la fila de la tabla
    tbody.removeChild(rowSelected);

    restartSesionsColumnText(tbody);
}

/**
 * Actualiza la columna Sesion de la tabla tratamientos y resta uno a la variable @var sesion.
 * @param {HTMLTableSectionElement} tbody 
 */
function restartSesionsColumnText(tbody) {
    sesion--;
    var rows = tbody.querySelectorAll("tr");
    rows.forEach((row, pos) => {
        row.id = pos;
        row.cells[0].innerText = pos + 1;

    });
    tratamientosList.forEach((tratamiento, pos) => {
        tratamiento.sesion = pos;
    });
}


//------------------Acta de consentimiento----------------

/**
 * Agrega eventos click y change para seleccionar un archivo
 */
function openFileListener() {
    document.getElementById("open-file").addEventListener("click", e => {
        document.getElementById("file-elem").click();
    });
    document.getElementById("file-elem").addEventListener("change", e => {
        mostrarImagen(document.getElementById("drop-container"), e.currentTarget.files[0]);
        selectedFile = e.currentTarget.files[0];
    });
}

/**
 * Agrega eventos para drag and drop
 */
function dragDropListeners() {
    var dropContainer = document.getElementById("drop-container");
    var input = document.getElementById("file-elem");
    //Drag over
    dropContainer.addEventListener("dragover", e => {
        e.preventDefault();
        e.currentTarget.classList.add("drag-over");
    });
    //Drag leave and end
    ["dragleave", "dragend"].forEach(type => {
        dropContainer.addEventListener(type, e => {
            dropContainer.classList.remove("drag-over")
        });
    });
    dropContainer.addEventListener("drop", e => {
        e.preventDefault();
        console.log(e.dataTransfer.files);
        if (e.dataTransfer.files.length) {
            selectedFile = e.dataTransfer.files[0];
            mostrarImagen(dropContainer, selectedFile);
        }
        dropContainer.classList.remove("drag-over");
    });
}

/**
 * Crea un div con una imagen de backgroun si no existe y la agrega al dropContainerElement
 * @param {HTMLDivElement} dropContainerElement 
 * @param {*} file 
 */
function mostrarImagen(dropContainerElement, file) {
    if (file.type.startsWith("image/")) {
        var thumbnail = dropContainerElement.querySelector(".thumb");
        if (dropContainerElement.querySelector(".drop-icon")) {
            dropContainerElement.querySelector(".drop-icon").remove();
        }
        if (!thumbnail) {//No se ha creado la imagen
            thumbnail = document.createElement("div");
            thumbnail.classList.add("thumb");
            dropContainerElement.appendChild(thumbnail);
        }
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnail.style.backgroundImage = `url(${reader.result})`;
            thumbnail.dataset.label = file.name;
        };
    } else {
        alert("Solo se aceptan tipos de imagenes jpg, png");
    }
}

async function guardarFicha() {
    
    var idOdo = parseInt(document.getElementById("idOdo").value);
    //Toma captura del odontograma
    const scale = 2;
    var elm=document.querySelector("#odontograma");
    var odontogramaImageDataURL="";
    var odontogramaImage;
    try {
        odontogramaImageDataURL=await domtoimage.toJpeg(elm, {
            height: elm.offsetHeight * scale,
            style: {
              transform: `scale(${scale}) translate(${elm.offsetWidth / 2 / scale}px, ${elm.offsetHeight / 2 / scale}px)`
            },
            width: elm.offsetWidth * scale
        });
        odontogramaImage=dataURLtoFile(odontogramaImageDataURL,"odontograma.jpeg");
    } catch (error) {
        console.error(error);
        odontogramaImage=null;
    }
    
    //Datos del paciente
    var cedula = document.getElementById("cedula").value;
    var nombres = document.getElementById("nombres").innerText;
    var apellidos = document.getElementById("apellidos").innerText;
    var sexo = document.getElementById("sexo").innerText;
    var edad = document.getElementById("edad").innerText;
    var presion = document.getElementById("presion").innerText;
    var estatura = document.getElementById("estatura").innerText;
    var temperatura = document.getElementById("temperatura").innerText;
    var peso = document.getElementById("peso").innerText;
    var fecha = document.getElementById("input-fecha").value;
    console.log(fecha.toLocal)

    //Datos General

    var seleccionEdad = document.getElementById("sel-rango").value;
    console.log(seleccionEdad);
    var motivoConsulta = document.getElementById("ta-motivo").value;
    var enfermedadProblema = document.getElementById("ta-enfermedad").value;
    var taAntecedente = document.getElementById("ta_antecedentes");
    var taPatologia = document.getElementById("ta_patologia");
    var checks_ante = document.querySelectorAll("#check-antecedentes .check:checked");
    var checks_pato = document.querySelectorAll("#check-patologias .check:checked");

    //Antecedentes
    var antecedentesCheckList = [];
    checks_ante.forEach(input => {
        antecedentesCheckList.push({
            id: input.value
        });
    });
    //Examen del sistema estomatognatico
    var patologiasCheckList = [];
    checks_pato.forEach(input => {
        patologiasCheckList.push({
            id: input.value
        });
    });

    //Datos indicadores
    var perSelected = getCheckedRadioText("grupoPer");
    var malSelected = getCheckedRadioText("grupoMal");
    var fluoSelected = getCheckedRadioText("grupoFluo");

    var totalPlaca = parseInt(document.getElementById("total_placa").value) || 0;
    var totalCalc = parseInt(document.getElementById("total_calculo").value) || 0;
    var totalGin = parseInt(document.getElementById("total_gingi").value) || 0;

    var indicadoresDetalles = [];
    var filasTbPiezas = document.querySelectorAll(".tb-piezas tbody tr");

    console.log("Selected:" + perSelected);

    //Foreach para cada fila de la tabla en tbody
    filasTbPiezas.forEach(fila => {
        var numPieza1;
        var numPieza2;
        var numPieza3;

        var checkboxes = fila.querySelectorAll("input[type=checkbox]");
        numPieza1 = checkboxes[0].checked;
        numPieza2 = checkboxes[1].checked;
        numPieza3 = checkboxes[2].checked;

        //inputs
        var numPlac = parseInt(fila.cells[1].firstElementChild.value);
        var numCalc = parseInt(fila.cells[2].firstElementChild.value);
        var numGin = parseInt(fila.cells[3].firstElementChild.value);

        //Si no son un numero, entonces se establece a 0, para que no haya problemas al guardar en la BD
        if (isNaN(numPlac)) numPlac = 0;
        if (isNaN(numCalc)) numCalc = 0;
        if (isNaN(numGin)) numGin = 0;

        indicadoresDetalles.push({
            numPieza1,
            numPieza2,
            numPieza3,
            numPlac,
            numCalc,
            numGin
        });

    });
    console.log(indicadoresDetalles);

    //Datos indices cpo-ce
    var cpo_c = parseInt(document.getElementById("cpo_c").value) || 0;
    var cpo_p = parseInt(document.getElementById("cpo_p").value) || 0;
    var cpo_o = parseInt(document.getElementById("cpo_o").value) || 0;
    var ceo_c = parseInt(document.getElementById("ceo_c").value) || 0;
    var ceo_e = parseInt(document.getElementById("ceo_e").value) || 0;
    var ceo_o = parseInt(document.getElementById("ceo_o").value) || 0;
    var cpo_total = parseInt(document.getElementById("cpo_total").value) || 0;
    var ceo_total = parseInt(document.getElementById("ceo_total").value) || 0;

    //Plan diagnostico, terapeutico y educacional
    var planSelected = document.querySelector("input[name=grupo-plan]:checked");
    var planId;
    var planDescripcion = "";
    
    if(!planSelected){
        planId=-1;
    }else{
        planId=parseInt(planSelected.value);
    }

    if (planId === 4) {
        planDescripcion = document.getElementById("ta_plan").value;
    }

    //Datos diagnostico

    //Datos Tratamientos

    //Odontograma
    //console.log(odontograma.dientes);
    //Acta

    //Armar json
    var odo_json = {
        odontologia: {
            idOdo,
            cedula,
            nombres,
            apellidos,
            fechaConsultaClie: fecha,
            seleccionEdad,
            motivoConsulta,
            enfermedadProblema
        },
        antecedentes: {
            detalles: antecedentesCheckList,
            descripcion: taAntecedente.value
        },
        examen: {
            detalles: patologiasCheckList,
            descripcion: taPatologia.value
        },
        indicadores: {
            enfPeriod: perSelected,
            malOclu: malSelected,
            fluorosis: fluoSelected,
            detalles: indicadoresDetalles,
            totalPlaca,
            totalCalc,
            totalGin
        },
        indices: {
            cpo_c,
            cpo_p,
            cpo_o,
            ceo_c,
            ceo_e,
            ceo_o,
            cpo_total,
            ceo_total
        },
        planDiagnostico: {
            idPlanOp: planId,
            descripcion: planDescripcion
        },
        diagnosticos: diagnosticosList,
        tratamientos: tratamientosList,
        odontograma: {
            dientes: odontograma.obtenerDientesJson(),
            recmovs: odontograma.obtenerRecesionesYMovilidades()
        }
    };
    
    console.log(odo_json);

    var data = new FormData();
    data.append("acta", selectedFile);
    data.append("odontogramaImage",odontogramaImage);
    data.append("json", JSON.stringify(odo_json));

    postFormData('save', data, document.querySelector("input[name=_token]").value)
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        if (json.error) {
                            const swalCustomButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn-ok'
                                },
                                buttonsStyling: false
                            })
                            swalCustomButtons.fire('Ha ocurrido un error', '', 'error');
                            console.log(json.mensajeError);
                        } else {
                            const swalCustomButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn-ok'
                                },
                                buttonsStyling: false
                            })
                            swalCustomButtons.fire('Guardado!', '', 'success');
                            activarModoLectura();
                        }
                    });
            }
        })
        .catch(err => console.log(err));

}

function activarModoLectura() {
    var btnGuardarFicha = document.getElementById("btn-guardar-ficha");
    btnGuardarFicha.disabled = true;

    //Deshabilita todos los textarea
    var textAreas = document.querySelectorAll("textarea");
    textAreas.forEach(textarea => {
        textarea.disabled = true;
    });

    //Deshabilita todos los inputs de tipo texto
    var inputs = document.querySelectorAll("input[type=text]");
    inputs.forEach(input => {
        input.disabled = true;
    });

    //Deshabilita todos los checks
    var checks = document.querySelectorAll("input[type=checkbox]");
    checks.forEach(check => {
        check.disabled = true;
    });

    //Deshabilita todos los radios
    var radios = document.querySelectorAll("input[type=radio]");
    radios.forEach(radio => {
        radio.disabled = true;
    });
}


function showLoader() {
    var loader = document.getElementById("loader-animation");
    loader.style.transform = "scale(1)";
}
function hideLoader() {
    var loader = document.getElementById("loader-animation");
    loader.style.transform = "scale(0)";
}
/**
 * Devuelve el valor del input[type=radio] seleccionado
 * @param {String} groupName nombre del grupo al que pertenece 
 * @returns {String} valor del input
 */
function getCheckedRadioText(groupName) {
    console.log(document.getElementsByName(groupName));
    var radios = document.getElementsByName(groupName);
    for (let index = 0; index < radios.length; index++) {
        const element = radios[index];
        if (element.checked) {
            return element.value;
        }
    }
    return "";
}

function getCies() {
    get(URL_PUBLIC + "odontologia/cie")
        .then(res => {
            if (res.ok) {
                res.json()
                    .then(json => {
                        fillCies(json)
                    });
            }
        })
        .catch(res => {

        });
}
function fillCies(data) {
    var select = document.getElementById("select-cie");
    var template = "";
    data.forEach(cie => {
        template += `<option value=${cie.id}>${cie.nombre}</option>`;
    });
    select.innerHTML = template;
}

/**
 * Devuelve la cadena con la primera letra en mayúsculas
 * @param {String} str 
 * @returns {String}
 */
function capFirst(str) {
    return str[0].toUpperCase() + str.slice(1);
}

(function () {
    showMainModal();
    clickContinuar();
    clickMenu();
    modalDiagnosticoListeners();
    modalTratamientoListeners();
    autoSumIndicadoresListener();
    changeGrupoPlanEvent();
    diagSelectionRowEffect();
    getCies();
    tratSelectionRowEffect();
    autoSumIndicesListener();
    odontograma.crearOdontogramaAsync()
    .then(container => {
        
        var data=new FormData();
        data.append('cedula',document.getElementById("cedula").value);
       postFormData(URL_PUBLIC+`odontologia/lastOdontograma`,data,document.querySelector("input[name=_token]").value)
        .then(res=>{
            if(res.ok){
                res.json()
                .then(json=>{
                    if(json){
                        odontograma.setDataDientes(json.dientes);
                        odontograma.setDataMovilidadYRecesion(json.recmovs);
                        document.getElementById("seccion-odontograma").appendChild(container);
                    }
                })
                .catch(err=>console.error(err));
            }
        })
        .catch(err=>{

        });
        
    });

    //Evento para el boton guardar ficha
    document.getElementById("btn-guardar-ficha").addEventListener("click", e => {
        const customButton = Swal.mixin({
            customClass: {
                confirmButton: 'btn-success',
                cancelButton: 'btn-cancel'
            },
            buttonsStyling: false
        });
        customButton.fire({
            title: '¿Deseas guardar la ficha?',
            showCancelButton: true,
            showDenyButton: false,
            confirmButtonText: 'Guardar',
            cancelButtonText: `Cancelar`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                guardarFicha();
            }
        })

    });
    dragDropListeners();
    openFileListener();
})();









