import {URL_BASE} from "./conf.js";

let color_selected = "rgb(220, 53, 69)";//Red

function eventos() {
  //var esNuevo = document.getElementById("nuevo").getAttribute("esNuevo");

  /*if (esNuevo == "true") {
  } else {
    console.log(esNuevo);
    //Verificamos si hay algo en local storage
    if (localStorage.length > 0) {
      if (localStorage.getItem("recesiones")) {
        //Variables obtenidas de local storage
        var recesiones = JSON.parse(localStorage.getItem("recesiones"));
        var movilidades = JSON.parse(localStorage.getItem("movilidades"));
        var vestibulares = JSON.parse(localStorage.getItem("vestibulares"));
        var linguales = JSON.parse(localStorage.getItem("linguales"));

        var inputs_recesion = document.querySelectorAll(
          ".col-recmov.recesion input"
        );
        var inputs_movilidad = document.querySelectorAll(
          ".col-recmov.movilidad input"
        );
        var dientes_vestibulares = document.querySelectorAll(
          ".item-diente-vestibular"
        );
        var dientes_linguales = document.querySelectorAll(
          ".item-diente-lingual"
        );

        recesiones.forEach((item) => {
          inputs_recesion.item(item.pos).value = item.recesion;
        });
        movilidades.forEach((item) => {
          inputs_movilidad.item(item.pos).value = item.movilidad;
        });
        vestibulares.forEach((item) => {
          var item_diente = dientes_vestibulares.item(item.pos);
          var simbo_container = item_diente.querySelector(".simbo-container");
          var btns = item_diente.querySelectorAll(".btn");
          //Creamos la img element y agregamos al simbo container
          if(item.simbologia!=null){
            simbo_container.appendChild(crearSimboImgElement(item.simbologia));
            simbo_container.style.display="block";
            simbo_container.setAttribute("simbol",item.simbologia);
          }
          
          //Agregamos los colores a los botones
          //Tener cuidado con las posiciones, deben ser acorde el orden que está en el html
          btns.forEach(btn => {
            
            if(btn.getAttribute("side")=="left" && item.left!="white"){
              btn.style.fill=item.left;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="top" && item.top!="white"){
              btn.style.fill=item.top;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="right" && item.right!="white"){
              btn.style.fill=item.right;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="bottom" && item.bottom!="white"){
              btn.style.fill=item.bottom;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="center" && item.center!="white"){
              btn.style.fill=item.center;
              btn.setAttribute("pintado",true);
            }
          });
        });
        linguales.forEach((item) => {
          var item_diente = dientes_linguales.item(item.pos);
          var simbo_container = item_diente.querySelector(".simbo-container");
          var btns = item_diente.querySelectorAll(".btn");
          //Creamos la img element y agregamos al simbo container
          if(item.simbologia!=null){
            simbo_container.appendChild(crearSimboImgElement(item.simbologia));
            simbo_container.style.display="block";
            simbo_container.setAttribute("simbol",item.simbologia);
          }
          
          //Agregamos los colores a los botones
          //Tener cuidado con las posiciones, deben ser acorde el orden que está en el html
          btns.forEach(btn => {
            
            if(btn.getAttribute("side")=="left" && item.left!="white"){
              btn.style.fill=item.left;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="top" && item.top!="white"){
              btn.style.fill=item.top;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="right" && item.right!="white"){
              btn.style.fill=item.right;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="bottom" && item.bottom!="white"){
              btn.style.fill=item.bottom;
              btn.setAttribute("pintado",true);
            }
            if(btn.getAttribute("side")=="center" && item.center!="white"){
              btn.style.fill=item.center;
              btn.setAttribute("pintado",true);
            }
          });
        });
      }
    }
  }*/
  //Evento para boton guardar odontograma
  /*document.getElementById("btn_guardar").addEventListener("click", (e) => {
    guardarOdontogramaLocalStorage();
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 1000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });
    Toast.fire({
      icon: "success",
      title: "Datos guardados",
    });
  });*/
  //Evento para boton limpiar odontograma
  /*document.getElementById("btn_limpiar").addEventListener("click", (e) => {
    limpiarOdontograma();
  });*/
  dientesListeners();
  //Listener para seleccion de colores en el odontograma
  selectedColorListener();
  //Agregar eventos click a elementos con clase simbo-container
  containerSimbolsClick();
  //Evento para seleccion de simbolos
  selectedSimbolListener();
}

