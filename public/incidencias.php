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
    $inmueble = Inmueble::obtenerInmuebleExistente($inmuebleId);
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>

<?php require '../include/head.php' ?>

    </head>
    <body>

        <?php require '../include/nav.php'; ?>
        <div class="contenido container mt-4 flex-grow-1">
            <h3 class="text-black text-center">Incidencias del inmueble ubicado en <?php echo $inmueble->getDireccion()?></h3>
            <div class="row">
                <div class="col-md-12 ml-auto">
                    <div class="card mb-3">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Descripci&oacute;n</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php 
                                            
                                        foreach ($inmueble->getIncidencias() as $incidencia) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $incidencia->getId(); ?></th>
                                            <td><?php echo $incidencia->getTipo(); ?></td>
                                            <td><?php echo $incidencia->getTitulo(); ?></td>
                                            <td><?php echo $incidencia->getDescripcion(); ?></td>
                                            <td><?php echo $incidencia->getEstado(); ?></td>
                                            <td><?php echo $incidencia->getFecha(); ?></td>
                                        </tr>

                                            <?php
                                        }
                                            
                                            ?>
                                        <tr><td colspan="6" class="text-center"><a href="nueva_incidencia.php?inmuebleId=<?php echo $inmueble->getId()?>&origen=incidencias" class="btn btn-primary w-50"><i class="bi bi-plus"></i> Agregar nueva incidencia</a> <a class="btn btn-secondary" href = "tablero.php">Volver al tablero</a></a></td></tr>
                                    </tbody>
                                </table>
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

