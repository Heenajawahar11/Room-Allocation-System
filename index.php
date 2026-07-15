<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body{font-family:Arial;background:#f4f4f4;text-align:center;padding-top:100px;}
a{display:inline-block;margin:20px;padding:15px 30px;background:#0d6efd;color:#fff;text-decoration:none;border-radius:8px;}
</style>
</head>
<body>

<h2>Room Allotment Dashboard</h2>

<a href="view.php">Allocate / View Rooms</a>
<br>
<a href="logout.php">Logout</a>

</body>
</html>