<?php

session_start();

// User must be logged in
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

// Current page path
$current_page = $_SERVER['PHP_SELF'];

// Prevent users from accessing admin pages
if (strpos($current_page, "/admin/") !== false && $_SESSION['role'] != "admin") {
    header("Location: ../user/dashboard.php");
    exit();
}

// Prevent admins from accessing user pages
if (strpos($current_page, "/user/") !== false && $_SESSION['role'] != "user") {
    header("Location: ../admin/dashboard.php");
    exit();
}

?>