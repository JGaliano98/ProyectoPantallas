<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

class session{

    public static function iniciarSesion(){

        session_start();
    }

    public static function cerrarSesion(){

        session_destroy();
    }

    public static function guardarSesion($clave, $objeto){

        $_SESSION[$clave] = $objeto;
    }

    public static function leerSesion($clave){

        return $_SESSION[$clave];
    }

    public static function existeSesion($clave){

        return isset($_SESSION[$clave]);
    }

    public static function login($user){
        session::iniciarSesion();
        session::guardarSesion('perfil', $user);
    }

    public static function estaLogueado($clave){

        return session::existeSesion($clave);

    }
    public static function logOut(){

        session::cerrarSesion();
        
    }

}



?>