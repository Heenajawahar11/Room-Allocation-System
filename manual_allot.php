<?php
include "db.php";

// Fetch classes and rooms from the database
$classes = mysqli_query($conn, "SELECT * FROM classes ORDER BY name ASC");
$rooms = mysqli_query($conn, "SELECT * FROM rooms ORDER BY name ASC");

// Save allotment
if(isset($_POST['save'])){
    $day = $_POST['day'];
    foreach($_POST['room'] as $class_name => $room_name){
        if($room_name != "") {
            mysqli_query($conn, "INSERT INTO allotments (class_name, room_name, day) VALUES ('$class_name', '$room_name', '$day')");
        }
    }
    echo "<p style='color:green; font-weight:bold;'>Allotment saved successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manual Room Allotment</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 30px; }
        h2 { color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #007BFF; color: #fff; }
        select { padding: 5px; }
        .btn { margin-top: 20px; padding: 10px 20px; font-size: 16px; background-color: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background-color: #218838; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Manual Room Allotment – Day Selection</h2>
    <form method="post" action="">
        <label for="day">Day:</label>
        <select name="day" id="day" required>
            <option value="">--Select Day--</option>
            <option value="Day 1">Day 1</option>
            <option value="Day 2">Day 2</option>
            <option value="Day 3">Day 3</option>
            <option value="Day 4">Day 4</option>
            <option value="Day 5">Day 5</option>
            <option value="Day 6">Day 6</option>
        </select>

        <table>
            <tr>
                <th>Class</th>
                <th>Strength</th>
                <th>Select Room</th>
            </tr>
            <?php while($class = mysqli_fetch_assoc($classes)) { ?>
            <tr>
                <td><?php echo $class['name']; ?></td>
                <td><?php echo $class['strength']; ?></td>
                <td>
                    <select name="room[<?php echo $class['name']; ?>]">
                        <option value="">--Select--</option>
                        <?php while($room = mysqli_fetch_assoc($rooms)) { ?>
                            <option value="<?php echo $room['name']; ?>"><?php echo $room['name']; ?></option>
                        <?php } ?>
                        <?php mysqli_data_seek($rooms, 0); ?>
                    </select>
                </td>
            </tr>
            <?php } ?>
        </table>

        <button type="submit" name="save" class="btn">Save Allotment</button>
    </form>
</body>
</html>
