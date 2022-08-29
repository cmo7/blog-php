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

}

function create($data) {

}

function delete($id) {

}

function update($id, $data) {

}