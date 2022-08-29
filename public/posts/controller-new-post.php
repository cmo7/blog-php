<?php
session_start();

require_once __DIR__ . "/../lib/auth.php";
require_once __DIR__ . "/../lib/database.php";

use function Auth\is_logged_in;
use function Database\connect;
use function Database\query;
use function Database\disconnect;

if(!is_logged_in()) {
    header("location: /");
}

$author_id = $_SESSION["user"]["id"];
$title = $_POST["title"];
$content = $_POST["content"];

$query = "INSERT INTO posts(author_id, title, content)
          VALUES($author_id, '$title', '$content');";

$conn = connect();
query($conn, $query);
disconnect($conn);

header("location: /");