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
    //Este me permite devolver al usuario a la misma pantalla desde la cual vino
    if (isset($_GET['origen'])) {
        if ($_GET['origen'] == "incidencias") {
            $origen = $_GET['origen'] . ".php?inmuebleId=" . $inmuebleId; 
        } else {
            $origen = $_GET['origen'] . ".php"; 
        }
    } else {
        $origen = './';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $inmueble = Inmueble::obtenerInmuebleExistente($_POST['inmuebleId']);
    $origen = $_POST['origen'];
    $inmueble->agregarIncidencia($tipo, $titulo, $descripcion, $usuario);

    header('Location: '. $origen); //redirecciona al tablero de control
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
            <form action="nueva_incidencia.php" method="POST">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option>Seleccione un tipo</option>
                        <?php foreach (Incidencia::obtenerTiposBaseDeDatos() as $tipo): ?>
                            <option value="<?php echo htmlspecialchars($tipo); ?>"><?php echo htmlspecialchars($tipo); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="publicidad" class="mt-3"></div>
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripci&oacute;n</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
                </div>
                <input type="hidden" name="inmuebleId" id="inmuebleId" value="<?php echo $inmuebleId?>">
                <input type="hidden" name="origen" id="origen" value="<?php echo $origen?>">
                <button type="submit" class="btn btn-primary">Crear</button>
                <a href="<?php echo $origen?>">Cancelar</a>
            </form>
    </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

        <script> //Este script permite recuperar la publicidad via AJAX
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('tipo').addEventListener('change', function() { //Detectamos cambios en el dropdown

                let seleccionado = this.value;
                let requestAjax = new XMLHttpRequest();

                requestAjax.open('POST', 'obtener_publicidad.php', true);
                requestAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                requestAjax.onreadystatechange = function() {
                    if (requestAjax.readyState === XMLHttpRequest.DONE) {
                        if (requestAjax.status === 200) {
                            var publicidad = JSON.parse(requestAjax.responseText); //Convierto el JSON de PHP a un objeto de Javascript
                            var link = document.createElement("a");
                            link.href = "visitar_publicidad.php?publicidadId=" + publicidad.id;
                            link.target = "_blank";
                            link.textContent =publicidad.contenido;
                            document.getElementById('publicidad').replaceChildren(); //Limpiamos el div
                            document.getElementById('publicidad').appendChild(link); //Agregamos el link con el contenido
                        } else if (requestAjax.status === 404) {
                            document.getElementById('publicidad').replaceChildren(); //Dejamo el div vacio
                        }
                    }
                };
                requestAjax.send('tipo=' + seleccionado);

            });
        
        });
        </script>
    </body>
</html>