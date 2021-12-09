import { createCustomElement } from "./utils"
export default class Modal {
    constructor(params) {
        //this.container = params.container;//Reference to DOMELEMENT
        this.html = params.html;//This is the template in string
        this.showButtonCancel = params.showButtonCancel || true;//true or false
        this.showButtonSave = params.showButtonSave || true;//true o or false
        //this.save=params.save;
        //buil modal
        this.containerButtons=this.createButtonsContainer();
        this.modal=this.createModal([this.html,this.containerButtons]);
        this.modalContainer=this.createContainer([this.modal]);
    }
    displayModal() {
        this.modal.style.opacity="1";
        this.modalContainer.style.opacity="1";
        this.modalContainer.style.visibility="visible";
    }
    hideModal(){
        this.modal.style.opacity="0";
        this.modalContainer.style.opacity="0";
        this.modalContainer.style.visibility="hidden";
    }

    show(){
        this.displayModal();
        this.addModal();
    }

    hide(){
        this.hideModal();
        this.deleteModal();
    }

    addModal(){
        document.querySelector("body").appendChild(this.modalContainer);
    }
    deleteModal(){
        document.querySelector("body").removeChild(this.modalContainer);
    }
    

    createContainer(children) {
        //Crear contenedor principal
        const modalContainerEl = createCustomElement(
            "div",
            {
                id: "modal-container",
                class: "modal-container",
            },
            children
        );
        return modalContainerEl;
    }

    /**
     * @content are the childs elements or array of templates.
     */
    createModal(children) {
        //Crear contenido interno
        const modal = createCustomElement(
            "div",
            {
                id: "modal",
                class: "modal",
            },
            children
        );
        return modal;
    }
    createButtonsContainer() {
        //Create save button
        const saveButton = createCustomElement("button", {
            id: "btn-save",
            class: "btn"
        }, ["Guardar"]);
        
        //Create cancel Button
        const cancelButton = createCustomElement("button", {
            id: "btn-cancel",
            class: "btn"
        },["Cancelar"]);
        cancelButton.addEventListener("click",e=>{
            this.cancelButton();
        });
        //Create container of Buttons and add the buttons
        const modalButtonsContainer = createCustomElement("div", {
            id: "modal-buttons-container",
            class: "modal-buttons-container"
        }, [cancelButton, saveButton]);
        return modalButtonsContainer;
    }
    cancelButton(){
        this.hide();
    }
    saveButton(){
       
    }
}
