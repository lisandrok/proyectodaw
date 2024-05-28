<?php
session_start();

spl_autoload_register(function ($class) {
    require "class/" . $class . ".php";
});

require 'header.php';

//TODO: Quitar esta prueba para verificar si se puede instanciar un usuario
$usuario = Usuario::obtenerUsuarioExistente(1);
echo"<pre>";
var_dump($usuario);
echo"</pre>";

require 'footer.php'
?>
