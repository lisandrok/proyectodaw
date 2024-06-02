<?php
session_start();

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

//Redirecciono al tablero si el usuario ya se encuentra logueado
if (isset($_SESSION['email'])) {
    header('Location: tablero.php');
    exit();
}

//TODO: usar una contrasena encriptada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];

    $usuario = new Usuario($nombre, $apellido, $email, $contrasena, $telefono);

    header('Location: login.php'); //redirecciona al login para que el usuario pueda loguearse a su nueva cuenta
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>

<?php require '../include/head.php' ?>

    </head>
    <body>

<?php require '../include/nav.php'; ?>

        <div class="contenido container mt-5 col-md-6"> <!-- TODO: Validaciones sobre todo de la contrasena -->
            <h2>Crear nueva cuenta</h2>
                <form action="nueva_cuenta.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Correo electr&oacute;nico</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="contrasena">Contrase&ntilde;a</label>
                                <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="repetircontrasena">Repetir contrase&ntilde;a</label>
                                <input type="password" name="repetircontrasena" id="repetircontrasena" class="form-control" required>
                            </div>
                        </div>
                    </div>
 
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
        </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

    </body>
</html>