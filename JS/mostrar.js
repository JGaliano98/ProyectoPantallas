window.addEventListener("load", function(){

var divContenedor = document.getElementById("contenido");


fetch("../ProyectoPantallas/index.html")

    .then(x=>x.text())
    .then(y=>{

        var contenedor = document.createElement("div");

        contenedor.innerHTML=y;

        var contenido = contenedor.firstChild;

        fetch("../ProyectoPantallas/json.json")
        .then(x=>x.json())
        .then(y=>{

            if(y.tipo == "web"){
                var web = this.document.createElement("div");
                web.innerHTML=y.contenido;
                contenedor.appendChild(web);
                divContenedor.appendChild(contenedor);
            }
            if(y.tipo == "imagen"){
                var imagen = this.document.createElement("img");
                imagen.src=y.url;
                contenedor.appendChild(imagen);
                divContenedor.appendChild(contenedor);
                imagen.style.width="100%";

            }
            if(y.tipo == "video"){
                var video = this.document.createElement("video");
                video.src=y.url;
                video.type=y.formato;
                video.controls=true;
                contenedor.appendChild(video);
                divContenedor.appendChild(contenedor);
                video.muted=true;
                video.autoplay=true;
                video.style.width="100%";
                

            }
        })

    })

})