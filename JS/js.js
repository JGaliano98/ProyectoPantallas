window.addEventListener("load", function(){

    const enviar= document.getElementById("enviar");
    const fichero = document.getElementById("fichero");


    enviar.onclick=function(ev){

        ev.preventDefault(); //Para que no haga el evento que hace por defecto, es decir, no hace el submit en este caso.
        if(fichero.files.length>0){
            var form=new FormData();
            form.append("submit", "hola");
            form.append("fichero", fichero.files[0])
            fetch("ficheros.php", {
                method:"post",
                body:form
            }).then(x=>x.text()).then(texto=>{alert(texto)});
        } else{
            alert("Debe introducir un fichero.");
        }  
    }
});