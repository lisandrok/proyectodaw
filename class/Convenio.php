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

}