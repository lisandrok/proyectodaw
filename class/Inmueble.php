<?php

class Inmueble {

    private $id;
    private $direccion;
    private $inquilino;
    private $incidencias;

    public function __construct($direccion, $inquilino, $incidencias, $id=null, $usuario=null) {
        //Simulo una sobrecarga del constructor
        if ($id != null) {
            $this->id = $id;
            $this->direccion = $direccion;
            $this->inquilino = $inquilino;
            $this->incidencias = $incidencias;
        } else if ($id === null) { //TODO: controlar si el inmueble pudo crearse
            Conexion::consulta("INSERT INTO inmuebles (direccion, propietario_usuario_id) VALUES ('".$direccion."', ".$usuario->getId().")");
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getInquilino() {
        return $this->inquilino;
    }

    public function getIncidencias() {
        return $this->incidencias?? []; //Si incidencias es null, devuelvo un array vacio
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setInquilino($inquilino) {
        $this->inquilino = $inquilino;
    }

    public function agregarIncidencia($tipo, $titulo, $descripcion, $usuario) {
        //Inserto la incidencia en la base de datos, omito el id ya que es un autoincrement y el estado y la fecha_y_hora que tienen defaults
        Conexion::consulta("INSERT INTO incidencias (tipo, titulo, descripcion, usuario_id, inmueble_id) VALUES ('" . $tipo . "', '" . $titulo . "', '" . $descripcion . "', " . $usuario->getId() . ", " . $this->getId() . ")");
    }

    public function actualizarInmuebleEnBaseDatos() {
        $inquilinoUsuarioId = (!is_null($this->getInquilino()))? $this->getInquilino()->getId() : 0;
        Conexion::consulta("UPDATE inmuebles SET direccion = '". $this->getDireccion() ."', inquilino_usuario_id = ". $inquilinoUsuarioId ." WHERE id=" . $this->getId());
    }

    public function eliminarInmueble() {
        Conexion::consulta("DELETE FROM inmuebles WHERE id=" . $this->getId());
    }

    public static function obtenerInmuebleExistente($id) {
        //Primero obtengo las posibles incidencias del inmueble ya que las voy a necesitar para instanciarlo
        $consulta = Conexion::consulta("SELECT id, tipo, titulo, descripcion, estado, usuario_id, fecha_y_hora FROM incidencias WHERE inmueble_id=" . $id);
        $incidencias = []; //Declaro la variable para evitar los warnings
        foreach($consulta as $fila) {
            $incidencia = Incidencia::obtenerIncidenciaExistente($fila["id"]);
            $incidencias[] = $incidencia;
        }

        //Obtengo los datos del inmueble desde la db
        $consulta = Conexion::consulta("SELECT id, direccion, inquilino_usuario_id FROM inmuebles WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $inmueble = new Inmueble($fila['direccion'], Usuario::obtenerUsuarioExistente($fila['inquilino_usuario_id']), $incidencias, $fila['id']);
        }
        return $inmueble;
    }
}