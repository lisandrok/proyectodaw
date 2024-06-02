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

?>

<!DOCTYPE html>
<html lang="es">
    <head>

<?php require '../include/head.php' ?>

    </head>
    <body>

        <?php require '../include/nav.php'; ?>
        <div class="contenido container mt-5 flex-grow-1">
            <h1>Inmuebles de <?php echo"{$usuario->getNombre()} {$usuario->getApellido()}"?></h1>
            <!-- TODO: Agregar logica para cuando el usuario no tiene ninguna propiedad -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Direcci&oacute;n</th>
                        <th>Inquilino</th>
                        <th>Incidencias</th>
                        <th>Nueva incidencia</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>                
                    <?php
                        foreach ($usuario->getInmuebles() as $inmueble) {
                            ?>
                            <tr>
                                <td><?php echo $inmueble->getId(); ?></td>
                                <td><?php echo $inmueble->getDireccion(); ?></td>
                                <td><?php echo "{$inmueble->getInquilino()->getNombre()} {$inmueble->getInquilino()->getApellido()}" ; ?></td>
                                <td><?php echo count($inmueble->getIncidencias()); ?></td>
                                <td><a href="nuevaincidencia.php?inmuebleId=<?php echo $inmueble->getId(); ?>" class="edit-button btn btn-primary"><i class="bi bi-tools"></i></a></td>
                                <td><a href="editarinmueble.php?id=<?php echo $inmueble->getId(); ?>" class="edit-button btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
                                <td><a href="borrarinmueble.php?id=<?php echo $inmueble->getId(); ?>" class="delete-button btn btn-danger" onclick="return confirm('Esta seguro que desea borrar este inmueble?');"><i class="bi bi-trash"></i></a></td>
                            <tr> 
                        <?php } ?>
                </tbody>
            </table>
        </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

    </body>
</html>