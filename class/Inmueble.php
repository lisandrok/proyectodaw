<?php

class Inmueble {

    private $id;
    private $direccion;
    private $inquilino;

    public function __construct($id, $direccion, $inquilino) {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->inquilino = $inquilino;
    }

    public static function obtenerInmuebleExistente($id) {
        $consulta = Conexion::consulta("SELECT id, direccion, propietario_usuario_id, inquilino_usuario_id FROM inmuebles WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $inmueble = new Inmueble($fila['id'], $fila['direccion'], Usuario::obtenerUsuarioExistente($fila['inquilino_usuario_id']));
        }

        return $inmueble;

    }
}