<?php
session_start();
require_once __DIR__ . "/../lib/auth.php";

use function Auth\logout;

logout();

header("location: /");