import { createCustomElement } from "./utils.js";
import { URL_PUBLIC } from "./conf.js";
const SVG_NS = 'http://www.w3.org/2000/svg';

class Odontograma {
    /**
     * Inicia una instancia con un objeto
     * @param {Object} parametros 
     */
    constructor(parametros) {
        this.disabled=parametros.disabled;
        this.enableEvents=parametros.enableEvents;
        this.showPaleta=parametros.showPaleta;

        this.odontograma = createCustomElement("div", {
            id: "odontograma",
            class: "odontograma"
        }, []);

        this.paletaContainer = createCustomElement("div", { id: "paleta-container" }, []);

        this.gridContainer = createCustomElement("div", {
            id: "grid-container",
            class: "grid-container"
        }, []);

        this.odontogramaContainer = createCustomElement("div", {
            id: "odontograma-container",
            class: "odontograma-container"
        }, []);



        this.dientes = [];
        this.recmovs = [];
        this.colorSelected = null;
        this.simboSelected = null;
    }

    crearPaleta() {
        //Agregar seccion de colores
        this.paletaContainer.appendChild(this.crearColores());
        //Agregar seccion de simbologias
        this.paletaContainer.appendChild(this.crearSimbologias());
        return this.paletaContainer;
    }

    crearColores() {
        var colorBlueItem = createCustomElement("div", { id: "color-blue" }, []);
        var colorRedItem = createCustomElement("div", { id: "color-red" }, []);
        var colorText = createCustomElement("p", { class: "paleta-text" }, []);
        colorText.innerText = "Colores";
        if (this.enableEvents) {
            colorBlueItem.addEventListener("click", this.colorClick.bind(this));
            colorRedItem.addEventListener("click", this.colorClick.bind(this));
        }


        var coloresGrid = createCustomElement("div", { id: "colores-grid" }, [colorRedItem, colorBlueItem]);
        var coloresContainer = createCustomElement("div", {
            id: "colores-container"
        }, [colorText, coloresGrid]);
        return coloresContainer;
    }

    /**
     * Crea las simbologias y retorna el contenedor
     * @returns {HTMLDivElement}
     */
    crearSimbologias() {

        var simboText = createCustomElement("p", { class: "paleta-text" }, []);
        simboText.innerText = "Simbologías";
        //Crear simbolos
        var simbolos = [
            this.crearSimboloPaleta("sellante-necesario"),
            this.crearSimboloPaleta("sellante-realizado"),
            this.crearSimboloPaleta("extraccion-indicada"),
            this.crearSimboloPaleta("perdida-por-caries"),
            this.crearSimboloPaleta("perdida-otra-causa"),
            this.crearSimboloPaleta("endodoncia"),
            this.crearSimboloPaleta("protesis-fija"),
            this.crearSimboloPaleta("protesis-removible"),
            this.crearSimboloPaleta("protesis-total"),
            this.crearSimboloPaleta("corona"),
            this.crearSimboloPaleta("obturado"),
            this.crearSimboloPaleta("caries"),
            this.crearSimboloPaleta("clean"),
        ];
        var simboGrid = createCustomElement("div", { id: "simbo-grid" }, simbolos);

        var simboContainer = createCustomElement("div", { id: "simbologias-container" }, [simboText, simboGrid]);

        return simboContainer;
    }

    /**
     * Administra el evento click de los botones de colores de la paleta
     * @param {Event} e 
     * @returns 
     */
    colorClick(e) {
        if (this.colorSelected === e.currentTarget) {
            e.currentTarget.classList.remove("selected");
            this.colorSelected = null;
            return;
        }

        if (this.colorSelected != null) {
            this.colorSelected.classList.remove("selected");
            e.currentTarget.classList.add("selected");
            this.colorSelected = e.currentTarget;
        } else {
            console.log(e.currentTarget);
            e.currentTarget.classList.add("selected");
            this.colorSelected = e.currentTarget;
        }
    }

