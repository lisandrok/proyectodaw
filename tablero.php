<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "class/" . $class . ".php";
});

require 'header.php';

$usuario = unserialize($_SESSION['usuario']);
//TODO: Mostrar los datos de las propiedades del usuario logueado de manera correcta

echo "<div>TABLERO DE CONTROL de " . $usuario->getEmail() . "</div>";

foreach ($usuario->getInmuebles() as $inmueble) {
    echo "<pre>" . var_dump($inmueble) . "</pre>";
}

require 'footer.php'
?>
