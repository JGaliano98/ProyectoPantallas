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