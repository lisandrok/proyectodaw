<?php

class Inmueble {

    private $id;
    private $direccion;
    private $propietario;
    private $inquilino;

    public function __construct($id, $direccion, $propietario, $inquilino) {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->propietario = $propietario;
        $this->inquilino = $inquilino;
    }

}