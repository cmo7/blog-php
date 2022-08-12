<?php
require_once __DIR__ . "/lib/auth.php";

use function Auth\is_logged_in;

session_start();
if (is_logged_in()) {
    header("location: /");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php require __DIR__ . "/components/header.php" ?>
    <h1>Registro</h1>
    <form action="/auth/controller-login.php" method="post">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Ok">
    </form>
    <a href="./signup.php">No tengo cuenta</a>
</body>

</html>