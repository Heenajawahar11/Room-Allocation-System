<?php
session_start();

/* PROTECT PAGE */
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include "db.php";

/* FETCH PG DATA */
$room_data = [];

$q = mysqli_query($conn, "
    SELECT class_name, room 
    FROM pg_classes
    WHERE room IS NOT NULL AND room != ''
");

while($row = mysqli_fetch_assoc($q)){
    $class = trim($row['class_name']);
    $room  = trim($row['room']);

    $room_data[$room] = $class;
}

/* BLOCK DETECTION */
function getBlock($room){
    if(str_starts_with($room,"A") || $room=="PGH" || $room=="PGR") return "Admin Block";
    if(str_starts_with($room,"SJ")) return "San Jose Block";
    if(str_starts_with($room,"M")) return "Marina Block";
    if(str_starts_with($room,"B")) return "B Block";
    if(str_starts_with($room,"R")) return "R Block";
    if(str_starts_with($room,"W")) return "Wheat Block";
    if(str_starts_with($room,"MB")) return "Maurin Block";
    if(str_starts_with($room,"SM")) return "Special Block";
    if(str_starts_with($room,"N")) return "N Block";
    return "Other";
}

/* GROUP BY BLOCK */
$grouped = [];

foreach($room_data as $room => $class){
    $block = getBlock($room);
    $grouped[$block][$room] = $class;
}

/* SORT */
ksort($grouped);
foreach($grouped as $block => $rooms){
    ksort($rooms);
    $grouped[$block] = $rooms;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PG VIEW ALLOTMENT</title>

<style>
body{
    font-family:'Segoe UI', sans-serif;
    background:#6f42c1;
    color:#fff;
    padding:20px;
}

/* TITLE */
h2{
    text-align:center;
    margin-bottom:30px;
}

/* LOGOUT BUTTON */
.logout-btn{
    position: fixed;
    top: 20px;
    right: 20px;
    background:#dc3545;
    color:#fff;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    font-weight:bold;
    z-index:1000;
    transition:0.3s;
}

.logout-btn:hover{
    background:#bb2d3b;
}

/* BLOCK */
.block{
    margin-bottom:40px;
}

.block h3{
    display:inline-block;
    background:#0d6efd;
    padding:8px 20px;
    border-radius:25px;
    margin-bottom:15px;
}

/* GRID */
.rooms{
    display:grid;
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    gap:15px;
}

/* ROOM CARD */
.room{
    background:#22c55e;
    color:#000;
    border-radius:12px;
    padding:10px;
    text-align:center;
    font-weight:bold;
    min-height:90px;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;

    transition:0.3s;
}

.room:hover{
    transform:scale(1.05);
}

/* TEXT */
.room span:first-child{
    font-size:14px;
}

.room span:last-child{
    font-size:12px;
}
</style>
</head>

<body>

<!-- LOGOUT -->
<a href="logout.php" class="logout-btn">Logout</a>

<h2>PG VIEW ALLOTMENT</h2>

<?php foreach($grouped as $block => $rooms): ?>

<div class="block">
<h3><?php echo $block; ?></h3>

<div class="rooms">

<?php foreach($rooms as $room => $class): ?>

<div class="room">
    <span><?php echo $room; ?></span>
    <span><?php echo $class; ?></span>
</div>

<?php endforeach; ?>

</div>
</div>

<?php endforeach; ?>

</body>
</html>