/**
 * Agrega eventos clik a los polygonos de cada diente, añade el atributo pintado
 */
function dientesListeners() {
  /*Evento para seleccionar los polygonos*/
  document.querySelector("#odontograma").addEventListener("click", (e) => {
    console.log(e.target);
    //Validamos que el elemento tenga la clase btn
    if (e.target.classList.contains("btn")) {
      //Si es el mismo lo deselecciona
      if (e.target.style.fill == color_selected) {
        e.target.style.fill = "white";
        e.target.removeAttribute("pintado");
      } else {
        e.target.setAttribute("pintado", true);
        e.target.style.fill = color_selected;
      }
    }
  });
}

/**
 * Agrega funcionalidad a la paleta de simbolos
 */
function selectedSimbolListener() {
  //Evento para seleccion de simbolos
  document.querySelectorAll(".simbol").forEach((element) => {
    element.addEventListener("click", function (e) {
      var simboSelectedElem = document.querySelector(".simbol.selected");
      console.log(simboSelectedElem);
      //Si es el mismo seleccionado, ocultamos el simbo-container
      if (simboSelectedElem == e.currentTarget) {
        e.currentTarget.classList.remove("selected");
        desactivateSimbolContainers();
        return;
      }
      //Si no es el mismo
      if (simboSelectedElem) {
        simboSelectedElem.classList.remove("selected");
        e.currentTarget.classList.add("selected");
        //Mostramos el simbo-container para cada diente
        activateSimbolContainers();
      } else {
        e.currentTarget.classList.add("selected");
        activateSimbolContainers();
      }
    });
  });
}

/**
 * Oculta el simbo-container para cada diente si no tiene un simbolo agregado.
 */
function desactivateSimbolContainers() {
  //Ocultamos los simbo-containers para cada diente, verificando que no tenga un simbolo agregado
  document.querySelectorAll(".simbo-container").forEach((element) => {
    if (!element.hasChildNodes()) {//Si no tienes hijos, es decir la imagen del simbolo, se oculta.
      element.style.display = "none";
    }
  });
}

/**
 * Muestra el simbo-container de cada diente
 */
function activateSimbolContainers() {
  //Mostramos el simbo-container para cada diente
  document.querySelectorAll(".simbo-container").forEach((element) => {
    element.style.display = "block";
  });
}

/**
 * Agrega el evento click a la paleta de colores
 */
function selectedColorListener() {
  /*Evento para seleccion de color de los botones del diente */
  document.querySelector(".colores").addEventListener("click", (e) => {
    if (e.target.classList.contains("color")) {
      var colorSelectedElem = document.querySelector(".color.color-selected");//El elemento seleccionado antes de cambiar al actual
      if (colorSelectedElem) {
        colorSelectedElem.classList.remove("color-selected");
        e.target.classList.add("color-selected");
        color_selected = window.getComputedStyle(e.target).backgroundColor;//get background color in rgb
      }
    }
  });
}

/**
 * Crea una imagen a partir del nombre del simbolo
 * @param {String} name 
 * @returns {HTMLImageElement}
 */
function crearSimboImgElement(name) {
  let img = document.createElement("img");
  img.style.width = "100%";
  img.style.height = "100%";
  img.src = URL_BASE + "images/svg/" + name;
  return img;
}

