<?php
    require_once __DIR__ . "/lib/model-post.php";

    use function Post\get as get_post;

    if (!isset($_GET["id"])) {
        header("location: /");
    }
    $post_id = $_GET["id"];
    $post = get_post($post_id);
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
</head>
<body>
    <?php require __DIR__ . "/components/header.php" ?>
    <h1><?php echo $post["title"] ?></h1>
    <div>
        <?php echo $post["content"] ?>
    </div>
</body>
</html>