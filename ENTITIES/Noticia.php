<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoPantallas/HELPERS/Autoload.php';
Autoload::Autoload();

class Noticia implements \JsonSerializable {

    
    private $ID_Noticia;
    private $ID_Perfil;
    private $fecha_ini;
    private $fecha_fin;
    private $titulo;
    private $prioridad;
    private $duracion;
    private $tipo;
    private $contenido;
    private $url;
    private $formato;

    // Constructor
    public function __construct($ID_Noticia, $ID_Perfil, $fecha_ini, $fecha_fin, $titulo, $prioridad, $duracion, $tipo, $contenido, $url, $formato) {
        $this->ID_Noticia = $ID_Noticia;
        $this->ID_Perfil = $ID_Perfil;
        $this->fecha_ini = $fecha_ini;
        $this->fecha_fin = $fecha_fin;
        $this->titulo = $titulo;
        $this->prioridad = $prioridad;
        $this->duracion = $duracion;
        $this->tipo = $tipo;
        $this->contenido = $contenido;
        $this->url = $url;
        $this->formato = $formato;
    }

    // Getters
    public function getID_Noticia() {
        return $this->ID_Noticia;
    }

    public function getID_Perfil() {
        return $this->ID_Perfil;
    }

    public function getFechaIni() {
        return $this->fecha_ini;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getFormato() {
        return $this->formato;
    }

    // Setters
    public function setID_Noticia($ID_Noticia) {
        $this->ID_Noticia = $ID_Noticia;
    }

    public function setID_Perfil($ID_Perfil) {
        $this->ID_Perfil = $ID_Perfil;
    }

    public function setFechaIni($fecha_ini) {
        $this->fecha_ini = $fecha_ini;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setFormato($formato) {
        $this->formato = $formato;
    }

    // Método ToString
    public function toString() {
        return "Noticia [ID_Noticia=" . $this->ID_Noticia . ", ID_Perfil=" . $this->ID_Perfil . ", fecha_ini=" . $this->fecha_ini . ", fecha_fin=" . $this->fecha_fin . ", titulo=" . $this->titulo . ", prioridad=" . $this->prioridad . ", duracion=" . $this->duracion . ", tipo=" . $this->tipo . ", contenido=" . $this->contenido . ", url=" . $this->url . ", formato=" . $this->formato . "]";
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