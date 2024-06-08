<?php
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

    if (isset($_POST['inmuebleId'])) {
        $inmuebleId = $_POST['inmuebleId'];
        $inmueble = Inmueble::obtenerInmuebleExistente($inmuebleId);
        $edicion = true;
    }

    if ($edicion) {
        $inmueble->setDireccion($direccion);
        $inmueble->actualizarInmuebleEnBaseDatos();
    } else {
        //Creo el inmueble
        $inmueble = new Inmueble($direccion, null, null, null, $usuario);
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