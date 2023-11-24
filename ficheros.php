<?php

$submit = isset($_POST['submit']);


if($submit){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $dirSubida = 'C:/xampp/htdocs/ProyectoPantallas/RECURSOS/IMAGENES/';
            
            $ficheroSubido = $dirSubida . basename($_FILES['fichero']['name']);
                
            $foto = $_FILES['fichero']['tmp_name'];
    
            if (move_uploaded_file($foto, $ficheroSubido)) 
            {     
                echo "Imagen subida correctamente";
               
            } 
            else 
            {
                echo "Archivo NO válido.";
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./JS/js.js"></script>
</head>
<body>
    <form method="post">
        <input type="file" name="fichero" id="fichero">
        <input type="submit" value="enviar" name="enviar" id="enviar">

    </form>
</body>
</html>