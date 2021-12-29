import { URL_VIEWS } from "./conf.js";

const NOMBRE_PATTERN = /^[a-zA-Z]À-ÿ\s]{1,50}$/;
const NUMERIC_PATTERN = /^[0-9]$/;

const ERRORS_MESSAGES=new WeakMap([
  ["required","El campo no debe estar vacío"],
  ["numeric","El campo debe ser númerico"],
  ["pattern","El campo no cumple con el formato"]
]);


function addTemplateToElement(element, template) {
  element.innerHTML = template;
}

function loadTemplateToElement(path, element) {
  getTemplate(path)
    .then(res => {
      if (res.ok) {
        res.text()
          .then(template => {
            addTemplateToElement(element, template);
            console.log(template);
          })
          .catch(err => {
            console.log(err);
          });
      }
    })
    .catch(err => {
      console.log(err);
    });
}
function deleteRequest(url) {
  return fetch(url, {
    method: "DELETE",
    headers: {
      'Content-Type': 'application/json'
    },
    body: null
  });
}
function post(url, data, token) {
  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify(data),
  });
}

function postFormData(url, data, token) {
  return fetch(url, {
    method: "POST",
    headers: {
      'X-CSRF-TOKEN': token
    },
    body: data
  });
}

function get(url) {
  return fetch(url);
}

function getTemplate(path) {
  var newPath = URL_VIEWS + path;
  return get(newPath);
}

function fetchDelete(url, data, token) {
  return fetch(url, {
    method: "POST",
    headers: {
      'X-CSRF-TOKEN': token
    },
    body: data
  });
}
function createCustomElement(element, attributes, children) {
  let customElement = document.createElement(element);
  if (children !== undefined) {
    children.forEach((el) => {
      if (el.nodeType) {
        if (el.nodeType === 1 || el.nodeType === 11)
          customElement.appendChild(el);
      } else {
        customElement.innerHTML += el;
      }
    });
  }
  addAttributes(customElement, attributes);
  return customElement;
}

function addAttributes(element, attrObj) {
  for (const attr in attrObj) {
    if (attrObj.hasOwnProperty(attr)) {
      element.setAttribute(attr, attrObj[attr]);
    }
  }
}

function buildModal(params) {
  for (const property in params) {

    if (Object.hasOwnProperty.call(params, property)) {
      const value = params[property];
      if (property) {
        if (typeof value === "function") {
          //Ejecuta la funcion pasada a la propiedad
          value.g;
        }
      }
    }
  }
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

function dataURLtoFile(dataurl, filename) {

  var arr = dataurl.split(','),
    mime = arr[0].match(/:(.*?);/)[1],
    bstr = atob(arr[1]),
    n = bstr.length,
    u8arr = new Uint8Array(n);

  while (n--) {
    u8arr[n] = bstr.charCodeAt(n);
  }

  return new File([u8arr], filename, { type: mime });
}

/**
 * Agrega o reemplaza un error en el array pasado como parametro
 * @param {object} error
 * @param {Array} errors
 */
function addError(error,errors) {
  var index = errors.findIndex(err => err.element === error.element);
  //Agrega si no existe,caso contrario actualiza el error
  if (index < 0){
    errors.push(error);
  }
  else{
    errors[index] = error;
  }
}

/**
 * Elimina un error en el array pasado como parametro
 * @param {object} error
 * @param {Array} errors
 */
function removeError(error,errors) {
  var index = errors.findIndex(err => err.element === error.element);
  errors.splice(index, index >= 0 ? 1 : 0);
}

/**
 * Agrega el estilo css al elemento pasado en params y agrega el error al array de errores
 * @param {object} params 
 */
function addErrorStyle(params) {
  let { formControl, errorMessage, errorType, fields , errors} = params;
  let errorElement=formControl.nextElementSibling;
  formControl.classList.add("error");
  errorElement.classList.add("error");
  errorElement.textContent = errorMessage;
  errorElement.classList.remove("d-none");
  addError({
    type: errorType,
    element: formControl
  }, errors);
  fields[formControl.name] = false;
}

/**
 * Elimina el estilo css al elemento pasado en params y quita el error del array de errores
 * @param {object} params 
 */
function removeErrorStyle(params) {
  let { formControl, errorType, errors, fields } = params;
  let errorElement=formControl.nextElementSibling;
  formControl.classList.remove("error");
  errorElement.classList.remove("error");
  errorElement.textContent = "";
  errorElement.classList.add("d-none");
  removeError({
    type: errorType,
    element: formControl
  }, errors);
  fields[formControl.name] = true;
}

/**
 * Verifica que el indice del select sea mayor a cero (Que el usuario haya seleccionado algo)
 * @param {HTMLSelectElement} selectElement 
 * @returns {boolean}
 */
function isValidSelected(selectElement) {
  console.log("SELECTED INDEX: " + selectElement.selectedIndex);
  return selectElement.selectedIndex > 0;
}

/**
 * Valida que el input no esté vacío
 * @param {object} params
 * @param {string} validate
 * @return {boolean} boolean
 */
function validateInput(params) {
  if(params.required){
    if (isEmpty(params.formControl)) {
      console.log("entró aqui");
      params.errorMessage = "El campo no debe estar vacío";
      params.errorType = "empty";
      console.log("Entre en required");
      addErrorStyle(params);
      params=null;
      return false;
    }
  }
  if(params.numeric){
    if (!isNumber(params.formControl)) {
      console.log("entré en if");
      params.errorMessage = "El campo debe ser númerico";
      params.errorType = "numeric";
      addErrorStyle(params);
      params=null;
      return false;
    }
  }
  //Si llega hasta aquí no hay ningun error
  removeErrorStyle(params);
  params=null;
  return true;
}

/**
 * Valida si el elemento select tiene un error y agrega los estilos correspondientes
 * @param {HTMLSelectElement} select 
 * @param {Array} errors
 * @param {Array} fields
 * @param {string} errorMessage 
 * @returns {boolean}
 */
function validateSelect(select, errors, fields, errorMessage) {
  var params = {
    formControl: select,
    className: "error",
    errorElement: select.nextElementSibling,
    errorMessage,
    errorType: "select",
    errors,
    fields
  };

  if (!isValidSelected(params.formControl)) {
    addErrorStyle(params);
    params=null;
    return false;
  }

  removeErrorStyle(params);
  params = null;
  return true;
}

/**
 * Valida si el valor del input es un número
 * @param {HTMLInputElement} input 
 * @returns {boolean}
 */
function isNumber(input) {
  return !isNaN(input.value);
}

/**
 * Valida si el valor del input es vacío
 * @param {HTMLInputElement} input 
 * @returns {boolean}
 */
function isEmpty(input) {
  return input.value === "";
}

/**
 * Valida si el valor del input cumple con el patrón especificado
 * @param {HTMLInputElement} input 
 * @param {string} pattern 
 * @returns {boolean}
 */
function acceptPattern(input, pattern) {
  return pattern.test(input.value);
}
function roundToTwo(num) {
  return +(Math.round(num + "e+2")  + "e-2");
}
export {
  getTemplate, post, postFormData, get,
  createCustomElement, loadTemplateToElement,
  buildModal, formatoFecha, dataURLtoFile,
  deleteRequest, fetchDelete, validateInput, 
  validateSelect, acceptPattern,removeErrorStyle,
  isEmpty,addErrorStyle,roundToTwo
};
