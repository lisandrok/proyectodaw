<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

$tipoConvenio = $_POST['tipo_convenio'];
$convenio = Convenio::obtenerConvenioPorTipo($tipoConvenio);

if ($convenio != null) {
    echo $convenio->getDescripcion(); //Devuelvo el contenido del convenio
    $convenio->imprimir(Usuario::obtenerUsuarioExistente($_SESSION['usuarioId'])); //Registro la impresion del convenio
}