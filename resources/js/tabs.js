(function (d) { 
    let tabs=Array.prototype.slice.apply(d.querySelectorAll(".tabs-item"));
    let panels=Array.prototype.slice.apply(d.querySelectorAll(".panels-item"));
    d.getElementById("tabs").addEventListener("click",e=>{
        if(e.target.classList.contains("tabs-item")){
            let i=tabs.indexOf(e.target);
            //Map devuelve un nuevo array con los cambios especificados
            tabs.map(tab=>tab.classList.remove("active"));
            tabs[i].classList.add("active");
            panels.map(panel=>panel.classList.remove("active"));
            panels[i].classList.add("active");
            console.log(tabs[i].innerText);
            if(tabs[i].innerText=="Odontograma"){
                console.log("entro");
                var sidebar=document.getElementById("sidebar");
                if(!sidebar.classList.contains("active")){
                    sidebar.classList.add("active");
                }
            }
        }
    });
})(document);