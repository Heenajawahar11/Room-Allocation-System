<?php
session_start();
include "db.php";

/* FETCH PG DATA - ALPHABETICAL */
$res = mysqli_query($conn, "
    SELECT class_name, strength, capacity, room 
    FROM pg_classes
    ORDER BY class_name ASC
");

if(!$res){
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PG Room Allocation</title>

    <style>
        body {
            font-family: 'Segoe UI', Arial;
            margin: 0;
            padding: 0;
            background: #6f42c1; /* violet primary */
            color: #fff;
        }

        /* HEADER */
        h2 {
            text-align: center;
            padding: 20px 0;
            color: #fff;
        }

        /* CONTAINER */
        .container {
            width: 95%;
            margin: auto;
            overflow-x: auto;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            color: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background: #0d6efd; /* blue headers */
            color: white;
            padding: 14px;
            font-size: 15px;
            text-align: center;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        tr:hover {
            background: #f5f5f5;
        }

        /* STATUS COLORS */
        .red {
            color: #dc3545; /* error */
            font-weight: bold;
        }

        .green {
            color: #198754; /* success */
            font-weight: bold;
        }

        /* DASHBOARD BUTTON */
        .back-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #5a2ea6; /* violet */
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #47238a; /* darker violet */
        }

        /* RESPONSIVE */
        @media screen and (max-width: 768px) {
            td, th {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<a href="dashboard.php" class="back-btn">← Back to Dashboard</a>

<h2>PG ROOM ALLOCATION</h2>

<div class="container">

<table>
    <tr>
        <th>Class</th>
        <th>Strength</th>
        <th>Capacity</th>
        <th>Room</th>
    </tr>

    <?php 
    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
    ?>
    <tr>
        <td><?php echo htmlspecialchars($row['class_name']); ?></td>
        <td class="<?php echo ($row['strength'] > $row['capacity']) ? 'red' : ''; ?>">
            <?php echo htmlspecialchars($row['strength']); ?>
        </td>
        <td><?php echo htmlspecialchars($row['capacity']); ?></td>
        <td class="green">
            <?php echo $row['room'] ? htmlspecialchars($row['room']) : 'No Room'; ?>
        </td>
    </tr>
    <?php 
        }
    } else {
        echo "<tr><td colspan='4'>No PG Data Found</td></tr>";
    }
    ?>
</table>

</div>

</body>
</html>