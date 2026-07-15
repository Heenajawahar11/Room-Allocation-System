<?php
session_start();
include "db.php";

/* ---------- UPDATE ROOM ---------- */
if(isset($_POST['update_room'])){
    $id = $_POST['id'];
    $room = $_POST['room_name'];

    $check = mysqli_query($conn, "SELECT * FROM department WHERE room_name='$room' AND id != $id");

    if(mysqli_num_rows($check) == 0){
        mysqli_query($conn, "UPDATE department SET room_name='$room' WHERE id=$id");
    }

    header("Location: dashboard.php");
    exit();
}

/* ---------- AUTO ALLOCATION ---------- */
$used_rooms = [];

$res = mysqli_query($conn, "SELECT * FROM department ORDER BY class_name");

while($row = mysqli_fetch_assoc($res)){

    if($row['room_name'] == 'No Room'){
        $allowed = explode(",", $row['allowed_rooms']);

        foreach($allowed as $r){
            $r = trim($r);

            if(!in_array($r, $used_rooms)){
                mysqli_query($conn, "UPDATE department SET room_name='$r' WHERE id=".$row['id']);
                $used_rooms[] = $r;
                break;
            }
        }
    } else {
        $used_rooms[] = $row['room_name'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>UG ROOM ALLOCATION</title>

<style>
body{
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #5f2c82, #49a09d);
    margin:0;
    padding:20px;
}

h2{
    text-align:center;
    color:#fff;
}

/* TOP BAR */
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

/* DAY SELECT */
.day-select{
    color:#fff;
    font-weight:bold;
}
.day-select select{
    padding:6px;
    border-radius:6px;
}

/* BACK BUTTON */
.back-btn{
    text-decoration:none;
    background:#0d6efd;
    color:white;
    padding:10px 18px;
    border-radius:6px;
    font-weight:bold;
}
.back-btn:hover{
    background:#0b5ed7;
}

.container{
    width:95%;
    margin:auto;
    background:#fff;
    border-radius:12px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    text-align:center;
}

th{
    background:#0d6efd;
    color:white;
}

tr:nth-child(even){
    background:#f2f2f2;
}

tr:hover{
    background:#e0e7ff;
}

select{
    padding:6px;
    border-radius:6px;
}

button{
    padding:6px 12px;
    border:none;
    border-radius:6px;
    background:#28a745;
    color:#fff;
    cursor:pointer;
}

button:hover{
    background:#218838;
}

.no-room{
    color:red;
    font-weight:bold;
}
</style>
</head>

<body>

<h2>UG ROOM ALLOCATION</h2>

<!-- 🔥 TOP BAR -->
<div class="top-bar">

    <!-- LEFT: SELECT DAY (UI ONLY) -->
    <div class="day-select">
        Select Day:
        <select>
            <?php
            for($i=1; $i<=6; $i++){
                echo "<option>Day $i</option>";
            }
            ?>
        </select>
    </div>

    <!-- RIGHT: BACK BUTTON -->
    <a href="dashboard.php" class="back-btn">&larr;Back to Dashboard</a>

</div>

<div class="container">

<table>
<tr>
<th>Class</th>
<th>Strength</th>
<th>Capacity</th>
<th>Room</th>
<th>Edit</th>
</tr>

<?php
$res = mysqli_query($conn, "SELECT * FROM department ORDER BY class_name");

while($row = mysqli_fetch_assoc($res)){
?>

<tr>
<td><?php echo $row['class_name']; ?></td>
<td><?php echo $row['strength']; ?></td>
<td><?php echo $row['capacity']; ?></td>

<td class="<?php echo ($row['room_name']=='No Room') ? 'no-room' : ''; ?>">
    <?php echo $row['room_name']; ?>
</td>

<td>
<form method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<select name="room_name">
<?php
$rooms = explode(",", $row['allowed_rooms']);
foreach($rooms as $r){
    $r = trim($r);
    $selected = ($r == $row['room_name']) ? "selected" : "";
    echo "<option value='$r' $selected>$r</option>";
}
?>
</select>

<button type="submit" name="update_room">Update</button>
</form>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>