    /**
     * Administra el evento click de cada simbolo
     * @param {Event} e 
     */
    simboloClick(e) {

        //Si son los mismos
        if (this.simboSelected == e.currentTarget) {
            e.currentTarget.classList.remove("selected");
            this.simboSelected = null;
            this.desactivateDienteSimboContainers();
            return;
        }

        if (this.simboSelected != null) {
            console.log("son los mismos");
            this.simboSelected.classList.remove("selected");
            e.currentTarget.classList.add("selected");
            this.simboSelected = e.currentTarget;
            //Mostramos el simbo-container para cada diente
            this.activateDienteSimboContainers();
        } else {
            e.currentTarget.classList.add("selected");
            this.simboSelected = e.currentTarget;
            //Mostramos el simbo-container para cada diente
            this.activateDienteSimboContainers();
        }
    }

    /**
     * Muestra todos los simboContainer de cada diente
     */
    activateDienteSimboContainers() {
        this.dientes.forEach(diente => {
            var simboContainer = diente.previousElementSibling;
            if(simboContainer)simboContainer.style.display = "block";
        });
    }

    /**
     * Oculta todos los simboContainers de los dientes que no tiene un simbolo agregado
     */
    desactivateDienteSimboContainers() {
        this.dientes.forEach(diente => {
            var simboContainer = diente.previousElementSibling;
            if (!simboContainer.style.backgroundImage) {
                simboContainer.style.display = "none";
            }

        });
    }

    /**
     * Crea y devuelve un simbolo para la paleta
     * @param {string} nombre 
     * @returns 
     */
    crearSimboloPaleta(nombre) {

        var simboImg = createCustomElement("img", { class: "simbo-img" }, []);
        simboImg.src = URL_PUBLIC + "images/svg/" + nombre + ".svg";
        var simbolo = createCustomElement("div", { class: "simbolo", name: nombre }, [simboImg]);
        if (this.enableEvents) {
            simbolo.addEventListener("click", this.simboloClick.bind(this));
        }
        return simbolo;
    }

    /**
     * Administra el evento click sobre el odontograma
     * @param {Event} e 
     */
    odontogramaClick(e) {
        //Cuando selecciona un lado del diente
        if (e.target.classList.contains("btn-diente") && e.target.classList.contains("btn-diente-hover")) {
            //Validamos cuando se selecciona el mismo
            if (this.colorSelected == null) return;
            var colorSelectedText = window.getComputedStyle(this.colorSelected).backgroundColor;
            console.log(window.getComputedStyle(this.colorSelected).backgroundColor);
            if (e.target.style.fill === colorSelectedText) {
                e.target.style.fill = "white";
                e.target.removeAttribute("pintado");
            } else {
                e.target.style.fill = colorSelectedText;
                e.target.setAttribute("pintado", true);
            }
        }
        //Cuando selecciona un elemento con la clase simbo-container
        if (e.target.classList.contains("diente-simbo-container")) {
            this.dienteSimboContainerClick(e.target);
        }
    }

    /**
     * Crea el odontograma con la paleta de simbolos y devuelve el contenedor del odontograma
     * @returns {HTMLDivElement} 
     */
    crearOdontograma() {
        //Crea primera seccion movilidad
        this.crearSeccionMovilidad(this.gridContainer);
        //Crea seccion dientes
        this.crearSeccionDientes(this.gridContainer);
        //Crea ultima seccion movilidad
        this.crearSeccionMovilidad(this.gridContainer);

        this.odontograma.appendChild(this.gridContainer);

        this.odontogramaContainer.appendChild(this.odontograma);

        if (this.enableEvents) {
            this.odontograma.addEventListener("click", this.odontogramaClick.bind(this));
        }

        //Crea la paleta
        if(this.showPaleta){
            this.odontogramaContainer.appendChild(this.crearPaleta());
        }
        
        return this.odontogramaContainer;
    }

    /**
     * Crea el odontograma de forma asíncrona con la paleta de simbolos y devuelve una promesa
     * @returns {Promise} el valor es el container
     */
    crearOdontogramaAsync() {
        return new Promise((resolve, reject) => {
            try {
                var container = this.crearOdontograma();
                resolve(container);
            } catch (error) {
                reject(error);
            }
        });
    }

