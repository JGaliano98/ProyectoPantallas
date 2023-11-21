<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

class RP_Noticia{

    public static function MostrarTodo(){
        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Noticia");

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_usuario;
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



    public static function BuscarPorID($id){
        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Noticia where ID_Noticia=$id");

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Noticia=$tuplas->ID_usuario;
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

        $resultado = $conexion->exec("UPDATE Noticia SET ID_Noticia='{$objeto->ID_Nombre}', ID_Perfil='{$objeto->ID_Perfil}', fecha_ini='{$objeto->fecha_ini}', fecha_fin='{$objeto->fecha_fin}', titulo='{$objeto->titulo}', prioridad='{$objeto->prioridad}', duracion='{$objeto->duracion}', tipo='{$objeto->tipo}', contenido='{$objeto->contenido}', url='{$objeto->url}', formato='{$objeto->formato}'");
    }


    public static function InsertaObjetoNoticia($objeto) {

        $conexion = Conexion::AbreConexion();
    
        $ID_Noticia = 0; //Ya que es autoincremental.
        $ID_Perfil = $objeto->ID_Perfil;
        $fecha_ini = $objeto->fecha_ini;
        $fecha_fin = $objeto->fecha_fin;
        $titulo = $objeto->titulo;
        $prioridad = $objeto->prioridad;
        $duracion = $objeto->duracion;
        $tipo = $objeto->tipo;
        $contenido = $objeto->contenido;
        $url = $objeto->url;
        $formato = $objeto->formato;
    
        $resultado = $conexion->exec("INSERT INTO Noticia (ID_Noticia, ID_Perfil, fecha_ini, fecha_fin, titulo, prioridad, duracion, tipo,  contenido, url, formato) VALUES ('$ID_Noticia', '$ID_Perfil', '$fecha_ini', '$fecha_fin', '$titulo', '$prioridad', '$duracion',  '$tipo',  '$contenido',  '$url', '$formato')");
    }



}
?>