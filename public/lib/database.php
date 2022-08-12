<?php
namespace Database;

require_once __DIR__ . "/../config.php";

function connect() {
    global $database_config;
    $connection_string = http_build_query($database_config, "", " ");
    $conn = pg_connect($connection_string);
    return $conn;
}

function query($connection, $query) {
    $result = pg_query($connection, $query);
    $rows = pg_fetch_all($result);
    pg_free_result($result);
    return $rows;
}

function disconnect($connection) {
    pg_close($connection);
}