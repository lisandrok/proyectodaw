<?php
session_start();

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

//TODO: usar una contrasena encriptada

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    
    if (Usuario::validarUsuario($email, $contrasena)) {
        $_SESSION['email'] = $email;
        $_SESSION['usuario'] = serialize(Usuario::obtenerUsuarioExistente(Usuario::validarUsuario($email, $contrasena)));
        header('Location: tablero.php'); //redirecciona al tablero de control
        exit();
    } else {
        die('Error de login. Recargue.'); //TODO: Mejorar el manejo de errores de login
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alquiler +</title>
        <link href="css/estilos.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

<?php require '../header.php'; ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>En construcci&oacute;n</h1>
                    <img src="img/construccion.jpg" alt="Imagen de un edificio en construcci&oacute;n con un port&aacute;til en primer plano" class="img-fluid mt-3">
                </div>
            </div>
        </div>

<?php require 'footer.php' ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>