<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

class Perfil implements \JsonSerializable {

    private $ID_Perfil;
    private $nombre;

    // Constructor
    public function __construct($ID_Perfil, $nombre) {
        $this->ID_Perfil = $ID_Perfil;
        $this->nombre = $nombre;
    }

    // Getter para ID_Perfil
    public function getID_Perfil() {
        return $this->ID_Perfil;
    }

    // Setter para ID_Perfil
    public function setID_Perfil($ID_Perfil) {
        $this->ID_Perfil = $ID_Perfil;
    }

    // Getter para nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function toJSON(){
        return json_encode(get_object_vars($this));
    }

    public function jsonSerialize(){
        $var=get_object_vars($this);
        return $var;
    }



}

?>