    crearSeccionMovilidad(gridContainer) {
        //Primera fila 
        this.crearMovilidadORecesion(gridContainer, "Recesion");
        //Segunda fila 
        this.crearMovilidadORecesion(gridContainer, "Movilidad");
    }

    crearSeccionDientes(gridContainer) {
        var start = 0;
        var end = 0;

        //Creamos la primera columna que es el titulo "Vestibular"
        this.crearGridText(gridContainer, "Vestibular");

        //Primeros 8 vestibular
        start = 18;
        end = 11;
        this.crearDientes(start, end, "vestibular", gridContainer, false);

        //Segundos 8 vestibulares
        start = 21;
        end = 28;
        this.crearDientes(start, end, "vestibular", gridContainer, false);

        //Creamos la columna con el titulo "Lingual"
        this.crearGridText(gridContainer, "Lingual");


        //Primeros 8 linguales
        start = 55;
        end = 51;
        this.crearDientes(start, end, "lingual", gridContainer, false);

        //Segundos 8 linguales
        start = 61;
        end = 65;
        this.crearDientes(start, end, "lingual", gridContainer, false);

        //Terceros 8 linguales
        start = 85;
        end = 81;
        this.crearDientes(start, end, "lingual", gridContainer, true);

        //Cuartos 8 linguales
        start = 71;
        end = 75;
        this.crearDientes(start, end, "lingual", gridContainer, true);

        //Creamos la primera columna que es el titulo "Vestibular"
        this.crearGridText(gridContainer, "Vestibular");

        //Penultimos 8 vestibulares
        start = 48;
        end = 41;
        this.crearDientes(start, end, "vestibular", gridContainer, true);

        //Ultimos 8 vestibulares
        start = 31;
        end = 38;
        this.crearDientes(start, end, "vestibular", gridContainer, true);
    }

    crearMovilidadORecesion(gridContainer, tipo) {
        this.crearGridText(gridContainer, tipo);
        for (let index = 0; index < 16; index++) {
            var gridItem = document.createElement("div");
            var input = document.createElement("input");
            input.type = "text";
            input.maxLength = "1";
            input.classList.add("input-recmov");
            input.setAttribute("tipo", tipo.toLowerCase());
            
            if(!this.enableEvents){
                //input.classList.add("input-recmov-disabled");
                input.disabled="disabled";
            }
            gridItem.appendChild(input);
            gridContainer.appendChild(gridItem);
            this.recmovs.push(input);
        }
    }

    /**
     * Crea la primera columna del grid que pertence al texto del tipo de diente
     * @param {HTMLDivElement} gridContainer 
     * @param {string} tipo Vestibular ó Lingual
     */
    crearGridText(gridContainer, tipo) {
        //Creamos la columna con el titulo "Lingual"
        var gridTipo = document.createElement("div");
        gridTipo.classList.add("grid-item");
        var tipoContainer = document.createElement("div");
        tipoContainer.classList.add("tipo-container");
        tipoContainer.innerText = tipo;
        if (tipo === "Lingual") {
            gridTipo.id = "text-lingual";
        }
        gridTipo.appendChild(tipoContainer);
        gridContainer.appendChild(gridTipo);
    }