/*
* Agrega el evento click para cada simbo-container
*/
function containerSimbolsClick() {
  document.querySelectorAll(".simbo-container").forEach((element) => {
    element.addEventListener("click", function (e) {
      console.log("Click simbo-container");
      let simbo_selected = document.querySelector(".selected");
      if (simbo_selected) {
        var simbo_name = simbo_selected
          .querySelector("img")
          .src.split("/")
          .pop();
        //Cuando es el simbolo de limpiar
        if (simbo_name == "clean.svg") {
          if (element.hasChildNodes()) {
            //Eliminamos el simbolo
            element.firstElementChild.remove();
            element.removeAttribute("simbol");
          }
          return;
        }
        let img = crearSimboImgElement(simbo_name);

        if (element.hasChildNodes()) {
          //Eliminamos el simbolo
          element.firstElementChild.remove();
          //agregamos el nuevo
          element.appendChild(img);
          element.setAttribute("simbol", simbo_name);
        } else {
          //agregamos directamente el simbolo
          element.appendChild(img);
          element.setAttribute("simbol", simbo_name);
        }

        console.log(simbo_name);
      }
    });
  });
}

function guardarOdontogramaLocalStorage() {
  //Guardar datos de cabecera
  var id_pac = document.getElementById("idpac").getAttribute("idpac");
  var nombres = document.getElementById("nombres");
  var apellidos = document.getElementById("apellidos");
  var sexo = document.getElementById("sexo");
  var edad = document.getElementById("edad");
  var fecha = new Date(Date.now());
  //Guardar datos de recesion y movilidad

  guardarDientes();
  guardarRecesionMovilidad();
  console.log(fecha.toLocaleDateString());
}

/**
 * Devuelve una lista con los dientes vestibulares
 */
function getDientesVestibulares() {
  var dientes_vestibulares = document.querySelectorAll(
    ".item-diente-vestibular"
  );
  var vestibulares_local = [];
  //Dientes vestibulares
  dientes_vestibulares.forEach((item_diente, pos) => {
    //Solo queremos guardar en la BD los dientes que tengan un simbolo o algun lado pintado
    if (!esDienteVacio(item_diente)) {
      var num_diente = item_diente.querySelector("span").innerText;
      var btns = item_diente.querySelectorAll(".btn");
      var simbol_name = item_diente
        .querySelector(".simbo-container")
        .getAttribute("simbol");

      var left, top, right, bottom, center;
      //Tener cuidado con las posiciones, deben ser acorde el orden que está en el html
      top = btns.item(0).style.fill || "white";
      right = btns.item(1).style.fill || "white";
      left = btns.item(2).style.fill || "white";
      bottom = btns.item(3).style.fill || "white";
      center = btns.item(4).style.fill || "white";
      //Guardar diente en el array
      vestibulares_local.push({
        tipo: "vestibular",
        num_diente,
        left,
        top,
        right,
        bottom,
        center,
        simbologia: simbol_name,
        pos
      });
    }
  });
  return vestibulares_local;
}

/**
 * Devuelve una lista con los dientes linguales
 */
function getDientesLinguales() {
  var dientes_linguales = document.querySelectorAll(
    ".item-diente-lingual"
  );
  var linguales_local = [];
  //Dientes linguales
  dientes_linguales.forEach((item_diente, pos) => {
    //Solo queremos guardar en la BD los dientes que tengan un simbolo o algun lado pintado
    if (!esDienteVacio(item_diente)) {
      var num_diente = item_diente.querySelector("span").innerText;
      var btns = item_diente.querySelectorAll(".btn");
      var simbol_name = item_diente
        .querySelector(".simbo-container")
        .getAttribute("simbol");

      var left, top, right, bottom, center;
      //Tener cuidado con las posiciones, deben ser acorde el orden que está en el html
      center = btns.item(0).style.fill || "white";
      top = btns.item(1).style.fill || "white";
      right = btns.item(2).style.fill || "white";
      left = btns.item(3).style.fill || "white";
      bottom = btns.item(4).style.fill || "white";
      //Guardar diente en el array
      lingules_local.push({
        tipo: "lingual",
        num_diente,
        left,
        top,
        right,
        bottom,
        center,
        simbologia: simbol_name,
        pos
      });
    }
  });
  return linguales_local;
}

