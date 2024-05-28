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

echo "<div>TABLERO DE CONTROL de " . $_SESSION['email'] . "</div>";

require 'footer.php'
?>
