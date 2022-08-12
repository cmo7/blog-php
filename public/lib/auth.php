<?php
namespace Auth;

require_once __DIR__ . "/database.php";

use function Database\connect;
use function Database\disconnect;
use function Database\query;

/**
 * Signs up the user in the system, creating a new user in the database.
 */
function signup($username, $password) {
    $conn = connect();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password');";
    query($conn, $query);
    disconnect($conn);
}

/**
 * Logs the user in and returns the user data.
 */
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
    return false;
}

/**
 * Logs the user out.
 */
function logout() {
    session_destroy();
    header("location: /");
}

/**
 * Returns true if the user is logged in, false otherwise.
 */
function is_logged_in() {
    return isset($_SESSION["user"]);
}