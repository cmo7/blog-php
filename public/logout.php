<?php
require_once __DIR__ . "/lib/auth.php";

use function Auth\is_logged_in;

session_start();

if (!is_logged_in()) {
    header("location: /");
}

header("location: /auth/controller-logout.php");