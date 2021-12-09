import {URL_VIEWS} from "./conf.js";
function addTemplateToElement(element,template) {
  element.innerHTML=template;
}

function loadTemplateToElement(path,element) {
  getTemplate(path)
  .then(res=>{
    if(res.ok){
      res.text()
      .then(template=>{
        addTemplateToElement(element,template);
        console.log(template);
      })
      .catch(err=>{
        console.log(err);
      });
    }
  })
  .catch(err=>{
    console.log(err);
  });
}
function deleteRequest(url) {
  return fetch(url,{
    method:"DELETE",
    headers: {
      'Content-Type': 'application/json'
    },
    body: null
  });
}
function post(url, data,token) {
  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify(data),
  });
}

function postFormData(url,data,token) {
  return fetch(url, {
    method: "POST",
    headers:{
      'X-CSRF-TOKEN': token
    },
    body:data
  });
}

function get(url) {
  return fetch(url);
}

function getTemplate(path) {
  var newPath=URL_VIEWS+path;
  return get(newPath);
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
      if(property){
        if(typeof value ==="function"){
          //Ejecuta la funcion pasada a la propiedad
          value.g;
        }
      }
    }
  }
  //Crear contenido interno
  const modalContentEl = createCustomElement(
    "div",
    {
      id: "modal",
      class: "modal",
    },
    [content]
  );

  //Crear contenedor principal
  const modalContainerEl = createCustomElement(
    "div",
    {
      id: "modal-container",
      class: "modal-container",
    },
    [modalContentEl]
  );
  //crear contenedor para boton de cancelar y guardar
  const saveButton=createCustomElement("button",{
    id:"btn-save",
    class:"btn"
  },[]);
  const cancelButton=createCustomElement("button",{
    id:"btn-cancel",
    class:"btn"
  });
  const modalButtonsContainer=createCustomElement("div",{
    id:"modalButtons-container",
    class:"modalButtons-container"
  },[cancelButton,saveButton]); 
  //document.body.appendChild(modalContainerEl);

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
      
  while(n--){
      u8arr[n] = bstr.charCodeAt(n);
  }
  
  return new File([u8arr], filename, {type:mime});
}
export { getTemplate, post,postFormData, get, 
  createCustomElement,loadTemplateToElement,
  buildModal,formatoFecha,dataURLtoFile,
  deleteRequest
};
