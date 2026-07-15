<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
include "db.php";

$selected_day = isset($_POST['day']) ? $_POST['day'] : "";

$allotments = [];
if($selected_day != ""){
    $query = mysqli_query($conn, "SELECT class_name, GROUP_CONCAT(room_name SEPARATOR ', ') AS rooms
                                  FROM allotments
                                  WHERE day='$selected_day'
                                  GROUP BY class_name
                                  ORDER BY class_name");
    while($row = mysqli_fetch_assoc($query)){
        $allotments[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Allocated Rooms</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f6fa; /* uniform professional light gray */
    margin: 0;
    padding: 20px;
}
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    padding: 15px 30px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    border-radius: 8px;
    margin-bottom: 30px;
}
.header h2 {
    margin: 0;
    color: #0d6efd;
}
.header a {
    background-color: #dc3545;
    color: #fff;
    text-decoration: none;
    padding: 8px 18px;
    border-radius: 5px;
    font-weight: bold;
}
.header a:hover {
    background-color: #c82333;
}
form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    width: 400px;
}
select, button {
    padding: 8px 12px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 10px;
}
button {
    background-color: #198754;
    color: #fff;
    border: none;
    cursor: pointer;
}
button:hover {
    background-color: #157347;
}
table {
    border-collapse: collapse;
    width: 80%;
    margin: 0 auto;
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}
th {
    background-color: #0d6efd;
    color: #fff;
}
tr:hover { background-color: #f1f3f6; }
.message {
    text-align: center;
    font-weight: bold;
    color: #555;
}
</style>
</head>
<body>

<div class="header">
    <h2>View Allocated Rooms</h2>
    <a href="logout.php">Logout</a>
</div>

<form method="post" action="">
    <label for="day">Select Day:</label>
    <select name="day" id="day" required>
        <option value="">--Select Day--</option>
        <?php for($d=1; $d<=6; $d++){ ?>
            <option value="Day <?php echo $d; ?>" <?php if($selected_day=="Day $d") echo "selected"; ?>>Day <?php echo $d; ?></option>
        <?php } ?>
    </select>
    <button type="submit">View Allotment</button>
</form>

<?php if(!empty($allotments)){ ?>
<table>
    <tr>
        <th>Class</th>
        <th>Room(s)</th>
    </tr>
    <?php foreach($allotments as $allot){ ?>
    <tr>
        <td><?php echo $allot['class_name']; ?></td>
        <td><?php echo $allot['rooms']; ?></td>
    </tr>
    <?php } ?>
</table>
<?php } elseif($selected_day != ""){ ?>
    <div class="message">No allotment found for <?php echo $selected_day; ?>.</div>
<?php } ?>

</body>
</html>
