<?php 
session_start();

require_once __DIR__ . "/lib/database.php";

use function Database\connect;
use function Database\query;
use function Database\disconnect;

$query = "SELECT id, title FROM posts;";

$conn = connect();
$posts = query($conn, $query);
disconnect($conn);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog Estupendo</title>
</head>
<body>
    <?php require __DIR__ . "/components/header.php" ?>
    <h1>Mi Blog</h1>
    <!-- Mostrar todos los posts -->
    <?php 
        foreach ($posts as $post) {
            echo "<h2>" . $post["title"] . "</h2>";
        }
    ?>
</body>
</html>