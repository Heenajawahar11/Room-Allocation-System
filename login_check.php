<?php
session_start();
include "db.php"; // optional, not needed for password-only

$admin_password = "admin123"; // change to your password

if(isset($_POST['password'])){
    if($_POST['password'] === $admin_password){
        $_SESSION['login'] = true;
        $_SESSION['username'] = "Admin";
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
} else {
    header("Location: blocks.php");
    exit();
}
?>
