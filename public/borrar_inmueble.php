<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

$usuario = Usuario::obtenerUsuarioExistente($_SESSION['usuarioId']);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //Si recibo un inmuebleId lo borro
    //TODO: Validar que el usuario sea el dueño del inmueble a eliminar
    if(isset($_GET['inmuebleId'])) {
        $inmuebleId = $_GET['inmuebleId'];
        $inmueble = Inmueble::obtenerInmuebleExistente($inmuebleId);
        $inmueble->eliminarInmueble();
    }
    header('Location: tablero.php'); //redirecciona al tablero de control
    exit();

}