<?php
session_start();

require_once __DIR__ . "/../lib/auth.php";
require_once __DIR__ . "/../lib/model-post.php";

use function Auth\is_logged_in;
use function Post\create;


if(!is_logged_in()) {
    header("location: /");
}

$post = Array(
    "author_id" => $_SESSION["user"]["id"],
    "title"     => $_POST["title"],
    "content"   => $_POST["content"]
);

create($post);

header("location: /");