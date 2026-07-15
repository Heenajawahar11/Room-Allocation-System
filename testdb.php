<?php
$conn = mysqli_connect("localhost","root","","room_allotment");

if($conn){
    echo "Database connected successfully!";
} else {
    echo "Connection failed: ".mysqli_connect_error();
}
?>
