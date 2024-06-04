<?php

class Publicidad  {
    //TODO: Intentar implementar jsonSerialize para poder mantener privados todos los atributos
    public $id; //Atributo publico para poder usarlo en javascript
    private $tipo;
    public $contenido; //Atributo publico para poder usarlo en javascript
    public $link; //Atributo publico para poder usarlo en javascript
    private $costePorImpresion;
    private $costePorClick;

    public function __construct ($id, $tipo, $contenido, $link, $costePorImpresion, $costePorClick) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->contenido = $contenido;
        $this->link = $link;
        $this->costePorImpresion = $costePorImpresion;
        $this->costePorClick = $costePorClick;
    }

    public function getId () {
        return $this->id;
    }

    public function getTipo () {
        return $this->tipo;
    }

    public function getContenido () {
        return $this->contenido;
    }

    public function getLink () {
        return $this->link;
    }

    public function getCostePorImpresion () {
        return $this->costePorImpresion;
    }

    public function getCostePorClick () {
        return $this->costePorClick;
    }

    public static function obtenerPublicidadExistente($id){
        $consulta = Conexion::consulta("SELECT id, tipo, contenido, link, coste_por_impresion, coste_por_click FROM publicidades WHERE id=" . $id);

        $publicidad = null; //Declaro la variable para evitar warnings

        foreach ($consulta as $fila) {
            $publicidad = new Publicidad($fila['id'], $fila['tipo'], $fila['contenido'], $fila['link'], $fila['coste_por_impresion'], $fila['coste_por_click']);
        }

        return $publicidad;
    }

    public static function obtenerPublicidadPorTipo($tipo){
        //TODO: Permitir que haya mas de una publicidad por tipo y devolver uno que sea random o que pague mas alto
        $consulta = Conexion::consulta("SELECT id, tipo, contenido, link, coste_por_impresion, coste_por_click FROM publicidades WHERE tipo='" . $tipo . "'");

        $publicidad = null; //Declaro la variable para evitar warnings

        foreach ($consulta as $fila) {
            $publicidad = new Publicidad($fila['id'], $fila['tipo'], $fila['contenido'], $fila['link'], $fila['coste_por_impresion'], $fila['coste_por_click']);
        }

        return $publicidad;
    }

    public static function obtenerPublicidadAlAzar() {
        $consulta = Conexion::consulta("SELECT id, tipo, contenido, link, coste_por_impresion, coste_por_click FROM publicidades");

        //Selecciono una publicidad al azar
        $elegirFilaAleatoria = array_rand($consulta);
        $filaAleatoria = $consulta[$elegirFilaAleatoria];

        $publicidad = null; //Declaro la variable para evitar warnings

        $publicidad = new Publicidad($filaAleatoria['id'], $filaAleatoria['tipo'], $filaAleatoria['contenido'], $filaAleatoria['link'], $filaAleatoria['coste_por_impresion'], $filaAleatoria['coste_por_click']);

        return $publicidad;
    }

    public function registrarImpresion($usuario) {
        //Inserto registro de impresion sin indicar horario ya que el default de la tabla es current_timestamp
        Conexion::consulta("INSERT INTO impresiones (usuario_id, publicidad_id, coste_por_impresion) VALUES (" . $usuario->getId() . ", " . $this->getId() . ", '" . $this->getCostePorImpresion() . "')");
    }

    public function registrarClick($usuario) {
        //Inserto registro de click sin indicar horario ya que el default de la tabla es current_timestamp
        Conexion::consulta("INSERT INTO clicks (usuario_id, publicidad_id, coste_por_click) VALUES (" . $usuario->getId() . ", " . $this->getId() . ", '" . $this->getCostePorClick() . "')");
    }

    public static function obtenerGananciasPorImpresiones($dias) {
        $ganancia = 0;
        $consulta = Conexion::consulta("SELECT SUM(coste_por_impresion) AS ganancia FROM `impresiones` WHERE fecha_y_hora > DATE_SUB(CURDATE(), INTERVAL " . $dias . " DAY)");

        foreach ($consulta as $fila) {
            $ganancia = $fila['ganancia'];
        }

        return round($ganancia, 2);
    }

    public static function obtenerGananciasPorClicks($dias) {
        $ganancia = 0;
        $consulta = Conexion::consulta("SELECT SUM(coste_por_click) AS ganancia FROM `clicks` WHERE fecha_y_hora > DATE_SUB(CURDATE(), INTERVAL " . $dias . " DAY)");

        foreach ($consulta as $fila) {
            $ganancia = $fila['ganancia'];
        }

        return round($ganancia, 2);
    }
}