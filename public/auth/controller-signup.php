<?php
session_start();
require_once __DIR__ . "/../lib/auth.php";

use function Auth\signup;
use function Auth\login;

$username = $_POST["username"];
$password = $_POST["password"];

if (signup($username, $password)) {
    login($username, $password);
    header("location: /");
}

header("location: /signup.php");
