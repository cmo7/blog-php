<?php
session_start();

require_once __DIR__ . "/lib/auth.php";

use function Auth\is_logged_in;

if (!is_logged_in()) {
    header("location: /");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo post</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php require __DIR__ . "/components/header.php" ?>
    <h1>Crear nuevo post</h1>
    <form action="/controllers/controller-new-post.php" method="post">
        <label for="title">Título</label> <br>
        <input type="text" name="title" id="title"> <br>
        <label for="content">Contenido</label> <br>
        <textarea name="content" id="content"></textarea> <br>
        <input type="submit" value="Publicar">
    </form>
</body>
</html>