/**
 * Decuelve un array con los valores de los input recesion
 * @returns {Array}
 */
function getRecesiones() {
  //Se obtienen todos los input en orden
  var inputs_recesion = document.querySelectorAll(".col-recmov.recesion input");
  var recesiones_local = [];
  inputs_recesion.forEach((recesion, pos) => {
    //Agregar al array
    if (recesion.value) {
      recesiones_local.push({ recesion: recesion.value, pos });
    }
  });
  return recesiones_local;
}

/**
 * Decuelve un array con los valores de los input movilidad
 * @returns {Array}
 */
 function getMovilidades() {
  //Se obtienen todos los input en orden
  var inputs_movilidad = document.querySelectorAll(".col-recmov.movilidad input");
  var movilidades_local = [];
  inputs_movilidad.forEach((movilidad, pos) => {
    //Agregar al array
    if (movilidad.value) {
      movilidades_local.push({ movilidad: movilidad.value, pos });
    }
  });
  return movilidades_local;
}

function guardarDientes() {
  var dientes_vestibulares = document.querySelectorAll(
    ".item-diente-vestibular"
  );
  var dientes_linguales = document.querySelectorAll(".item-diente-lingual");
  //arreglo de objetos que contiene los dientes que han sido modificados
  var lingules_local = [];
  var vestibulares_local = [];

  //Dientes vestibulares
  dientes_vestibulares.forEach((item_diente, pos) => {
    //Solo queremos guardar en la BD los dientes que tengan un simbolo o algun lado pintado
    if (!esDienteVacio(item_diente)) {
      var num_diente = item_diente.querySelector("span").innerText;
      var btns = item_diente.querySelectorAll(".btn");
      var simbol_name = item_diente
        .querySelector(".simbo-container")
        .getAttribute("simbol");

      var left, top, right, bottom, center;
      //Tener cuidado con las posiciones, deben ser acorde el orden que está en el html
      top = btns.item(0).style.fill || "white";
      right = btns.item(1).style.fill || "white";
      left = btns.item(2).style.fill || "white";
      bottom = btns.item(3).style.fill || "white";
      center = btns.item(4).style.fill || "white";
      //Guardar diente en el array
      vestibulares_local.push({
        tipo: "vestibular",
        num_diente,
        left,
        top,
        right,
        bottom,
        center,
        simbologia: simbol_name,
        pos,
      });
    }
  });
  //Dientes linguales
  dientes_linguales.forEach((item_diente, pos) => {
    //Solo queremos guardar en la BD los dientes que tengan un simbolo o algun lado pintado
    if (!esDienteVacio(item_diente)) {
      var num_diente = item_diente.querySelector("span").innerText;
      var btns = item_diente.querySelectorAll(".btn");
      var simbol_name = item_diente
        .querySelector(".simbo-container")
        .getAttribute("simbol");

      var left, top, right, bottom, center;
      //Tener cuidado con las posiciones, deben ser acorde el orden que está en el html
      center = btns.item(0).style.fill || "white";
      top = btns.item(1).style.fill || "white";
      right = btns.item(2).style.fill || "white";
      left = btns.item(3).style.fill || "white";
      bottom = btns.item(4).style.fill || "white";
      //Guardar diente en el array
      lingules_local.push({
        tipo: "lingual",
        num_diente,
        left,
        top,
        right,
        bottom,
        center,
        simbologia: simbol_name,
        pos,
      });
    }
  });
  //Guardar arrays en LocalStorage
  localStorage.setItem("vestibulares", JSON.stringify(vestibulares_local));
  localStorage.setItem("linguales", JSON.stringify(lingules_local));

  console.log(vestibulares_local);
  console.log(lingules_local);
}


/**
 * Verifica si un diente está vacío
 * @param {Element} item_diente 
 * @returns {boolean}
 */
