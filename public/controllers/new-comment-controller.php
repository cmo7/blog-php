<?php
require_once __DIR__ . "/../lib/auth.php";
require_once __DIR__ . "/../lib/comments.php";

use function Auth\is_logged_in;
use function Comments\create_comment;

session_start();

if (!is_logged_in()) {
    header("location: /");
}

$post_id = $_POST["post_id"];
$content = $_POST["content"];
$user_id = $_SESSION["user"]["id"];

$comment_id = create_comment($content, $user_id, $post_id);

header("location: /post.php?id=$post_id");