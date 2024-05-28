<?php

class Convenio {

    private $id;
    private $tipo;
    private $descripcion;

    public function __construct ($id, $tipo, $descripcion) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
    }

    public function getId () {
        return $this->id;
    }

    public function getTipo () {
        return $this->tipo;
    }

    public function getDescripcion () {
        return $this->descripcion;
    }
}