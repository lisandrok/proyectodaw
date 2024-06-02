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

    public static function obtenerConvenioExistente($id){
        $consulta = Conexion::consulta("SELECT id, tipo, descripcion FROM convenios WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $convenio = new Convenio($fila['id'], $fila['tipo'], $fila['descripcion']);
        }

        return $convenio;
    }

    public static function obtenerConvenioPorTipo($tipo){
        //TODO: Permitir que haya mas de un convenio por tipo y devolver uno que sea random
        $consulta = Conexion::consulta("SELECT id, tipo, descripcion FROM convenios WHERE tipo='" . $tipo . "'");

        $convenio = null; //Declaro la variable para evitar warnings

        foreach ($consulta as $fila) {
            $convenio = new Convenio($fila['id'], $fila['tipo'], $fila['descripcion']);
        }

        return $convenio;
    }

    public function imprimir($usuario) {
        Conexion::consulta("INSERT INTO impresiones (usuario_id, convenio_id) VALUES (" . $usuario->getId() . ", " . $this->getId() . ")");
    }
}