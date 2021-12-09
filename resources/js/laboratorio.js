import { URL_PUBLIC } from "./conf.js";
import { getTemplate, postFormData } from "./utils.js";

function eventos() {
    //buscarClick();
    itemsClick();
    subMenuClick();
}
function itemsClick() {
    let items = document.querySelectorAll('.item');
    items.forEach(item => {
        item.addEventListener("click", e => {
            let itemSelected = document.querySelector('.item.active');
            let submenu = e.currentTarget.nextElementSibling;
            let height = submenu.scrollHeight;

            //itemSelected.classList.remove("active");

            if (submenu.classList.contains("desplegar")) {
                submenu.classList.remove("desplegar");
                submenu.removeAttribute("style");//se quita la altura
                e.currentTarget.classList.remove("active");
            } else {
                submenu.classList.add("desplegar");
                submenu.style.height = height + "px";
                e.currentTarget.classList.add("active");
            }
            //submenu.classList.add("show");

            /*itemSelected.classList.remove("active");
            document.querySelector(".submenu.show").classList.remove("show");

            e.currentTarget.classList.add("active");
            e.currentTarget.parentElement.querySelector(".submenu").classList.add("show");*/
        });
    });
}
function subMenuClick() {
    document.querySelectorAll(".submenu").forEach(submenu => {
        submenu.addEventListener("click", async e => {
            let content=document.querySelector(".content");
            
            if (e.currentTarget.getAttribute("tipo")) {
                
                let tipo = e.currentTarget.getAttribute("tipo");
                if (tipo === "Bioquimica") {
                    console.log("nuevo");
                    switch (e.target.getAttribute("action")) {
                        case "Nuevo":
                            
                            var res=await getTemplate("laboratorio/plantillas/bioquimicaForm.html");
                            var htmlText=await res.text();
                            content.innerHTML=htmlText;
                            break;
                        case "Editar":
                            var res=await getTemplate("laboratorio/plantillas/bioquimicaEditar.html");
                            var htmlText=await res.text();
                            content.innerHTML=htmlText;
                            break;
                        default:
                            break;
                    }
                }
                if (tipo === "Coprologia") {
                    console.log("nuevo");
                    switch (e.target.getAttribute("action")) {
                        case "Nuevo":
                            
                            var res=await getTemplate("laboratorio/plantillas/coprologiaForm.html");
                            var htmlText=await res.text();
                            content.innerHTML=htmlText;
                            break;
                        case "Editar":
                            var res=await getTemplate("laboratorio/plantillas/bioquimicaEditar.html");
                            var htmlText=await res.text();
                            content.innerHTML=htmlText;
                            break;
                        default:
                            break;
                    }
                }
            }
        });
    });
}
eventos();