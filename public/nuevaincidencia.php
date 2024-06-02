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

<?php require '../include/head.php' ?>

    </head>
    <body>

        <?php require '../include/nav.php'; ?>

        <div class="contenido container mt-5">
        <h2>Crear nueva incidencia</h2>
        <form action="nuevaincidencia.php" method="POST">
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option>Seleccione un tipo</option>
                    <?php foreach (Incidencia::obtenerTiposBaseDeDatos() as $tipo): ?>
                        <option value="<?php echo htmlspecialchars($tipo); ?>"><?php echo htmlspecialchars($tipo); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="convenio" class="mt-3"></div>
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

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

        <script> //Este script permite recuperar el convenio via AJAX
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('tipo').addEventListener('change', function() { //Detectamos cambios en el dropdown

                let seleccionado = this.value;
                let requestParaObtenerConvenio = new XMLHttpRequest();

                requestParaObtenerConvenio.open('POST', 'obtener_convenio.php', true);
                requestParaObtenerConvenio.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                requestParaObtenerConvenio.onreadystatechange = function() {
                    if (requestParaObtenerConvenio.readyState === XMLHttpRequest.DONE) {
                        if (requestParaObtenerConvenio.status === 200) { //Solamente imprimiremos convenio si el request devuelve 200
                            document.getElementById('convenio').innerHTML = requestParaObtenerConvenio.responseText; //Imprimimos el convenio en el div correspondiente
                        }
                    }
                };

                requestParaObtenerConvenio.send('tipo_convenio=' + seleccionado);

            });
        });
        </script>
    </body>
</html>