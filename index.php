<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $usuario = isset($_GET['perfil'])?$_GET['perfil']:"";


    if($usuario == 'Alumno'){
        session::login($usuario);

        

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Alumno</title>
            <script src="JS/mostrar.js"></script>
            <link rel="stylesheet" href="./STYLES/estilos.css">
        
        
        </head>
        <body>
            <div id="contenido">
        
            </div>
        </body>
        </html>
        <?php
    }else

    if($usuario == 'Profesor'){
        session::login($usuario);
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Profesor</title>
            <script src="./JS/mostrar.js"></script>
            <link rel="stylesheet" href="./STYLES/estilos.css">
        </head>
        <body>
            <div id="contenido">
        
            </div>
        </body>
        </html>
        <?php

    }
    if($usuario == 'Todos'){

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Todos</title>
            <script src="./JS/mostrar.js"></script>
            <link rel="stylesheet" href="./STYLES/estilos.css">
        
        
        </head>
        <body>
            <div id="contenido">
        
            </div>
        </body>
        </html>
        <?php


    }
}


?>


