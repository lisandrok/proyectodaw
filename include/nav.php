<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./">
                <i class="bi bi-house-heart-fill"></i> Alquiler +
            </a>
            <div class="ml-auto">
                <?php
                    if (isset($_SESSION['email'])) {
                        ?>

                    <a class="nav-link btn btn-outline-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesi&oacute;n</a>

                        <?php
                    } else {
                        ?>

                <a class="nav-link btn btn-outline-primary" href="login.php">
                    <i class="bi bi-box-arrow-in-right"></i> Ingresar</a>

                        <?php
                    }
                ?>
            </div>
        </div>
    </nav>