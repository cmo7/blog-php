<?php
namespace Posts;

require_once __DIR__ . "/database.php";

use function Database\connect;
use function Database\disconnect;
use function Database\query;

function get_post($id) {
    $conn = connect();
    $query = "SELECT p.id,
                     p.title,
                     p.content,
                     p.created_at,
                     u.username  AS username
                FROM posts p INNER JOIN users u
                ON p.user_id = u.id
                WHERE p.id = $id LIMIT 1;";
    $result = query($conn, $query);
    disconnect($conn);

    if (count($result) > 0) {
        return $result[0];
    }

    return false;
}

function get_all_posts() {
    $conn = connect();
    $query = "SELECT * FROM posts;";
    $result = query($conn, $query);
    disconnect($conn);
    return $result;
}

function create_post($title, $content, $user_id) {
    $conn = connect();
    $query = "INSERT INTO posts(title, content, user_id) VALUES ('$title', '$content', $user_id) RETURNING id;";
    $result = query($conn, $query)[0]["id"];
    disconnect($conn);
    return $result;
}