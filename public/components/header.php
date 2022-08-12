<?php 
require_once __DIR__ . "/../lib/auth.php";
use function Auth\is_logged_in;
?>
<header>
    <nav>
        <?php if (is_logged_in()) { ?>
            <!-- Barra de menú de usuarios logeados -->
            <ul>
                <li>Hola: <?php echo $_SESSION["user"]["username"] ?></li>
                <li>Inicio</li>
                <li>Logout</li>
            </ul>
        <?php } else { ?>
            <!-- Barra de menú de gente que no ha accedido -->
            <ul>
                <li>Inicio</li>
                <li>Registro</li>
                <li>Acceder</li>
            </ul>
        <?php } ?>

    </nav>
</header>