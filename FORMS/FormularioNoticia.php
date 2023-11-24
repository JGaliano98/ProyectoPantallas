<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

$btnNuevaNoticia =isset($_POST['btnNuevaNoticia']);


if($btnNuevaNoticia){
    
    header("Location: ./NuevaNoticia.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Nueva Noticia</title>
    <link rel="stylesheet" href="../STYLES/estilos.css">

</head>
<body>

            <?php

            $mostrar = RP_Noticia::MostrarTodoArray();
            $i = 0;

            if ($mostrar == null) {
                echo "No hay noticias existentes";
            } else {
                ?>
                <div id="divTablaNoticias">
                    <form method="post">
                    <div id="botonNuevaNoticia">
                        <input type="submit" value="Nueva Noticia" name="btnNuevaNoticia" id="btnNuevaNoticia">
                    </div>
                    <div id="divNoticias">
                        <table class="tablaMostrar">
                            <tr>
                                <th></th>
                                <th>ID_Perfil</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Duración</th>
                                <th>Tipo</th>
                                <th>Contenido</th>
                                <th>URL</th>
                                <th>Formato</th>
                            </tr>
                            <?php
                            $nuevoObjeto = array(); // Inicializa el array antes del bucle

                            foreach ($mostrar as $key):
                            ?>
                                <tr>
                                    <td><input type="text" id="inputActualizarID" name="ID_Noticia[]" value="<?php echo $key->getID_Noticia(); ?>" hidden ></td>
                                    <td><input type="text" id="inputActualizarID" name="ID_Perfil[]" value="<?php echo $key->getID_Perfil(); ?>"></td>
                                    <td><input type="text" id="inputActualizarFechas" name="fechaIni[]" value="<?php echo $key->getFechaIni(); ?>"></td>
                                    <td><input type="text" id="inputActualizarFechas" name="fechaFin[]" value="<?php echo $key->getFechaFin(); ?>"></td>
                                    <td><input type="text" id="inputActualizar" name="titulo[]" value="<?php echo $key->getTitulo(); ?>"></td>
                                    <td><input type="text" id="inputActualizarPrioridad" name="prioridad[]" value="<?php echo $key->getPrioridad(); ?>"></td>
                                    <td><input type="text" id="inputActualizarDuracion" name="duracion[]" value="<?php echo $key->getDuracion(); ?>"></td>
                                    <td><input type="text" id="inputActualizarTipo" name="tipo[]" value="<?php echo $key->getTipo(); ?>"></td>
                                    <td><input type="text" id="inputActualizar" name="contenido[]" value="<?php echo $key->getContenido(); ?>"></td>
                                    <td><input type="text" id="inputActualizar" name="url[]" value="<?php echo $key->getUrl(); ?>"></td>
                                    <td><input type="text" id="inputActualizarFormato" name="formato[]" value="<?php echo $key->getFormato(); ?>"></td>
                                    <td>
                                        <input type="submit" id="btnEditar" name="btnEditar<?php echo $i ?>" value="Editar">
                                    </td>
                                    <td>
                                        <input type="submit" id="btnBorrar" name="btnBorrar<?php echo $i ?>" value="Borrar">
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </table>
                    </div>
                        
                    </form>
                </div>

                <?php
            }
            ?>

    

</body>
</html>

<?php

//para borrar
for ($j = 0; $j < $i; $j++) { //Bucle para ver que boton borrar he pulsado, coger el id de la noticia en cuestión y la borra.
    if (isset($_POST['btnBorrar' . $j])) {
        RP_Noticia::BorraPorID($mostrar[$j]->getID_Noticia());

        echo '<script>window.location.href="./FormularioNoticia.php";</script>';
    }
}

//Para editar

// Verifica si se ha enviado el formulario antes de procesar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($j = 0; $j < $i; $j++) {
        if (isset($_POST['btnEditar'. $j])) {
            $IDs = isset($_POST['ID_Noticia']) ? $_POST['ID_Noticia'] : null;
            $ID_Perfiles = isset($_POST['ID_Perfil']) ? $_POST['ID_Perfil'] : null;
            $fechas_ini = isset($_POST['fechaIni']) ? $_POST['fechaIni'] : null;
            $fechas_fin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
            $titulos = isset($_POST['titulo']) ? $_POST['titulo'] : null;
            $prioridades = isset($_POST['prioridad']) ? $_POST['prioridad'] : null;
            $duraciones = isset($_POST['duracion']) ? $_POST['duracion'] : null;
            $tipos = isset($_POST['tipo']) ? $_POST['tipo'] : null;
            $contenidos = isset($_POST['contenido']) ? $_POST['contenido'] : null;
            $urls = isset($_POST['url']) ? $_POST['url'] : null;
            $formatos = isset($_POST['formato']) ? $_POST['formato'] : null;
    
            //Si todo es correcto, añade los datos y crea el objeto
            if (isset($IDs[$j], $ID_Perfiles[$j], $fechas_ini[$j], $fechas_fin[$j],$titulos[$j], $prioridades[$j], $duraciones[$j], $tipos[$j], $contenidos[$j], $urls[$j], $formatos[$j])) {
                $ID = $IDs[$j];
                $ID_Perfil = $ID_Perfiles[$j];
                $fecha_ini = $fechas_ini[$j];
                $fecha_fin = $fechas_fin[$j];
                $titulo = $titulos[$j];
                $prioridad = $prioridades[$j];
                $duracion = $duraciones[$j];
                $tipo = $tipos[$j];
                $contenido = $contenidos[$j]; 
                $url = $urls[$j];
                $formato = $formatos[$j];
        
    
                $nuevoObjeto[$j] = new Noticia ($ID, $ID_Perfil, $fecha_ini, $fecha_fin, $titulo, $prioridad,$duracion,$tipo,$contenido,$url,$formato);
                
                // Actualiza el usuario por ID
                RP_Noticia::ActualizaPorID($mostrar[$j]->getID_Noticia(), $nuevoObjeto[$j]);
    
                echo '<script>window.location.href="./FormularioNoticia.php";</script>';
            }
        }
    }
}

?>