<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

//PARA MOSTRAR:

if($_SERVER["REQUEST_METHOD"]=="GET"){

    $id=$_GET['ID_Noticia']; //Obtenemos el ID de la noticia
    $noticia = RP_Noticia::BuscarPorID($id); //Busca la noticia por su ID
    $noticiaApi = new stdClass();
    $noticiaApi -> id=$id;
    $noticiaApi -> fecha_ini=$fecha_ini->getFechaIni();
    $noticiaApi -> fecha_fin=$fecha_fin->getFechaFin();
    $noticiaApi -> titulo=$titulo->getTitulo();
    $noticiaApi -> contenido=$contenido->getContenido();
    $noticiaApi -> prioridad=$prioridad->getPrioridad();
    $noticiaApi -> duracion=$duracion->getDuracion();

    echo json_encode($noticiaApi); 

}

//Para actualizar:

if ($_SERVER["REQUEST_METHOD"]=="PUT"){

    $cuerpo = file_get_contents("php://input");
    $id=$_GET["ID_Noticia"];

    $noticia = json_decode($cuerpo);

    $noticiaApi = new stdClass();

    $noticiaApi->id=$id;
    $noticiaApi->fecha_ini=$noticia->fecha_ini;
    $noticiaApi->fecha_fin=$noticia->fecha_fin;
    $noticiaApi->titulo=$noticia->titulo;
    $noticiaApi->contenido=$noticia->contenido;
    $noticiaApi->prioridad=$noticia->prioridad;
    $noticiaApi->duracion=$noticia->duracion;

    RP_Noticia::ActualizaPorID($id,$noticiaApi);

}

//Para borrar:

if($_SERVER["REQUEST_METHOD"]=="DELETE"){
    $id=$_GET["ID_Usuario"];
    RP_Noticia::BorraPorID($id);

    echo "Noticia borrada con éxito";
}



//Para añadir:

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $objeto=file_get_contents("php://input");
    $noticia=json_decode($objeto);

    $noticiaApi = new stdClass();

    $noticiaApi->id=$id;
    $noticiaApi->fecha_ini=$noticia->fecha_ini;
    $noticiaApi->fecha_fin=$noticia->fecha_fin;
    $noticiaApi->titulo=$noticia->titulo;
    $noticiaApi->contenido=$noticia->contenido;
    $noticiaApi->prioridad=$noticia->prioridad;
    $noticiaApi->duracion=$noticia->duracion;

    RP_Noticia::InsertaObjetoNoticia($noticiaApi);

}


?>