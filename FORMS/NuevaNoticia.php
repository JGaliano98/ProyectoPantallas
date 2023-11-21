<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

$guardar = isset($_POST['btnGuardar']);

if($guardar){

    $ID_Noticia = 0;
    $ID_Perfil = $_POST['perfil'];


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="post">
            <h1>Nueva Noticia</h1>
            <label>Perfil al que va dirigido la noticia:</label>
            <select name="perfil">
                <option value="Todos"> Todos</option>
                <option value="Alumno"> Alumno</option>
                <option value="Profesor"> Profesor</option>
            </select><br>
            <label>Fecha inicio (AAAA/MM/DD - hh:mm)</label>
            <input type="text"><br>
            <label>Fecha finalización (AAAA/MM/DD - hh:mm)</label>
            <input type="text"><br>
            <label>Titulo de la noticia:</label>
            <input type="text"><br>
            <label>Prioridad</label>
            <select name="prioridad">
                <option value="1"> Baja</option>
                <option value="2"> Media</option>
                <option value="3"> Alta</option>
            </select><br>
            <label>Duración:</label>
            <input type="text"><br>
            <label>Tipo:</label>
            <select id="tipo" onchange="cambiarEstadoCampo()">
                <option value="-" selected hidden>-</option>
                <option value="web">WEB</option>
                <option value="imagen"> Imagen</option>
                <option value="video"> Video</option>
            </select><br>
            <label>Contenido de la noticia:</label>
            <input type="text" id="contenido" disabled><br>
            <label>URL:</label>
            <input type="text" id="url" disabled><br>
            <label>Formato:</label>
            <input type="text" id="formato" disabled><br>
            <input type="submit" value="Guardar" name="btnGuardar">
        </form>

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