<?php

class Incidencia {
    private $id;
    private $tipo;
    private $titulo;
    private $descripcion;
    private $estado;
    private $fecha_y_hora;

    public function __construct ($id, $tipo, $titulo, $descripcion, $estado, $fecha_y_hora) {
        $this->id = $id;
        $this->$tipo = $tipo;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->fecha_y_hora = $fecha_y_hora;
    }

    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha_y_hora;
    }

    public static function obtenerIncidenciaExistente($id){
        $consulta = Conexion::consulta("SELECT id, tipo, titulo, descripcion, estado, fecha_y_hora FROM incidencias WHERE inmueble_id=" . $id);

        $incidencia = null;

        foreach ($consulta as $fila) {
            $incidencia = new Incidencia($fila['id'], $fila['tipo'], $fila['titulo'], $fila['descripcion'], $fila['estado'], $fila['fecha_y_hora']);
        }

        return $incidencia;

    }

    public static function obtenerTiposBaseDeDatos() {
        $consulta = Conexion::consulta("SHOW COLUMNS FROM incidencias LIKE 'tipo'");

        $tipos = [];
        foreach($consulta as $fila) {
            if (preg_match("/^enum\((.*)\)$/", $fila['Type'], $matches)) {
                $tipos = str_getcsv($matches[1], ',', "'");
            }
        }
        return $tipos;
    }
}