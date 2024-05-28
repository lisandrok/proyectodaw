<?php
session_start();

spl_autoload_register(function ($class) {
    require "class/" . $class . ".php";
});

require 'header.php';

//TODO: Esta pagina solo debe poder accederse si el usuario esta logueado

echo"<div>TABLERO DE CONTROL</div>";

require 'footer.php'
?>