function esDienteVacio(item_diente) {
  var btns_pintados = false;
  var tiene_simbolo = false;
  var btns = item_diente.querySelectorAll(".btn");
  var simbo_container = item_diente.querySelector(".simbo-container");
  var btn_count = 0;
  btns.forEach((btn) => {
    if (btn.hasAttribute("pintado")) {
      btn_count++;
    }
  });
  //Si tiene alguno pintado
  if (btn_count >= 1) btns_pintados = true;
  if (simbo_container.hasAttribute("simbol")) tiene_simbolo = true;
  return !btns_pintados && !tiene_simbolo;
}

function limpiarOdontograma() {
  var dientes_vestibulares = document.querySelectorAll(
    ".item-diente-vestibular"
  );
  var dientes_linguales = document.querySelectorAll(".item-diente-lingual");
  var inputs_recesion = document.querySelectorAll(".col-recmov.recesion input");
  var inputs_movilidad = document.querySelectorAll(
    ".col-recmov.movilidad input"
  );

  dientes_vestibulares.forEach((item_diente) => {
    var btns = item_diente.querySelectorAll(".btn");
    var simbo_container = item_diente.querySelector(".simbo-container");
    //Eliminamos el simbolo de cada diente
    if (simbo_container.hasChildNodes()) {
      simbo_container.firstElementChild.remove();
    }
    //Limpiamos los botones de cada diente
    btns.forEach((btn) => {
      btn.style.fill = "white";
    });
  });
  dientes_linguales.forEach((item_diente) => {
    var btns = item_diente.querySelectorAll(".btn");
    var simbo_container = item_diente.querySelector(".simbo-container");
    //Eliminamos el simbolo de cada diente
    if (simbo_container.hasChildNodes()) {
      simbo_container.firstElementChild.remove();
    }
    //Limpiamos los botones de cada diente seteando su color a blanco
    btns.forEach((btn) => {
      btn.style.fill = "white";
    });
  });
  inputs_recesion.forEach((input) => {
    input.value = "";
  });
  inputs_movilidad.forEach((input) => {
    input.value = "";
  });

  //Eliminamos datos existentes en localStorage
  if (localStorage.getItem("vestibulares")) {
    localStorage.removeItem("vestibulares");
  }
  if (localStorage.getItem("linguales")) {
    localStorage.removeItem("linguales");
  }
  if (localStorage.getItem("recesiones")) {
    localStorage.removeItem("recesiones");
  }
  if (localStorage.getItem("movilidades")) {
    localStorage.removeItem("movilidades");
  }
}

function guardarRecesionMovilidad() {
  //Se obtienen todos los input en orden
  var inputs_recesion = document.querySelectorAll(".col-recmov.recesion input");
  var inputs_movilidad = document.querySelectorAll(
    ".col-recmov.movilidad input"
  );
  var recesiones_local = [];
  var movilidades_local = [];
  inputs_recesion.forEach((recesion, pos) => {
    //Agregar al array
    if (recesion.value) {
      recesiones_local.push({ recesion: recesion.value, pos });
    }
  });
  inputs_movilidad.forEach((movilidad, pos) => {
    //Agregar al array
    if (movilidad.value) {
      movilidades_local.push({ movilidad: movilidad.value, pos });
    }
  });
  //Agregamos al local Storage
  localStorage.setItem("recesiones", JSON.stringify(recesiones_local));
  localStorage.setItem("movilidades", JSON.stringify(movilidades_local));
  console.log(recesiones_local);
  console.log(movilidades_local);
}

function formatoFecha(fecha, formato) {
  const map = {
    dd: fecha.getDate(),
    mm: fecha.getMonth() + 1,
    yy: fecha.getFullYear().toString().slice(-2),
    yyyy: fecha.getFullYear(),
  };

  return formato.replace(/dd|mm|yy|yyy/gi, (matched) => map[matched]);
}
eventos();
