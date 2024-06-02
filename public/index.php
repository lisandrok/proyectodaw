<?php
session_start();

spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alquiler +</title>
        <link href="../css/estilos.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

<?php require '../include/header.php'; ?>


        <div class="container mt-5">
        <h1 class="text-center mb-5"><img src="img/logo.png"></h1>
        <!-- Carrusel de Bootstrap -->
        <div id="serviceCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/image1.jpg" class="d-block w-100" alt="Service 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Gestiona tus alquileres</h5>
                        <p>Sistema de gesti&oacute;n de alquileres para peque&ntilde;os propietarios</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/image2.jpg" class="d-block w-100" alt="Service 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Econ&oacute;mico</h5>
                        <p>Comienza a utilizar la versi&oacute;n gratuita de Alquiler +</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/image3.jpg" class="d-block w-100" alt="Service 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Gesti&oacute;n de incidentes</h5>
                        <p>Gestiona los incidentes que afectan tu inmueble de manera sencilla</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#serviceCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#serviceCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
        <br><br><br><br><br>

<?php require '../include/footer.php' ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>