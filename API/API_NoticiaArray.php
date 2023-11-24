<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
    Autoload::Autoload();


    if ($_SERVER['REQUEST_METHOD']=="GET"){
        $perfil=$_GET['perfil'];
        if ($perfil!= ''){
            $Noticias=RP_Noticia::MuestraTodoPorPerfil($perfil);
            if ($Noticias!=null){
                $Not = json_encode($Noticias);
                http_response_code(200);
                echo $Not;
            }else{
                http_response_code(400);
            }
        }else{
            http_response_code(500);
        }
    }else

    // if ($_SERVER['REQUEST_METHOD'] == "PUT"&&SESSION::estaLogueado('USER')) {
    //     $perfil = $_GET['pantalla'];
    //     if ($perfil!== ''){
    //         $cuerpo = file_get_contents("php://input");
    //         $Noticias=json_decode($cuerpo);

    //         for ($i=0;$i<count($Noticias);$i++){
    //             $perfill=RP_Perfil::FindByID2($perfil);
    //             $fechai=new DateTime($Noticias[$i]->fechainicio);
    //             $fechaf=new DateTime($Noticias[$i]->fechafin);
    //             $diff=$fechai->diff($fechaf);
    //             $dias=$diff->days;
    //             $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;

    //             $noticia = new Noticia(
    //                 $Noticias[$i]->id,
    //                 $Noticias[$i]->fechainicio,
    //                 $Noticias[$i]->fechafin,
    //                 $duracion,
    //                 $Noticias[$i]->prioridad,
    //                 $Noticias[$i]->titulo,
    //                 $perfill,
    //                 $Noticias[$i]->tipo,
    //                 $Noticias[$i]->contenido,
    //                 $Noticias[$i]->url,
    //                 $Noticias[$i]->formato
    //             );

    //             NOTICIA_REPOSITORY::UpdateById($noticia->getId(),$noticia);
    //             http_response_code(200);
    //         }
    //     }else{
    //         http_response_code(400);
    //     }
    // }else
    

    // if ($_SERVER['REQUEST_METHOD']=="DELETE"){
    //     $id=$_GET['id'];
    //     if ($id!=""){
    //         try{
    //             NOTICIA_REPOSITORY::DeleteById($id);
    //             http_response_code(200);
    //         }catch (PDOException $e){
    //             http_response_code(400);
    //             echo "El id no existe";
    //         }
    //     }else{
    //         http_response_code(500);
    //     }
    // }else

    // if ($_SERVER['REQUEST_METHOD']=="POST"&&SESSION::estaLogueado('USER')){
    //         $cuerpo = file_get_contents("php://input");
    //         $Noticia=json_decode($cuerpo);
    //         $perfil=$Noticia->perfil;
    //         $perfill=PERFIL_REPOSITORY::FindByID2($perfil);
    //         $fechai=new DateTime($Noticia->fechainicio);
    //         $fechaf=new DateTime($Noticia->fechafin);
    //         $diff=$fechai->diff($fechaf);
    //         $dias=$diff->days;
    //         $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;

    //         $noticia = new Noticia(
    //             null,
    //             $Noticia->fechainicio,
    //             $Noticia->fechafin,
    //             $duracion,
    //             $Noticia->prioridad,
    //             $Noticia->titulo,
    //             $perfill,
    //             $Noticia->tipo,
    //             $Noticia->contenido,
    //             $Noticia->url,
    //             $Noticia->formato
    //         );
    //         try{
    //             NOTICIA_REPOSITORY::Insert($noticia);
    //             http_response_code(200);
    //         }catch (Exception $e){
    //             $e."".$e->getMessage();
    //             http_response_code(500);
    //         }

    // }else{
    //     echo "No está logueado";
    // }



?>