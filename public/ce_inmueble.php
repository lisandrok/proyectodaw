<?php

require_once "../include/configuracion.php"; //Incluyo el archivo de configuracion con la contraseña para usuarios nuevos

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

$usuario = Usuario::obtenerUsuarioExistente($_SESSION['usuarioId']);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $edicion = false; //Declaro la variable para no tener warnings
    //Entro en modo edicion si la pagina recibe un inmuebleId
    //TODO: Validar que el usuario sea el dueño del inmueble a editar
    if(isset($_GET['inmuebleId'])) {
        $inmuebleId = $_GET['inmuebleId'];
        $inmueble = Inmueble::obtenerInmuebleExistente($inmuebleId);
        $edicion = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edicion = false; //Declaro la variable para no tener warnings
    $direccion = $_POST['direccion'];
    $emailInquilino = $_POST['emailInquilino'];
    $nombreInquilino = $_POST['nombreInquilino'];
    $apellidoInquilino = $_POST['apellidoInquilino'];
    $telefonoInquilino = $_POST['telefonoInquilino'];
    $inquilino = Usuario::obtenerUsuarioExistentePorEmail($emailInquilino);
    
    //Si el email del inquilino no existe como usuario, crearlo
    if (is_null($inquilino) && $emailInquilino !== '') {
        $inquilino = new Usuario($nombreInquilino, $apellidoInquilino, $emailInquilino, password_hash(CONTRASENA_NUEVO_USUARIO, PASSWORD_DEFAULT), $telefonoInquilino);
        //TODO: constructor de usuario deberia devolver el objeto usuario correctamente luego de insertarlo en la base de datos
        $inquilino = Usuario::obtenerUsuarioExistentePorEmail($emailInquilino);
    }

    if (isset($_POST['inmuebleId'])) {
        $inmuebleId = $_POST['inmuebleId'];
        $inmueble = Inmueble::obtenerInmuebleExistente($inmuebleId);
        $edicion = true;
    }

    if ($edicion) {
        $inmueble->setDireccion($direccion);
        $inmueble->setInquilino($inquilino);
        $inmueble->actualizarInmuebleEnBaseDatos();
    } else {
        //Creo el inmueble
        $inmueble = new Inmueble($direccion, $inquilino, null, null, $usuario);
    }
    header('Location: tablero.php'); //Redirecciona al tablero de control despues de crear o editar el inmueble
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

        <div class="contenido container mt-5">
            <h2><?php echo ($edicion)? "Editar " : "Crear nuevo " ?>inmueble</h2>
            <form action="ce_inmueble.php" method="POST">
                <div class="form-group">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" <?php echo ($edicion)? "value='". $inmueble->getDireccion() ."'" : ""?>required>
                </div>
                <div class="form-group">
                    <label for="emailInquilino">Email del inquilino (si no existe un usuario con este email, se creara una nuevo)</label>
                    <input type="text" name="emailInquilino" id="emailInquilino" class="form-control" <?php echo ($edicion && !is_null($inmueble->getInquilino())) ? "value='". $inmueble->getInquilino()->getEmail() ."'" : ""?>>
                </div>
                <div class="form-group">
                    <label for="nombreInquilino">Nombre del inquilino (si ya existe un usuario con el email del inquilino, este campo se ignora)</label>
                    <input type="text" name="nombreInquilino" id="nombreInquilino" class="form-control" <?php echo ($edicion && !is_null($inmueble->getInquilino()))? "value='". $inmueble->getInquilino()->getNombre() ."'" : ""?>>
                </div>
                <div class="form-group">
                    <label for="apellidoInquilino">Apellido del inquilino (si ya existe un usuario con el email del inquilino, este campo se ignora)</label>
                    <input type="text" name="apellidoInquilino" id="apellidoInquilino" class="form-control" <?php echo ($edicion && !is_null($inmueble->getInquilino()))? "value='". $inmueble->getInquilino()->getApellido() ."'" : ""?>>
                </div>
                <div class="form-group">
                    <label for="telefonoInquilino">Telefono del inquilino (si ya existe un usuario con el email del inquilino, este campo se ignora)</label>
                    <input type="text" name="telefonoInquilino" id="telefonoInquilino" class="form-control" <?php echo ($edicion && !is_null($inmueble->getInquilino()))? "value='". $inmueble->getInquilino()->getTelefono() ."'" : ""?>>
                </div>

                <?php
                if ($edicion) {
                    ?>
                    <input type="hidden" name="inmuebleId" id="inmuebleId" value="<?php echo $inmuebleId?>">
                    <?php
                }
                ?>
                <button type="submit" class="btn btn-primary"><?php echo ($edicion)? "Editar" : "Crear"?></button>
                <a href="tablero.php" class="btn btn-secondary">Cancelar</a>
            </form>
    </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

    </body>
</html>