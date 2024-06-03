<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $publicidadId = $_GET['publicidadId'];
}

$publicidad = Publicidad::obtenerPublicidadExistente($publicidadId);
$usuario = Usuario::obtenerUsuarioExistente($_SESSION['usuarioId']);

$publicidad->registrarClick($usuario); //Registro el click de la publicidad

header('Location: ' . $publicidad->getLink());
exit();