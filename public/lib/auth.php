<?php
namespace Auth;

require_once __DIR__ . "/database.php";

use function Database\connect;
use function Database\disconnect;
use function Database\query;

function signup($username, $password) {
    $conn = connect();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password');";
    query($conn, $query);
    disconnect($conn);
}

function login($username, $password) {
    $conn = connect();
    $query = "SELECT id, username, password FROM users " 
           . "WHERE username = '$username' LIMIT 1;";
    $result = query($conn, $query)[0];
    disconnect($conn);
    if (password_verify($password, $result["password"])) {
        $_SESSION["user"] = $result;
        header("location: /");
    }
    echo "Nombre de usuario o password incorrectos";
}

function logout() {
    session_destroy();
    header("location: /");
}

function is_logged_in() {
    return isset($_SESSION["user"]);
}