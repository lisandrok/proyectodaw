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

<?php require '../include/head.php' ?>

    </head>
    <body>

<?php require '../include/nav.php'; ?>

        <div class="contenido container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>En construcci&oacute;n</h1>
                    <img src="img/construccion.jpg" alt="Imagen de un edificio en construcci&oacute;n con un port&aacute;til en primer plano" class="img-fluid mt-3">
                </div>
            </div>
        </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

    </body>
</html>