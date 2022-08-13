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
                <li><a href="/">Inicio</a></li>
                <li><a href="/logout.php">Logout</a></li>
                <li><a href="/new-post.php">New Post</a></li>
            </ul>
        <?php } else { ?>
            <!-- Barra de menú de gente que no ha accedido -->
            <ul>
                <li>Inicio</li>
                <li><a href="/signup.php">Registro</a></li>
                <li><a href="/login.php">Acceder</a></li>
            </ul>
        <?php } ?>
    </nav>
</header>