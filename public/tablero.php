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
$currentDate = new DateTime();
$currentDate->setTime(0, 0, 0); //Quito la parte de la hora para poder comparar solo fechas
$subscripto = ($usuario->getVencimientoSubscripcion() >= $currentDate);
$publicidad = Publicidad::obtenerPublicidadAlAzar();
$inmueblesComoInquilino = Inmueble::obtenerInmueblesExistentesPorInquilinoId($usuario->getId());

?>

<!DOCTYPE html>
<html lang="es">
    <head>

<?php require '../include/head.php' ?>

    </head>
    <body>

        <?php require '../include/nav.php'; ?>
        <div class="contenido container mt-4 flex-grow-1">
            <h3 class="text-black text-center">Tablero de <?php echo"{$usuario->getNombre()} {$usuario->getApellido()}"?></h3>

            <!-- TODO: Agregar logica para cuando el usuario no tiene ninguna propiedad -->
            <div class="row">
                <div class="col-md-12 ml-auto">
                    <div class="card mb-3">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Propietario de</th>
                                            <th scope="col">Inquilino</th>
                                            <th scope="col">Incidencias</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                        <?php
                                            foreach ($usuario->getInmuebles() as $inmueble) {
                                                ?>
                                                <tr>
                                                    <td class="align-middle"><?php echo $inmueble->getDireccion(); ?></td>
                                                    <td class="align-middle"><?php echo ($inmueble->getInquilino())? "{$inmueble->getInquilino()->getNombre()} {$inmueble->getInquilino()->getApellido()}" : "Vacante" ; ?></td>
                                                    <td class="align-middle"><a href="incidencias.php?inmuebleId=<?php echo $inmueble->getId()?>"><?php echo count($inmueble->getIncidencias()); ?></a><a href="nueva_incidencia.php?inmuebleId=<?php echo $inmueble->getId(); ?>&origen=tablero" class="edit-button btn-sm btn-primary ml-3"><i class="bi bi-plus-lg"></i></a></td>
                                                    <td class="align-middle"><a href="ce_inmueble.php?inmuebleId=<?php echo $inmueble->getId(); ?>" class="edit-button btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
                                                    <td class="align-middle"><a href="borrar_inmueble.php?inmuebleId=<?php echo $inmueble->getId(); ?>" class="delete-button btn btn-danger" onclick="return confirm('Esta seguro que desea borrar este inmueble?');"><i class="bi bi-trash"></i></a></td>
                                                <tr> 
                                            <?php } 
                                            if (!$subscripto && count($usuario->getInmuebles()) >= 3) {
                                                ?> <tr><td colspan="6" class="text-center"><a href="#" class="btn btn-primary w-50 disabled"><i class="bi bi-plus"></i> Actualiza a Plus para agregar m&aacute;s inmuebles</a></td></tr> <?php
                                            } else {
                                                ?> <tr><td colspan="6" class="text-center"><a href="ce_inmueble.php" class="btn btn-primary w-50"><i class="bi bi-plus"></i> Agregar nuevo inmueble</a></td></tr> <?php
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="<?php echo ($usuario->getEsAdministrador())? "col-md-5" : "col-md-8" ?> ml-auto">
                    <div class="card text-black bg-light mb-3">
                    <div class="card-header d-flex">
                        <span>Anuncio publicitario</span>
                        <button class="btn btn-link p-0 ml-auto" type="button" data-toggle="collapse" data-target="#collapseAd" aria-expanded="true" aria-controls="collapseAd" onclick="cambiarChevron();">
                            <i id="chevron" class="bi bi-chevron-down"></i>
                        </button>
                    </div>
                        <div id="collapseAd" class="collapse show">
                            <div class="card-body">
                                <p>
                                    <a href="visitar_publicidad.php?publicidadId=<?php echo $publicidad->getId()?>" target="_blank"><?php echo $publicidad->getContenido(); $publicidad->registrarImpresion($usuario); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php if (count($inmueblesComoInquilino) > 0){ //Oculto la tabla de inmuebles como inquilino si no tiene ninguno
                        ?>

                    <div class="card text-black bg-light mb-3">
                        <table class="table table-hover mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Inquilino en</th>
                                    <th>Propietario</th>
                                    <th>Incidencias</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($inmueblesComoInquilino as $inmueble) {
                                    $usuarioPropietario = $inmueble->obtenerUsuarioPropietarioDeInmueble();
                                    ?>

                                <tr>
                                    <td><?php echo $inmueble->getDireccion(); ?></td>
                                    <td><?php echo"{$usuarioPropietario->getNombre()} {$usuarioPropietario->getApellido()}"?></td>
                                    <td><a href="incidencias.php?inmuebleId=<?php echo $inmueble->getId()?>"><?php echo count($inmueble->getIncidencias()); ?></a><a href="nueva_incidencia.php?inmuebleId=<?php echo $inmueble->getId(); ?>&origen=tablero" class="edit-button btn-sm btn-primary ml-3"><i class="bi bi-plus-lg"></i></a></td>
                                </tr>
                                    
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                        <?php
                    } ?>


                </div>
                <?php if ($usuario->getEsAdministrador()) {
                    ?>
                    <div class="col-md-3 ml-auto">
                        <div class="card text-black bg-warning mb-3">
                            <div class="card-header">Administrador</div>
                            <div class="card-body">
                                <p class="card-text">&Uacute;ltimos 30 d&iacute;as</p>
                                <p class="card-text">Impresiones: <?php echo Publicidad::obtenerGananciasPorImpresiones(30) ?> &euro;</p>
                                <p class="card-text">Clicks: <?php echo Publicidad::obtenerGananciasPorClicks(30) ?> &euro;</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-4 ml-auto">
                    <div class="card text-white <?php echo ($subscripto) ? "bg-success" : "bg-secondary" ?> mb-3">
                        <div class="card-header">Subscripci&oacute;n</div>
                        <div class="card-body">
                            <h5 class="card-title">Subscripci&oacute;n <?php echo ($subscripto) ? "Plus" : "Gratuita" ?></h5>
                            <p class="card-text">
                                <?php echo ($subscripto) ? "Usted es un usuario plus. Podr&aacute; utilizar todas las funciones de la plataforma hasta el " : "Usted es un usuario gratuito. Solo tiene acceso a las funcionalidades b&aacute;sicas. Su subcripci&oacute;n plus finaliz&oacute; el " ?>
                                <?php echo ($usuario->getVencimientoSubscripcion())->format("d/m/Y") ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>

<?php require '../include/footer.php' ?>
<?php require '../include/jsfinalhtml.php' ?>

        <script>
            function cambiarChevron() {
                var chevron = document.getElementById("chevron");
                if (chevron.classList.contains("bi-chevron-down")) {
                    chevron.classList.remove("bi-chevron-down");
                    chevron.classList.add("bi-chevron-left");
                } else {
                    chevron.classList.remove("bi-chevron-left");
                    chevron.classList.add("bi-chevron-down");
                }
            }
        </script>
    </body>
</html>