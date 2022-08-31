<?php
session_start();

require_once __DIR__ . "/../lib/auth.php";
require_once __DIR__ . "/../lib/model-comment.php";

use function Auth\is_logged_in;
use function Comment\create;


if(!is_logged_in()) {
    header("location: /");
}

$comment = Array(
    "author_id" => $_SESSION["user"]["id"],
    "post_id"   => $_POST["post_id"],
    "title"     => $_POST["title"],
    "content"   => $_POST["content"]
);

create($comment);

header("location: /");