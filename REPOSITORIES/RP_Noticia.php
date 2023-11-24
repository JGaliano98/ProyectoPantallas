<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

class RP_Noticia{

    public static function MostrarTodo(){
        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Noticia");

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_Noticia;
            $ID_Perfil=$tuplas->ID_Perfil;
            $fecha_ini=$tuplas->fecha_ini;
            $fecha_fin=$tuplas->fecha_fin;
            $titulo=$tuplas->titulo;
            $prioridad=$tuplas->prioridad;
            $duracion=$tuplas->duracion;
            $tipo=$tuplas->tipo;
            $contenido=$tuplas->contenido;
            $url=$tuplas->url;
            $formato=$tuplas->formato;

            $noticia=new Noticia($ID_Noticia,$ID_Perfil,$fecha_ini,$fecha_fin,$titulo,$prioridad,$duracion,$tipo,$contenido,$url,$formato);

            //$array[]=$noticia;
        }
        //return $array;
        return $noticia;
    }

    public static function MostrarTodoArray(){

        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Noticia");

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_Noticia;
            $ID_Perfil=$tuplas->ID_Perfil;
            $fecha_ini=$tuplas->fecha_ini;
            $fecha_fin=$tuplas->fecha_fin;
            $titulo=$tuplas->titulo;
            $prioridad=$tuplas->prioridad;
            $duracion=$tuplas->duracion;
            $tipo=$tuplas->tipo;
            $contenido=$tuplas->contenido;
            $url=$tuplas->url;
            $formato=$tuplas->formato;

            $noticia=new Noticia($ID_Noticia,$ID_Perfil,$fecha_ini,$fecha_fin,$titulo,$prioridad,$duracion,$tipo,$contenido,$url,$formato);

            $array[]=$noticia;
        }
        return $array;
        
    }



    public static function BuscarPorID($id){
        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Noticia where ID_Noticia=$id");

        $noticia=null;

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_Noticia;
            $ID_Perfil=$tuplas->ID_Perfil;
            $fecha_ini=$tuplas->fecha_ini;
            $fecha_fin=$tuplas->fecha_fin;
            $titulo=$tuplas->titulo;
            $prioridad=$tuplas->prioridad;
            $duracion=$tuplas->duracion;
            $tipo=$tuplas->tipo;
            $contenido=$tuplas->contenido;
            $url=$tuplas->url;
            $formato=$tuplas->formato;

            $noticia=new Noticia($ID_Noticia,$ID_Perfil,$fecha_ini,$fecha_fin,$titulo,$prioridad,$duracion,$tipo,$contenido,$url,$formato);

            //$array[]=$noticia;
        }
        //return $array;
        return $noticia;
    }



    public static function BorraPorID($id){

        //Abrimos la conexion

        $conexion = Conexion::AbreConexion();

        $resultado = $conexion->exec("Delete from Noticia where ID_Noticia=$id");

    }




    public static function ActualizaPorID($id,$objeto){

        $conexion = Conexion::AbreConexion();

        $resultado = $conexion->exec("UPDATE Noticia SET ID_Noticia='{$objeto->getID_Noticia()}', ID_Perfil='{$objeto->getID_Perfil()}', fecha_ini='{$objeto->getfechaIni()}', fecha_fin='{$objeto->getFechaFin()}', titulo='{$objeto->getTitulo()}', prioridad='{$objeto->getPrioridad()}', duracion='{$objeto->getDuracion()}', tipo='{$objeto->getTipo()}', contenido='{$objeto->getContenido()}', url='{$objeto->getUrl()}', formato='{$objeto->getFormato()}' where ID_Noticia=$id");
    }


    public static function InsertaObjetoNoticia($objeto) {

        $conexion = Conexion::AbreConexion();
    
        $ID_Noticia = 0; //Ya que es autoincremental.
        $ID_Perfil = $objeto->getID_Perfil();
        $fecha_ini = $objeto->getFechaIni();
        $fecha_fin = $objeto->getFechaFin();
        $titulo = $objeto->getTitulo();
        $prioridad = $objeto->getPrioridad();
        $duracion = $objeto->getDuracion();
        $tipo = $objeto->getTipo();
        $contenido = $objeto->getContenido();
        $url = $objeto->getUrl();
        $formato = $objeto->getFormato();
    
    
        $resultado = $conexion->exec("INSERT INTO Noticia (ID_Noticia, ID_Perfil, fecha_ini, fecha_fin, titulo, prioridad, duracion, tipo,  contenido, url, formato) VALUES ('$ID_Noticia', '$ID_Perfil', '$fecha_ini', '$fecha_fin', '$titulo', '$prioridad', '$duracion',  '$tipo',  '$contenido',  '$url', '$formato')");
    }

    public static function MuestraTodoPorPerfil($perfil){
        $conexion = Conexion::AbreConexion();

        $resultado=$conexion->prepare("SELECT N.* from Noticia N inner join Perfil p on p.ID_Perfil=N.ID_Perfil where p.nombre=:nombre or p.nombre='TODOS'");
        $resultado->bindParam(":nombre",$perfil,PDO::PARAM_STR);

        $resultado->execute();

        $noticia=null;

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_Noticia;
            $ID_Perfil=$tuplas->ID_Perfil;
            $fecha_ini=$tuplas->fecha_ini;
            $fecha_fin=$tuplas->fecha_fin;
            $titulo=$tuplas->titulo;
            $prioridad=$tuplas->prioridad;
            $duracion=$tuplas->duracion;
            $tipo=$tuplas->tipo;
            $contenido=$tuplas->contenido;
            $url=$tuplas->url;
            $formato=$tuplas->formato;

            $noticia=new Noticia($ID_Noticia,$ID_Perfil,$fecha_ini,$fecha_fin,$titulo,$prioridad,$duracion,$tipo,$contenido,$url,$formato);

        $array[]=$noticia;
        }
        return $array;


    }

    public static function BuscaIDyPrioridad(){

        $conexion = Conexion::AbreConexion();

        $resultado=$conexion->prepare("Select ID_Noticia , Prioridad from Noticia");

        $resultado ->execute();

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_Noticia;
            $prioridad=$tuplas->prioridad;
      

            $array[]=[$ID_Noticia, $prioridad];
        }
        return $array;

    }




}
?>