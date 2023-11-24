<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

$guardar = isset($_POST['btnGuardar']);
$volver = isset($_POST['btnVolver']);

if($guardar){

    $ID_Noticia = 0;
    $ID_Perfil = $_POST['perfil'];
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $titulo = $_POST['titulo'];
    $prioridad = $_POST['prioridad'];
    $duracion = $_POST['duracion'];
    $tipo = $_POST['tipo'];

    if($tipo == "web"){
        $contenido = $_POST['contenido'];
        $url = null;
        $formato = null;
    }
    if($tipo == "imagen"){
        $contenido = null;
        $url = "./RECURSOS/IMAGENES/".$_POST['url'];
        $formato = null;
    }
    if($tipo == "video"){
        $contenido = null;
        $url ="./RECURSOS/VIDEOS/". $_POST['url'];
        $formato = $_POST['formato'];
    }

    $nuevanoticia = new Noticia ($ID_Noticia,$ID_Perfil,$fecha_ini,$fecha_fin,$titulo,$prioridad,$duracion,$tipo,$contenido,$url,$formato);

    RP_Noticia::InsertaObjetoNoticia($nuevanoticia);

    ?><script>alert("Noticia insertada con éxito");</script><?php

}
if($volver){
    header("Location: ./FormularioNoticia.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../STYLES/estilos.css">

</head>
<body>
       <div id="nuevaNoticia">
            <form method="post">
                    <div id="titulo">
                        <h1>Nueva Noticia</h1>
                    </div>
                    <label>Perfil al que va dirigido la noticia:</label>
                    <select name="perfil">
                        <option value="-" selected hidden>-</option>
                        <option value="1"> Todos</option>
                        <option value="2"> Alumno</option>
                        <option value="3"> Profesor</option>
                    </select><br>
                    <label>Fecha inicio:</label>
                    <input type="datetime-local" name="fecha_ini"><br>
                    <label>Fecha finalización:</label>
                    <input type="datetime-local" name="fecha_fin"><br>
                    <label>Titulo de la noticia:</label>
                    <input type="text" name="titulo"><br>
                    <label>Prioridad: </label>
                    <select name="prioridad">
                        <option value="-" selected hidden>-</option>
                        <option value="1"> Baja</option>
                        <option value="2"> Media</option>
                        <option value="3"> Alta</option>
                    </select><br>
                    <label>Duración:</label>
                    <input type="text" name="duracion"><br>
                    <label>Tipo:</label>
                    <select id="tipo" name="tipo" onchange="cambiarEstadoCampo()">
                        <option value="-" selected hidden>-</option>
                        <option value="web">WEB</option>
                        <option value="imagen"> Imagen</option>
                        <option value="video"> Video</option>
                    </select><br>
                    <label>Contenido de la noticia:</label><br>
                    <textarea name="contenido" id="contenido" disabled></textarea><br>
                    <label>URL:</label>
                    <input type="file" id="url" name="url" disabled><br>
                    <label>Formato:</label>
                    <input type="text" id="formato" name="formato" disabled><br><br>
                    <input type="submit" value="Guardar" name="btnGuardar" id="btnGuardar">
                    <input type="submit" value="Volver" name="btnVolver" id="btnVolver">
                </form>
       </div>

        <script>
            function cambiarEstadoCampo() {
            var opcionSeleccionada = document.getElementById("tipo").value;
            var campoContenido = document.getElementById("contenido");
            var campoUrl = document.getElementById("url");
            var campoFormato = document.getElementById("formato");

            if (opcionSeleccionada === "web") {
                campoContenido.disabled = false;
                campoUrl.disabled = true;
                campoFormato.disabled = true;

            }
            if (opcionSeleccionada === "imagen") {
                campoContenido.disabled = true;
                campoUrl.disabled = false;
                campoFormato.disabled = true;

            }
            if (opcionSeleccionada === "video") {
                campoContenido.disabled = true;
                campoUrl.disabled = false;
                campoFormato.disabled = false;

            }
            }
        </script>

</body>
</html>