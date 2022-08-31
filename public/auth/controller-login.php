<?php
session_start();
require_once __DIR__ . "/../lib/auth.php";

use function Auth\login;

$username = $_POST["username"];
$password = $_POST["password"];

if(login($username, $password)) {
    header("location: /");
}
else {
    $_SESSION["ERROR"] = "Nombre de usuario o password incorrectos";
    header("location: /login.php");
}