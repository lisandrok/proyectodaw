<?php
session_start();

spl_autoload_register(function ($class) {
    require "class/" . $class . ".php";
});

require 'header.php';

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
<div>
    <form action="login.php" method="post">
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div>
                <button type="submit">Entrar</button>
            </div>
    </form>
</div>

<?php
require 'footer.php'
?>