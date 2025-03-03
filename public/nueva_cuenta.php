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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];

    $constrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    $usuario = new Usuario($nombre, $apellido, $email, $constrasenaHash, $telefono);

    header('Location: login.php'); //redirecciona al login para que el usuario pueda loguearse a su nueva cuenta
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>

<?php require '../include/head.php' ?>

        <script>
            //Validacion de javascript de que la contrasena ingresada dos veces sea la misma
            function validarContrasena() {
                var contrasena = document.getElementById("contrasena").value;
                var repetirContrasena = document.getElementById("repetirContrasena").value;
                var errorMsg = document.getElementById("mensajeError");

                if (contrasena !== repetirContrasena) {
                    errorMsg.textContent = "Las contraseñas no coinciden";
                    return false;
                } else {
                    errorMsg.textContent = "";
                    return true;
                }
            }
        </script>
    </head>
    <body>

<?php require '../include/nav.php'; ?>

        <div class="contenido container mt-5 col-md-6">
            <h2>Crear nueva cuenta</h2>
                <form action="nueva_cuenta.php" method="POST" onsubmit="return validarContrasena();">
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
                                <label for="repetirContrasena">Repetir contrase&ntilde;a</label>
                                <input type="password" name="repetirContrasena" id="repetirContrasena" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div id="mensajeError" class="text-danger mb-3"></div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
        </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

    </body>
</html>