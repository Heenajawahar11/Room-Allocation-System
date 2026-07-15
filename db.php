<?php
$conn = mysqli_connect("localhost","root","","room_allotment_system");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>