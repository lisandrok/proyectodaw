<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

$tipo = $_POST['tipo'];
$publicidad = Publicidad::obtenerPublicidadPorTipo($tipo);

if ($publicidad != null) {
    echo json_encode($publicidad); //Devuelvo la publicidad en formato json para que pueda usarse por javascript
    $publicidad->registrarImpresion(Usuario::obtenerUsuarioExistente($_SESSION['usuarioId'])); //Registro la impresion de la publicidad
} else {
    http_response_code(404); //Devuelvo un 404 si no obtuvimos ninguna publicidad
}
