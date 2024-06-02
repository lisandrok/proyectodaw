        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="./">
                    <i class="bi bi-house-heart-fill"></i> Alquiler +
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                        <?php if (isset($_SESSION['email'])) {
                ?>
                            <a class="nav-link btn btn-outline-danger" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i> Cerrar sesi&oacute;n
                <?php
            } else {
                ?>
                            <a class="nav-link btn btn-outline-primary" href="login.php">
                                <i class="bi bi-box-arrow-in-right"></i> Ingresar
            <?php }?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
