<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /literaline/auth/login.php");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: /literaline/user/home.php");
    exit;
}

?>