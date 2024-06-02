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
    $inmuebleId = $_GET['inmuebleId'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $inmueble = Inmueble::obtenerInmuebleExistente($_POST['inmuebleId']);

    $inmueble->agregarIncidencia($tipo, $titulo, $descripcion, $usuario);

    header('Location: tablero.php'); //redirecciona al tablero de control
    exit();
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Iconos de Bootstrap -->
    </head>
    <body>

        <?php require '../header.php'; ?>

        <div class="container mt-5">
        <h2>Crear nueva incidencia</h2>
        <form action="nuevaincidencia.php" method="POST">
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <?php foreach (Incidencia::obtenerTiposBaseDeDatos() as $tipo): ?>
                        <option value="<?php echo htmlspecialchars($tipo); ?>"><?php echo htmlspecialchars($tipo); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">T&iacute;tulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripci&oacute;n</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
            </div>
            <input type="hidden" name="inmuebleId" id="inmuebleId" value="<?php echo $inmuebleId?>">
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>


<?php require '../footer.php' ?>

    </body>
</html>