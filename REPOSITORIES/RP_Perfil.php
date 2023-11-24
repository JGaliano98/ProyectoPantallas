<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

class RP_Perfil{

    public static function MostrarTodo(){
        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Perfil");

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

           
            $ID_Perfil=$tuplas->ID_Perfil;
            $nombre=$tuplas->nombre;
            

            $perfil=new Perfil($ID_Perfil,$nombre);

            //$array[]=$perfil;
        }
        //return $array;
        return $perfil;
    }



    public static function BuscarPorID($id){
        $conexion = Conexion::AbreConexion();

        $resultado = $conexion -> query("Select * from Perfil where ID_Perfil=$id");

        $perfil=null;

        while($tuplas=$resultado->fetch(PDO::FETCH_OBJ)){

            $ID_Perfil=$tuplas->ID_Perfil;
            $nombre=$tuplas->nombre;
            

            $perfil=new Perfil($ID_Perfil,$nombre);

            //$array[]=$noticia;
        }
        //return $array;
        return $perfil;
    }



    public static function BorraPorID($id){

        //Abrimos la conexion

        $conexion = Conexion::AbreConexion();

        $resultado = $conexion->exec("Delete from Perfil where ID_Perfil=$id");

    }




    public static function ActualizaPorID($id,$objeto){

        $conexion = Conexion::AbreConexion();

        $resultado = $conexion->exec("UPDATE Noticia SET  ID_Perfil='{$objeto->getID_Perfil()}', nombre='{$objeto->getNombre()}'");
    }


    public static function InsertaObjetoNoticia($objeto) {

        $conexion = Conexion::AbreConexion();
    
        $ID_Perfil = $objeto->getID_Perfil();
        $nombre = $objeto->getNombre();
        
    
    
        $resultado = $conexion->exec("INSERT INTO Noticia (ID_Perfil, nombre) VALUES ('$ID_Perfil', '$nombre')");
    }

}
?>