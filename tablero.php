<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

spl_autoload_register(function ($class) {
    require "class/" . $class . ".php";
});

$usuario = unserialize($_SESSION['usuario']);

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

        <?php require 'header.php'; ?>

        <h1>Inmuebles de <?php echo"{$usuario->getNombre()} {$usuario->getApellido()} "?></h1>
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
                            <td><?php echo $inmueble->getInquilino()->getNombre(); ?></td>
                            <td><?php echo count($inmueble->getIncidencias()); ?></td>
                            <td><a href="nuevaincidencia.php?inmuebleId=<?php echo $inmueble->getId(); ?>" class="edit-button btn btn-primary"><i class="bi bi-tools"></i></a></td>
                            <td><a href="editarinmueble.php?id=<?php echo $inmueble->getId(); ?>" class="edit-button btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
                            <td><a href="borrarinmueble.php?id=<?php echo $inmueble->getId(); ?>" class="delete-button btn btn-danger" onclick="return confirm('Esta seguro que desea borrar este inmueble?');"><i class="bi bi-trash"></i></a></td>
                        <tr> 
                    <?php } ?>
            </tbody>
        </table>

<?php require 'footer.php' ?>

    </body>
</html>