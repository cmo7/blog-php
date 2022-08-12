<?php
require_once __DIR__ . "/../lib/auth.php";

use function Auth\logout;

session_start();
logout();
header("location: /");