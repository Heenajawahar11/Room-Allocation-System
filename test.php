<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM blocks");

if(!$result){
    die("Query failed: " . mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($result)){
    echo $row['id'] . " - " . $row['block_name'] . "<br>";
}
?>
