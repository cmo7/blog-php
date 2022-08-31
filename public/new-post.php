<?php
include_once __DIR__ . "/lib/auth.php";

use function Auth\is_logged_in;

session_start();

if (!is_logged_in()) {
    header("location: /");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/main.css">
</head>

<body>
    <?php include __DIR__ . "/components/header.php" ?>
    <h1>New Post</h1>
    <form action="/controllers/new-post-controller.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Publicar">
    </form>
</body>

</html>