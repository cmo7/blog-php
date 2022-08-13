<?php
session_start();

require_once __DIR__ . "/../lib/posts.php";

use function Posts\create_post;

$title = $_POST["title"];
$content = $_POST["content"];
$user_id = $_SESSION["user"]["id"];

$post_id = create_post($title, $content, $user_id);

header("location: /post.php?id=$post_id");