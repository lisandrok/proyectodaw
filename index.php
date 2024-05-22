<?php
// Include config file
require_once 'configuracion.php';
require 'header.php';

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexion OK";
} catch(PDOException $e) {
    echo "Fallo en conexion: " . $e->getMessage();
}

echo 'test';

require 'footer.php'
?>
