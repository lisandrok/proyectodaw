<?php

class Inmueble {

    private $id;
    private $direccion;
    private $inquilino;
    private $incidencias;

    public function __construct($id, $direccion, $inquilino, $incidencias) {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->inquilino = $inquilino;
        $this->incidencias = $incidencias;
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

    public function agregarIncidencia($incidencia, $usuario) {
        //Primero inserto la incidencia en la base de datos, omito el id ya que es un autoincrement y la fecha_y_hora que se autocompleta con el horario actual
        Conexion::consulta("INSERT INTO incidencias (tipo, titulo, descripcion, estado, usuario_id, inmueble_id) VALUES (" . $incidencia->getTipo() . ", " . $incidencia->getTitulo() . ", " . $incidencia->getDescripcion() . ", " . $incidencia->getEstado() . ", " . $usuario->getId() . ", " . $this->getId() . ")");
        //Segundo inserto la incidencia en el array de incidencias
        $incidencias[] = $incidencia;
    }

    public static function obtenerInmuebleExistente($id) {
        //Primero obtengo las posibles incidencias del inmueble ya que las voy a necesitar para instanciarlo
        $consulta = Conexion::consulta("SELECT id, tipo, titulo, descripcion, estado, usuario_id, fecha_y_hora FROM incidencias WHERE inmueble_id=" . $id);

        foreach($consulta as $fila) {
            $incidencia = Incidencia::obtenerIncidenciaExistente($fila["id"]);
            $incidencias[] = $incidencia;
        }

        //Obtengo los datos del inmueble desde la db
        $consulta = Conexion::consulta("SELECT id, direccion, inquilino_usuario_id FROM inmuebles WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $inmueble = new Inmueble($fila['id'], $fila['direccion'], Usuario::obtenerUsuarioExistente($fila['inquilino_usuario_id']), $incidencias);
        }

        return $inmueble;

    }
}