    /**
     * Crea y agrega 8 dientes al gridContainer
     * @param {int} start 
     * @param {int} end 
     * @param {string} tipo tipo del diente vestibular | lingual en minúsculas
     * @param {HTMLDivElement} gridContainer 
     * @param {boolean} reverse indica si el número del diente va arriba(false) o abajo(true)
     * @returns 
     */
    crearDientes(start, end, tipo, gridContainer, reverse) {
        if (start == end) return;
        var oper = start - end;
        for (let index = 0; index < 8; index++) {

            var gridItem = document.createElement("div");
            gridItem.classList.add("grid-item");

            var itemDiente = document.createElement("div");
            itemDiente.classList.add("item-diente");
            if (reverse) {
                itemDiente.classList.add("reverse");
            }

            var numDiv = document.createElement("div");
            numDiv.classList.add("diente-num");
            numDiv.innerText = start;

            var dienteContainer = document.createElement("div");
            dienteContainer.classList.add("diente-container");


            var diente = document.createElement("div");
            diente.classList.add("diente");
            diente.setAttribute("tipo", tipo);
            diente.setAttribute("num", start);

            var simboContainer = document.createElement("div");
            simboContainer.classList.add("diente-simbo-container");
            if(this.enableEvents){
                simboContainer.classList.add("hover");
            }
            diente.appendChild(this.obtenerSVGDiente(tipo));

            if (tipo === "vestibular") {

                dienteContainer.appendChild(simboContainer);
                dienteContainer.appendChild(diente);
                itemDiente.appendChild(numDiv);
                itemDiente.appendChild(dienteContainer);
                gridItem.appendChild(itemDiente);
                if (oper < 0) {
                    start++;
                } else {
                    start--;
                }
                this.dientes.push(diente);
            } else {
                if (index > 1 && index < 8 - 1) {
                    dienteContainer.appendChild(simboContainer);
                    dienteContainer.appendChild(diente);
                    itemDiente.appendChild(numDiv);
                    itemDiente.appendChild(dienteContainer);
                    gridItem.appendChild(itemDiente);
                    if (oper < 0) {
                        start++;
                    } else {
                        start--;
                    }
                    this.dientes.push(diente);
                }
            }

            gridContainer.appendChild(gridItem);

        }

    }

    /**
     * Crea la forma del diente vestibular y retorna un svg
     * @returns {SVGElement}
     */
    crearDienteVestibularSVG() {
        let svg = document.createElementNS(SVG_NS, "svg");
        this.setAttributes(svg, {
            width: "100%",
            height: "100%",
            viewBox: "0 0 102.41 102.41"
        });

        let topPolygon = document.createElementNS(SVG_NS, "polygon");
        this.setAttributes(topPolygon, {
            side: "top",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            points: "1.21 1.21 26.21 26.21 76.21 26.21 101.21 1.21 1.21 1.21"
        });

        let rightPolygon = document.createElementNS(SVG_NS, "polygon");
        this.setAttributes(rightPolygon, {
            side: "right",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            points: "101.21 1.21 76.21 26.21 76.21 76.21 101.21 101.21 101.21 1.21"
        });

        let leftPolygon = document.createElementNS(SVG_NS, "polygon");
        this.setAttributes(leftPolygon, {
            side: "left",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            points: "1.21 1.21 26.21 26.21 26.21 76.21 1.21 101.21 1.21 1.21"
        });

        let bottomPolygon = document.createElementNS(SVG_NS, "polygon");
        this.setAttributes(bottomPolygon, {
            side: "bottom",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            points: "1.21 101.21 26.21 76.21 76.21 76.21 101.21 101.21 1.21 101.21"
        });

        let centerRect = document.createElementNS(SVG_NS, "rect");
        this.setAttributes(centerRect, {
            side: "center",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            x: "26.21",
            y: "26.21",
            width: "50",
            height: "50"
        });

        svg.appendChild(topPolygon);
        svg.appendChild(rightPolygon);
        svg.appendChild(leftPolygon);
        svg.appendChild(bottomPolygon);
        svg.appendChild(centerRect);

        return svg;
    }

