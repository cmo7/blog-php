<?php
namespace Comments;

require_once __DIR__ . "/../lib/database.php";

use function Database\connect;
use function Database\query;
use function Database\disconnect;

function get_comments($post_id) {
    $conn = connect();
    $query = "SELECT c.id, 
                     c.content, 
                     c.created_at, 
                     c.user_id,
                     u.username AS username
                FROM comments c INNER JOIN users u 
                ON c.user_id = u.id 
                WHERE post_id = $post_id;";
    $result = query($conn, $query);
    disconnect($conn);
    return $result;
}

function create_comment($content, $user_id, $post_id) {
    $conn = connect();
    $query = "INSERT INTO comments(content, user_id, post_id) VALUES ('$content', $user_id, $post_id) RETURNING id;";
    $result = query($conn, $query)[0]["id"];
    disconnect($conn);
    return $result;
}