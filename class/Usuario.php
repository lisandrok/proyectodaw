<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $inmuebles = array(); //Aqui se guardan los inmuebles del usuario

    public function __construct($id) {

        //Obtengo los datos del usuario desde la db
        $consulta = Conexion::consulta("SELECT id, nombre, apellido, email, telefono FROM usuarios WHERE id=" . $id);

        foreach ($consulta as $fila) {
            $this->id = $fila['id'];
            $this->nombre = $fila['nombre'];
            $this->apellido = $fila['apellido'];
            $this->email = $fila['email'];
            $this->telefono = $fila['telefono'];
        }

        //Obtengo los inmuebles del usuario
        $consulta = Conexion::consulta("SELECT id, direccion, inquilino_usuario_id FROM inmuebles WHERE propietario_usuario_id=" . $id);

        //TODO: el array inmuebles debe ser llenado con inmuebles en vez de direcciones
        foreach ($consulta as $fila) {
            $this->inmuebles[] = $fila['direccion'];
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

    public function getInmuebles() {
        return $this->inmuebles;
    }

    public function agregarInmueble($inmueble) {
        $this->inmuebles[] = $inmueble;
    }

}
