<?php
include "db.php";

$id = $_POST['id'];
$room = $_POST['room_name'];

$check = mysqli_query($conn, "SELECT * FROM department WHERE room_name='$room' AND id != $id");

if(mysqli_num_rows($check) > 0){
    echo "Room already allocated!";
} else {
    mysqli_query($conn, "UPDATE department SET room_name='$room' WHERE id=$id");
    header("Location: view.php");
}
?>