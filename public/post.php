<?php
    session_start();
    require_once __DIR__ . "/lib/model-post.php";
    require_once __DIR__ . "/lib/model-user.php";
    require_once __DIR__ . "/lib/model-comment.php";
    require_once __DIR__ . "/lib/auth.php";

    use function Post\get as get_post;
    use function User\get as get_user;
    use function Comment\get_all_by_post;
    use function Auth\is_logged_in;

    if (!isset($_GET["id"])) {
        header("location: /");
    }
    $post_id = $_GET["id"];

    $post = get_post($post_id);
    $author = get_user($post["author_id"]);
    $comments = get_all_by_post($post_id);

    if (!$post) {
        header ("location: /");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post["title"] ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php require __DIR__ . "/components/header.php" ?>
    <h1><?php echo $post["title"] ?></h1>
    <div>por: <?php echo $author["username"]?></div>
    <div>
        <?php echo $post["content"] ?>
    </div>
    <div class="comments">
    <?php 
        foreach ($comments as $comment) {
            echo '<div class="comment">';
            echo "<h4>" . $comment["title"] . "</h4>";
            echo "<div>" . "por: " . $comment["username"] . "</div>";
            echo $comment["content"];
            echo "</div>";
        }
    ?>
    </div>
    <?php if (is_logged_in()) { ?>
    <h2> Deja tu comentario </h2>
    <form action="/controllers/controller-new-comment.php" method="post">
        <label for="title">Título (opcional)</label> <br>
        <input type="text" name="title" id="title"> <br>
        <label for="content">Comentario</label> <br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea> <br>
        <input type="hidden" name="post_id" value="<?php echo $post["id"]?>">
        <input type="submit" value="Comentar">
    </form>
    <?php } ?>
</body>
</html>