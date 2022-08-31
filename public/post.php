<?php
require_once __DIR__ . "/lib/posts.php";
require_once __DIR__ . "/lib/comments.php";

use function Posts\get_post;
use function Comments\get_comments;

session_start();

$post_id = $_GET["id"];

$post = get_post($post_id);
$comments = get_comments($post_id);

if (!$post) {
    header("location: /");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post["title"] ?></title>
    <link rel="stylesheet" href="/assets/main.css">
</head>

<body>
    <?php include __DIR__ . "/components/header.php" ?>
    <h1><?php echo $post["title"] ?></h1>
    <h2>Publicado por <?php echo $post["username"] ?></h2>
    <p><?php echo $post["content"] ?></p>

    <div class="comments">
        <h2>Comentarios</h2>

        <h3>Deja tu comentario</h3>
        <form action="/controllers/new-comment-controller.php" method="post">
            <input type="hidden" name="post_id" value="<?php echo $post["id"] ?>">
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Comentar">
        </form>
        <h3>Todos los comentarios</h3>
        <?php foreach ($comments as $comment) : ?>
            <div class="comment">
                <p><?php echo $comment["content"] ?></p>
                <p><?php echo $comment["username"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>