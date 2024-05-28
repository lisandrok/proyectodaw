<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $inmuebles = array(); //Aqui se guardan los inmuebles del usuario

    public function __construct($id, $nombre, $apellido, $email, $telefono, $inmuebles) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->inmuebles = $inmuebles;
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

    public function getInmuebles() {
        return $this->inmuebles;
    }

    public function agregarInmueble($inmueble) {
        $this->inmuebles[] = $inmueble;
    }

    public static function validarUsuario($email, $contrasena) {
        $consulta = Conexion::consulta("SELECT id, contrasena FROM usuarios WHERE email='" . $email . "'");

        foreach ($consulta as $fila) {
            if ($fila["contrasena"] == $contrasena) {
                return $fila["id"];
            }
        } 
        return false;
    }

    public static function obtenerUsuarioExistente($id) {
        //Primero obtengo los inmuebles del usuario ya que debo utilizarlos para crear el usuario
        $consulta = Conexion::consulta("SELECT id, direccion, inquilino_usuario_id FROM inmuebles WHERE propietario_usuario_id=" . $id);

        foreach ($consulta as $fila) {
            $inmueble = Inmueble::obtenerInmuebleExistente($fila["id"]);
            $inmuebles[] = $inmueble;
        }

        //Obtengo los datos del usuario desde la db
        $consulta = Conexion::consulta("SELECT id, nombre, apellido, email, telefono FROM usuarios WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $usuario = new Usuario($fila['id'], $fila['nombre'], $fila['apellido'], $fila['email'], $fila['telefono'], $inmuebles);
        }
        return $usuario;
    }
}