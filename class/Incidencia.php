<?php

class Incidencia {
    private $id;
    private $tipo;
    private $titulo;
    private $descripcion;
    private $estado;
    private $usuario; //Aqui debe guardarse un objeto usuario
    private $inmueble; //Aqui debe guardarse un inmueble
    private $fecha_y_hora;

    public function __construct ($id, $tipo, $titulo, $descripcion, $estado, $usuario, $inmueble, $fecha_y_hora) {
        $this->id = $id;
        $this->$tipo = $tipo;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->usuario = $usuario;
        $this->inmueble = $inmueble;
        $this->fecha_y_hora = $fecha_y_hora;
    }


}