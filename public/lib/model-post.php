<?php
namespace Post;

require_once __DIR__ . "/database.php";

use function Database\connect;
use function Database\query;
use function Database\disconnect;

function get($id) {
    $query = "SELECT * FROM posts WHERE id = $id";

    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    if (!$result) {
        return null;
    }

    return $result[0];
}

function get_all() {
    $query = "SELECT * FROM posts;";

    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    if (!$result) {
        return Array();
    }

    return $result;
}

function create($data) {
    $title = $data["title"];
    $author_id = $data["author_id"];
    $content = $data["content"];

    $query = "INSERT INTO posts (title, author_id, content) 
              VALUES('$title', $author_id, '$content');";
    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    return $result;
}

function delete($id) {

}

function update($id, $data) {

}