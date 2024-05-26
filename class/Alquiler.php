<?php

class Alquiler {
    private $id;
    private $ano;
    private $propietario; //Aqui va un Usuario
    private $inquilino; //Aqui va un Usuario
    private $pagado;
    private $fecha_de_pago;
    private $confirmado;

    public function __construct($id, $ano, $propietario, $inquilino, $pagado, $fecha_de_pago, $confirmado) {
        $this->id = $id;
        $this->ano = $ano;
        $this->propietario = $propietario;
        $this->inquilino = $inquilino;
        $this->pagado = $pagado;
        $this->fecha_de_pago = $fecha_de_pago;
        $this->confirmado = $confirmado;

    }
}