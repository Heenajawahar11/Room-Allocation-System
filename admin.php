<?php
session_start();
include "db.php";

// ------------------- LOGIN CHECK -------------------
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if($res && mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        if($password == $row['password']){ 
            $_SESSION['admin'] = $username;
        } else {
            $error = "Wrong password!";
        }
    } else {
        $error = "User not found!";
    }
}

// ------------------- FETCH BLOCKS -------------------
$blocks = mysqli_query($conn, "SELECT * FROM blocks ORDER BY block_name");

// ------------------- SJ BLOCK ROOMS -------------------
$coursesSJ = ['MCA','MBA','Data Science','CS']; 
$roomsSJ = [];
$res = mysqli_query($conn, "SELECT * FROM rooms WHERE block='SJ' AND course IN ('".implode("','",$coursesSJ)."') ORDER BY capacity DESC, room_number");
if($res){
    $roomsSJ = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel - Room Allotment</title>
<style>
body{ font-family: Arial; background: #f0f0f0; margin:0; }
.container{ width: 900px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.2);}
h2{text-align:center; margin-bottom:30px;}
.error{color:red; text-align:center; margin-bottom:20px;}
table{ width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td{ border: 1px solid #aaa; padding: 10px; text-align: left; }
th{ background-color: #333; color: #fff; }
tr:nth-child(even){ background-color: #eee; }
.section{ margin-bottom: 40px; }
.section h3{ background:#5f2c82; color:#fff; padding:10px 15px; border-radius:8px; }
a{ text-decoration:none; color:#198754; font-weight:bold; }
</style>
</head>
<body>
<div class="container">
<h2>Admin Panel – Room Allotment</h2>

<?php if(!isset($_SESSION['admin'])): ?>
    <!-- LOGIN FORM -->
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
<?php else: ?>

    <p>Welcome, <b><?php echo $_SESSION['admin']; ?></b></p>

    <!-- UG Programs -->
    <div class="section">
        <h3>UG Programs</h3>
        <a href="allocate_ug.php">Allocate Rooms</a> | 
        <a href="view_ug.php">View Allotments</a>
    </div>

    <!-- PG Programs -->
    <div class="section">
        <h3>PG Programs</h3>
        <a href="allocate_pg.php">Allocate Rooms</a> | 
        <a href="view_pg.php">View Allotments</a>
    </div>

    <!-- College Blocks -->
    <div class="section">
        <h3>College Blocks</h3>
        <?php
        if($blocks && mysqli_num_rows($blocks) > 0){
            echo "<table>";
            echo "<tr><th>ID</th><th>Block Name</th></tr>";
            while($b = mysqli_fetch_assoc($blocks)){
                echo "<tr><td>".$b['id']."</td><td>".$b['block_name']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No blocks found!</p>";
        }
        ?>
    </div>

    <!-- SJ Block Rooms -->
    <div class="section">
        <h3>SJ Block Room Allocation</h3>
        <?php if(count($roomsSJ) > 0): ?>
        <table>
            <tr>
                <th>Room Number</th>
                <th>Course</th>
                <th>Capacity</th>
            </tr>
            <?php foreach($roomsSJ as $room): ?>
            <tr>
                <td><?php echo $room['room_number']; ?></td>
                <td><?php echo $room['course']; ?></td>
                <td><?php echo $room['capacity']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>No rooms available for SJ block courses!</p>
        <?php endif; ?>
    </div>

    <!-- All Block Rooms -->
    <div class="section">
        <h3>All Blocks and Their Rooms</h3>
        <?php
        if($blocks && mysqli_num_rows($blocks) > 0){
            mysqli_data_seek($blocks,0);
            while($b = mysqli_fetch_assoc($blocks)){
                echo "<h4>Block: ".$b['block_name']."</h4>";
                $rooms = mysqli_query($conn, "SELECT * FROM rooms WHERE block='".$b['block_name']."' ORDER BY room_number");
                if($rooms && mysqli_num_rows($rooms) > 0){
                    echo "<table><tr><th>Room Number</th><th>Course</th><th>Capacity</th></tr>";
                    while($r = mysqli_fetch_assoc($rooms)){
                        echo "<tr><td>".$r['room_number']."</td><td>".$r['course']."</td><td>".$r['capacity']."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No rooms in this block.</p>";
                }
            }
        }
        ?>
    </div>

<?php endif; ?>

</div>
</body>
</html>
