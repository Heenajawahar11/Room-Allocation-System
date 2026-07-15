<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include "db.php";

$ug_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM classes"))[0] ?? 0;
$pg_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pg_classes"))[0] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<!-- ICON LIBRARY -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    height: 100vh;
    background: #1e1e2f;
    color: #fff;
    position: fixed;
}

.sidebar h2 {
    text-align: center;
    padding: 20px 0;
}

/* LINKS */
.sidebar a {
    display: block;
    padding: 12px 20px;
    color: #bbb;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a i {
    margin-right: 10px;
}

/* ACTIVE */
.sidebar a.active {
    background: #5a2ea6;
    color: #fff;
}

.sidebar a:hover {
    background: #5a2ea6;
    color: #fff;
}

/* LOGOUT */
.logout {
    position: absolute;
    bottom: 20px;
    width: 100%;
}

/* MAIN */
.main {
    margin-left: 220px;
    padding: 30px;
    width: 100%;
    min-height: 100vh;
    background: linear-gradient(135deg, #1e1e2f, #5a2ea6);
    color: #fff;
}

/* HEADER */
.header {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 25px;
}

/* CARDS */
.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    width: 260px;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.4);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-6px) scale(1.02);
}

/* ICON INSIDE CARD */
.card i {
    font-size: 28px;
    margin-bottom: 10px;
    color: #9a7cff;
}

/* TEXT */
.card h3 {
    margin-bottom: 10px;
}

.card p {
    color: #ddd;
    font-size: 14px;
}

.card h2 {
    margin-top: 10px;
}

/* BUTTONS */
.card a {
    display: block;
    margin: 10px 0;
    padding: 10px;
    border-radius: 6px;
    text-align: center;
    background: #7b5fcf;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.card a:hover {
    background: #9a7cff;
}

/* RESPONSIVE */
@media screen and (max-width: 600px) {
    .cards {
        flex-direction: column;
        align-items: center;
    }
}
</style>

</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>ADMIN</h2>

    <a href="#" class="active"><i class="fas fa-chart-line"></i> Dashboard</a>
    <a href="allot.php"><i class="fas fa-user-graduate"></i> UG Allocate</a>
    <a href="view.php"><i class="fas fa-eye"></i> UG View</a>
    <a href="pg_allot.php"><i class="fas fa-users"></i> PG Allocate</a>
    <a href="pg_view.php"><i class="fas fa-eye"></i> PG View</a>

    <div class="logout">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <div class="header">Room Allotment Dashboard</div>

    <div class="cards">

        <!-- UG -->
        <div class="card">
            <i class="fas fa-user-graduate"></i>
            <h3>UG Programs</h3>
            <p>Total UG Classes</p>
            <h2><?php echo $ug_count; ?></h2>
        </div>

        <!-- PG -->
        <div class="card">
            <i class="fas fa-users"></i>
            <h3>PG Programs</h3>
            <p>Total PG Classes</p>
            <h2><?php echo $pg_count; ?></h2>
        </div>

        <!-- ACTION -->
        <div class="card">
            <i class="fas fa-bolt"></i>
            <h3>Quick Actions</h3>
            <a href="allot.php">UG Allocate</a>
            <a href="pg_allot.php">PG Allocate</a>
        </div>

    </div>

</div>

</body>
</html>