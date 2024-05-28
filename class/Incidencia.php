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

    public static function obtenerIncidenciaExistente($id){
        $consulta = Conexion::consulta("SELECT id, tipo, titulo, descripcion, estado, fecha_y_hora FROM incidencias WHERE inmueble_id=" . $id);

        foreach ($consulta as $fila) {
            $incidencia = new Incidencia($fila['id'], $fila['tipo'], $fila['titulo'], $fila['descripcion'], $fila['estado'], $fila['fecha_y_hora']);
        }

        return $incidencia;

    }


}