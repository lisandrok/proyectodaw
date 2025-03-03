<?php
session_start();

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    
    if (Usuario::validarUsuario($email, $contrasena)) {
        $_SESSION['email'] = $email;
        $_SESSION['usuarioId'] = Usuario::validarUsuario($email, $contrasena);
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Ingresar</h2>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Correo electr&oacute;nico:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contrase&ntilde;a:</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="nueva_cuenta.php">Crear una nueva cuenta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

    </body>
</html>