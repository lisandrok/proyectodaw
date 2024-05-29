        <div class="header">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Alquiler+">
                </a>
            </div>
            <div class="precios">
                <a href="precios.php">Precios</a>
            </div>

            <?php if (isset($_SESSION['email'])) {
                echo '<div class="boton logout">';
                echo '<a href="logout.php">Cerrar sesi&oacuten</a>';
            } else {
                echo '<div class="boton login">';
                echo '<a href="login.php">Iniciar sesi&oacuten</a>';
            }
            ?>

            </div>
        </div>