    /**
     * Crea la forma del diente lingual y retorna un svg
     * @returns {SVGElement}
     */
    crearDienteLingualSVG() {
        let svg = document.createElementNS(SVG_NS, "svg");
        this.setAttributes(svg, {
            width: "100%",
            height: "100%",
            viewBox: "-0.5 -0.5 105 105"
        });

        let line1 = document.createElementNS(SVG_NS, "line");
        this.setAttributes(line1, {
            x1: "68.18",
            y1: "32.82",
            x2: "85.86",
            y2: "15.14"
        });

        let line2 = document.createElementNS(SVG_NS, "line");
        this.setAttributes(line2, {
            x1: "32.82",
            y1: "32.82",
            x2: "15.14",
            y2: "15.14"
        });

        let topPath = document.createElementNS(SVG_NS, "path");
        this.setAttributes(topPath, {
            side: "top",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            d: "M32.82,32.82,15.14,15.14A49.21,49.21,0,0,1,50.5.5,49.21,49.21,0,0,1,85.86,15.14L68.18,32.82A23.85,23.85,0,0,0,50.5,25.5,23.85,23.85,0,0,0,32.82,32.82Z"
        });

        let rightPath = document.createElementNS(SVG_NS, "path");
        this.setAttributes(rightPath, {
            side: "right",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            d: "M68.18,32.82,85.86,15.14A49.21,49.21,0,0,1,100.5,50.5,49.21,49.21,0,0,1,85.86,85.86L68.18,68.18A23.85,23.85,0,0,0,75.5,50.5,23.85,23.85,0,0,0,68.18,32.82Z"
        });

        let leftPath = document.createElementNS(SVG_NS, "path");
        this.setAttributes(leftPath, {
            side: "left",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            d: "M32.82,68.18,15.14,85.86A49.21,49.21,0,0,1,.5,50.5,49.21,49.21,0,0,1,15.14,15.14L32.82,32.82A23.85,23.85,0,0,0,25.5,50.5,23.85,23.85,0,0,0,32.82,68.18Z"
        });

        let bottomPath = document.createElementNS(SVG_NS, "path");
        this.setAttributes(bottomPath, {
            side: "bottom",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            d: "M68.18,68.18,85.86,85.86A49.21,49.21,0,0,1,50.5,100.5,49.21,49.21,0,0,1,15.14,85.86L32.82,68.18A23.85,23.85,0,0,0,50.5,75.5,23.85,23.85,0,0,0,68.18,68.18Z"
        });

        let centerCircle = document.createElementNS(SVG_NS, "circle");
        this.setAttributes(centerCircle, {
            side: "center",
            class: this.enableEvents == true ? "btn-diente btn-diente-hover" : "btn-diente",
            cx: "50.5",
            cy: "50.5",
            r: "25"
        });

        let line3 = document.createElementNS(SVG_NS, "line");
        this.setAttributes(line3, {
            x1: "68.31",
            y1: "68.31",
            x2: "85.98",
            y2: "85.98"
        });

        let line4 = document.createElementNS(SVG_NS, "line");
        this.setAttributes(line4, {
            x1: "32.69",
            y1: "68.31",
            x2: "15.02",
            y2: "85.98"
        });

        svg.appendChild(line1);
        svg.appendChild(line2);
        svg.appendChild(topPath);
        svg.appendChild(rightPath);
        svg.appendChild(leftPath);
        svg.appendChild(bottomPath);
        svg.appendChild(centerCircle);
        svg.appendChild(line3);
        svg.appendChild(line4);

        return svg;
    }

    /**
     * Recibe un objeto con los atributos y los agrega al elemento html
     * @param {HTMLElement} element 
     * @param {Object} object 
     */
    setAttributes(element, object) {
        for (const key in object) {
            if (Object.hasOwnProperty.call(object, key)) {
                const value = object[key];
                element.setAttributeNS(null, key, value);
            }
        }
    }

    /**
     * Administra el evento click de cada dienteSimboContainer
     * @param {HTMLDivElement} simboContainer 
     * @returns 
     */
    dienteSimboContainerClick(simboContainer) {
        if (this.simboSelected) {
            var name = this.simboSelected.getAttribute("name");
            if (name === "clean") {
                simboContainer.style.backgroundImage = null;
                simboContainer.nextElementSibling.removeAttribute("simbologia");
                return;
            }
            simboContainer.style.backgroundImage = `url('${URL_PUBLIC}images/svg/${name}.svg')`;
            simboContainer.nextElementSibling.setAttribute("simbologia",name);
        }
    }

    /** 
     * Devuelve el diente dependiendo del tipo
     * @param {string} tipo tipo de diente vestibular | lingual en minúsculas
     * @returns {SVGElement} diente
    */
    obtenerSVGDiente(tipo) {
        if (tipo === "vestibular") {
            return this.crearDienteVestibularSVG();
        } else {
            return this.crearDienteLingualSVG();
        }
    }

