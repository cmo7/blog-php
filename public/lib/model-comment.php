<?php
namespace Comment;

require_once __DIR__ . "/database.php";

use function Database\connect;
use function Database\query;
use function Database\disconnect;

function get($id) {
    $query = "SELECT * FROM comments WHERE id = $id;";
    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    if (!$result) {
        return null;
    }

    return $result[0];
}

function get_all() {
    $query = "SELECT * FROM comments;";
    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    if (!$result) {
        return Array();
    }

    return $result;
}

function get_all_by_post($post_id) {
    $query = 
    "SELECT 
        comments.id,
        comments.post_id,
        users.username,
        comments.title,
        comments.content,
        comments.author_id
    FROM comments
    INNER JOIN users
    ON comments.author_id = users.id
    WHERE post_id = $post_id;";

    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    if (!$result) {
        return Array();
    }

    return $result;
}

function create($data) {
    $post_id = $data["post_id"];
    $author_id = $data["author_id"];
    $title = $data["title"];
    $content = $data["content"];
    $query = "INSERT INTO comments (post_id, author_id, title, content) 
              VALUES($post_id, $author_id, '$title', '$content');";
    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    return $result;
}

function delete($id) {
    $query = "DELETE FROM comments WHERE id = $id";
    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    return $result;
}

function update($id, $data) {
    $title = $data["title"];
    $content = $data["content"];
    $query = "UPDATE comments SET title = '$title', content = '$content'
              WHERE id = $id";
    $conn = connect();
    $result = query($conn, $query);
    disconnect($conn);

    return $result;
}