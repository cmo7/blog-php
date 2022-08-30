<?php 
session_start();

require_once __DIR__ . "/lib/model-post.php";

use function Post\get_all as get_all_posts;

$posts = get_all_posts();

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
            echo "<h2>";
            echo '<a href="/post.php?id='. $post["id"] . '">';
            echo $post["title"];
            echo '</a>';
            echo "</h2>";
        }
    ?>
</body>
</html>