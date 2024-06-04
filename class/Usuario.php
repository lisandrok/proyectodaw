<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $contrasenaHash;
    private $telefono;
    private $vencimientoSubscripcion;
    private $esAdministrador;
    private $inmuebles = array(); //Aqui se guardan los inmuebles del usuario

    public function __construct($nombre, $apellido, $email, $contrasenaHash, $telefono, $vencimientoSubscripcion=null, $esAdministrador=0, $inmuebles=null, $id=null) { //Simulo un constructor con sobrecarga
        if ($id != null) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
            $this->contrasenaHash = $contrasenaHash;
            $this->telefono = $telefono;
            $this->esAdministrador = $esAdministrador;
            $this->vencimientoSubscripcion = new DateTime($vencimientoSubscripcion);
            $this->inmuebles = $inmuebles;
        } else if ($id === null) { //TODO: Controlar si el usuario pudo crearse
            Conexion::consulta("INSERT INTO usuarios (nombre, apellido, email, contrasena_hash, telefono, vencimiento_subscripcion, es_administrador) VALUES ('".$nombre."', '".$apellido."', '".$email."', '".$contrasenaHash."', '".$telefono."', DATE_ADD(CURDATE(), INTERVAL 10 DAY), 0)");
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getVencimientoSubscripcion() {
        return $this->vencimientoSubscripcion;
    }

    public function getEsAdministrador() {
        return $this->esAdministrador;
    }

    public function getInmuebles() {
        return $this->inmuebles;
    }

    public function agregarInmueble($inmueble) {
        $this->inmuebles[] = $inmueble;
    }

    public static function validarUsuario($email, $contrasena) {
        $consulta = Conexion::consulta("SELECT id, contrasena_hash FROM usuarios WHERE email='" . $email . "'");

        foreach ($consulta as $fila) {
            if (password_verify($contrasena, $fila['contrasena_hash'])) {
                return $fila["id"];
            }
        } 
        return false;
    }

    public static function obtenerUsuarioExistente($id) {
        //Primero obtengo los inmuebles del usuario ya que debo utilizarlos para crear el usuario
        $consulta = Conexion::consulta("SELECT id, direccion, inquilino_usuario_id FROM inmuebles WHERE propietario_usuario_id=" . $id);
        $inmuebles = [];
        foreach ($consulta as $fila) {
            $inmueble = Inmueble::obtenerInmuebleExistente($fila["id"]);
            $inmuebles[] = $inmueble;
        }

        //Obtengo los datos del usuario desde la db
        $consulta = Conexion::consulta("SELECT id, nombre, apellido, email, contrasena_hash, telefono, vencimiento_subscripcion, es_administrador FROM usuarios WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $usuario = new Usuario($fila['nombre'], $fila['apellido'], $fila['email'], $fila['contrasena_hash'], $fila['telefono'], $fila['vencimiento_subscripcion'], $fila['es_administrador'], $inmuebles, $fila['id']);
        }
        return $usuario;
    }
}