    /**
     * Devuelve todos los dientes que al menos tengan una simbología o parte pintada
     * @returns {Array} retorna el array de dientes
     */
    obtenerDientesJson() {
        let dientesArray = [];
        this.dientes.forEach((diente, pos) => {
            if (!this.esDienteVacio(diente)) {
                let tipo = diente.getAttribute("tipo");
                let numDiente = diente.getAttribute("num");
                let simbologia=diente.getAttribute("simbologia");
                let btns = diente.querySelectorAll(".btn-diente");
                let dienteTop = btns.item(0).style.fill || "white";
                let dienteRight = btns.item(1).style.fill || "white";
                let dienteLeft = btns.item(2).style.fill || "white";
                let dienteBottom = btns.item(3).style.fill || "white";
                let dienteCenter = btns.item(4).style.fill || "white";

                dientesArray.push({
                    tipo,
                    numDiente,
                    simbologia,
                    dienteLeft,
                    dienteTop,
                    dienteRight,
                    dienteBottom,
                    dienteCenter,
                    pos
                });
            }

        });
        return dientesArray;
    }

    /**
     * Devuelve todos los datos de movilidad y recesion.
     * @returns {Array}
     */
    obtenerRecesionesYMovilidades() {
        let recmovArray = [];
        this.recmovs.forEach((input, pos) => {
            if (input.value !== null && input.value !== "") {
                let tipo = input.getAttribute("tipo");
                let valor = input.value;
                recmovArray.push({
                    tipo,
                    valor,
                    pos
                });
            }

        });
        return recmovArray;
    }

    /**
     * Verifica si un diente está vacío
     * @param {HTMLDivElement} diente 
     * @returns {boolean}
     */
    esDienteVacio(diente) {
        var btnsPintados = false;
        var tieneSimbolo = false;
        var btns = diente.querySelectorAll(".btn-diente");
        var simboContainer = diente.previousElementSibling;
        var btnCount = 0;
        btns.forEach((btn) => {
            if (btn.hasAttribute("pintado")) {
                btnCount++;
            }
        });
        //Si tiene alguno pintado
        if (btnCount >= 1) btnsPintados = true;
        //Si tiene un simbolo agregado
        if (!simboContainer) {
            tieneSimbolo = false;
        }else{
            if(simboContainer.style.backgroundImage){
                tieneSimbolo = true;
            }else{
                tieneSimbolo = false;
            }
        }
        return !btnsPintados && !tieneSimbolo;
    }

    
    setDataDientes(dientesJson){
        dientesJson.forEach(dienteJson => {
            let dienteDiv=this.dientes[dienteJson.pos];
            dienteDiv.setAttribute("simbologia",dienteJson.simbologia);
            if(dienteDiv){
                let simboContainer=dienteDiv.previousSibling;
                let btns=dienteDiv.querySelectorAll(".btn-diente");

                btns.item(0).style.fill=dienteJson.dienteTop;
                btns.item(1).style.fill=dienteJson.dienteRight;
                btns.item(2).style.fill=dienteJson.dienteLeft;
                btns.item(3).style.fill=dienteJson.dienteBottom;
                btns.item(4).style.fill=dienteJson.dienteCenter;

                if(dienteJson.simbologia!=null){
                    simboContainer.style.backgroundImage=`url('${URL_PUBLIC}images/svg/${dienteJson.simbologia}.svg')`
                    simboContainer.style.display="block";
                }
            }
        });
    }


    setDataMovilidadYRecesion(recmovs){
        recmovs.forEach(recmov => {
            let input=this.recmovs[recmov.pos];
            if(input){
                input.value=recmov.valor;
            }
        });
    }

    //Getters

    getDientes() {
        return this.dientes;
    }

    getOdontograma() {
        return this.odontograma;
    }

    getRecMovs() {
        return this.recmovs;
    }
}

export { Odontograma };
