<?php

namespace Auth;

require_once __DIR__ . "/database.php";

use function Database\connect;
use function Database\disconnect;
use function Database\query;

function signup($username, $password)
{
    $conn = connect();
    
    $ERRORS = Array();
    if (strlen($username) < 4) {
        array_push($ERRORS, "Nombre de usuario demasiado corto");
    }
    if (strlen($password) < 4) {
        array_push($ERRORS, "El password es demasiado corto");
    }
    $result = query($conn, "SELECT * FROM users 
                            WHERE username = '$username' 
                            LIMIT 1;");
    if ($result) {
        array_push($ERRORS, "El usuario ya existe");
    }
    if (count($ERRORS) > 0) {
        disconnect($conn);
        $_SESSION["ERROR"] = $ERRORS;
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password');";
    query($conn, $query);
    disconnect($conn);
    return true;
}

function login($username, $password)
{
    $conn = connect();
    $query = "SELECT id, username, password FROM users "
        . "WHERE username = '$username' LIMIT 1;";
    $result = query($conn, $query);
    disconnect($conn);

    if (!$result) {
        return false;
    } else {

        $result = $result[0];

        if (password_verify($password, $result["password"])) {
            $_SESSION["user"] = $result;
            return true;
        }
        return false;
    }
}

function logout()
{
    session_destroy();
    header("location: /");
}

function is_logged_in()
{
    return isset($_SESSION["user"]);
}
