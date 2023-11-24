<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();


if($_SERVER["REQUEST_METHOD"]=="GET"){


    $id=$_GET['ID_Noticia']; //Obtenemos el ID de la noticia por GET

    if($id!=""){ //SI el id no está vacío

        $noticia = RP_Noticia::BuscarPorID($id); //Busca la noticia por su ID

        if($noticia !== null){

            $objeto = $noticia->toJSON(); //Mete al objeto el json creado a partir del objeto que tu le pasas para crear dicho json. Solo se puede usar en el GET.

            http_response_code(200); //Codigo de que todo va correcto

            echo $objeto;


        }else{
            http_response_code(400);
        }
 
    }else{

        http_response_code(404); //Codigo de error
    }

}



//Para actualizar:

if ($_SERVER["REQUEST_METHOD"]=="PUT"){

    $cuerpo = file_get_contents("php://input");
    $id=$_GET["ID_Noticia"];

    $noticia = json_decode($cuerpo);

    $noticiaApi = new stdClass();

    $noticiaApi->id=$id;
    $noticiaApi->ID_Perfil=$noticia->ID_Perfil;
    $noticiaApi->fecha_ini=$noticia->fecha_ini;
    $noticiaApi->fecha_fin=$noticia->fecha_fin;
    $noticiaApi->titulo=$noticia->titulo;
    $noticiaApi->prioridad=$noticia->prioridad;
    $noticiaApi->duracion=$noticia->duracion;
    $noticiaApi->tipo=$noticia->tipo;
    $noticiaApi->contenido=$noticia->contenido;
    $noticiaApi->url=$noticia->url;
    $noticiaApi->formato=$noticia->formato;

    $noticiaApi = new Noticia(
        $noticiaApi->id,
        $noticiaApi->ID_Perfil,
        $noticiaApi->fecha_ini,
        $noticiaApi->fecha_fin,
        $noticiaApi->titulo,
        $noticiaApi->prioridad,
        $noticiaApi->duracion,
        $noticiaApi->tipo,
        $noticiaApi->contenido,
        $noticiaApi->url,
        $noticiaApi->formato
    );

    RP_Noticia::ActualizaPorID($id,$noticiaApi);

    echo"Se ha actualizado correctamente";

}

//Para borrar:

if($_SERVER["REQUEST_METHOD"]=="DELETE"){
    $id=$_GET["ID_Noticia"];

    if($id != ""){

        RP_Noticia::BorraPorID($id);

        http_response_code(200);

        echo "Noticia borrada con éxito";

    }else{
        http_response_code(404);

    }
}



//Para añadir:

if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    $cuerpo = file_get_contents("php://input");

    $noticia = json_decode($cuerpo);

    $noticiaApi = new stdClass();

    $noticiaApi->id=$id;
    $noticiaApi->ID_Perfil=$noticia->ID_Perfil;
    $noticiaApi->fecha_ini=$noticia->fecha_ini;
    $noticiaApi->fecha_fin=$noticia->fecha_fin;
    $noticiaApi->titulo=$noticia->titulo;
    $noticiaApi->prioridad=$noticia->prioridad;
    $noticiaApi->duracion=$noticia->duracion;
    $noticiaApi->tipo=$noticia->tipo;
    $noticiaApi->contenido=$noticia->contenido;
    $noticiaApi->url=$noticia->url;
    $noticiaApi->formato=$noticia->formato;

    $noticiaApi = new Noticia(
        null,
        $noticiaApi->ID_Perfil,
        $noticiaApi->fecha_ini,
        $noticiaApi->fecha_fin,
        $noticiaApi->titulo,
        $noticiaApi->prioridad,
        $noticiaApi->duracion,
        $noticiaApi->tipo,
        $noticiaApi->contenido,
        $noticiaApi->url,
        $noticiaApi->formato
    );

    RP_Noticia::InsertaObjetoNoticia($noticiaApi);

    echo"Se ha añadido correctamente";

}


?>