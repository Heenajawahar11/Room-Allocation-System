<?php
session_start();
include "db.php";

/* SELECT DAY */
$selected_day = $_POST['day'] ?? "";

/* BLOCKS AND ROOMS */
$blocks = [
    "B Block" => ["B5","B6","B7","B8","B9","B10","B14"],
    "Marina Block" => ["M1","M2","M3","M8","M9","M10","M11","M12","M13","M14"],
    "Wheat Block" => ["W3","W7","W10","W11"],
    "Maurin Block" => ["MB2","MB3","MB5"],
    "R Block" => ["R1","R2","R3","R4","CGH"],
    "Admin Block" => ["A5","A6","A7","A8","PGH"],
    "San Jose Block" => ["SJ20","SJ21","SJ22"]
];

/* FETCH ROOM DATA */
$room_data = [];
if($selected_day != ""){
    $stmt = $conn->prepare("SELECT class_name, room_name FROM department");
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        if($row['room_name'] != 'No Room'){
            $room_data[$row['room_name']] = $row['class_name'];
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>UG VIEW ALLOTMENT</title>
<style>
/* BODY & PAGE */
body{
    font-family:'Segoe UI', sans-serif;
    background-color:#6f42c1; /* violet */
    color:#fff;
    margin:0;
    padding:20px;
}

/* HEADER */
h2{
    text-align:center;
    margin-bottom:20px;
}

/* DASHBOARD BUTTON */
.dashboard-btn {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #0d6efd; /* blue */
    color: #fff;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 6px;
    font-weight: bold;
    z-index: 1000;
    transition: background 0.3s;
}
.dashboard-btn:hover {
    background-color: #0b5ed7; /* darker blue */
}

/* FORM */
form{
    text-align:center;
    margin-bottom:30px;
}
select, button{
    padding:8px 12px;
    font-size:16px;
    border-radius:6px;
    border:1px solid #ccc;
}
button{
    background:#198754; /* green button */
    color:#fff;
    border:none;
    cursor:pointer;
}
button:hover{
    background:#157347;
}

/* BLOCK */
.block{
    margin-bottom:30px;
}
.block h3{
    display:inline-block;
    background:#0d6efd;
    color:#fff;
    padding:6px 18px;
    border-radius:20px;
    font-size:14px;
}

/* ROOMS GRID */
.rooms{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin-top:15px;
}

/* ROOM BOX */
.room{
    width:110px;
    height:85px;
    border-radius:10px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    font-weight:bold;
    box-shadow:0 3px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    cursor:pointer;
    position:relative;
}
.room:hover{
    transform: translateY(-8px) scale(1.05);
    box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

/* COLORS */
.green{
    background:#22c55e; /* allocated */
    color:#000;
}
.yellow{
    background:#facc15; /* free */
    color:#000;
}

/* ROOM TEXT */
.room-name { font-size:14px; font-weight:bold; }
.room-class { font-size:12px; }
.room-class.allocated { color:#f8f9fa; }
.room-class.free { color:#000; }

/* TOOLTIP */
.room::after{
    content: attr(data-class);
    position:absolute;
    bottom:110%;
    left:50%;
    transform:translateX(-50%);
    background:#333;
    color:#fff;
    padding:5px 10px;
    border-radius:6px;
    font-size:11px;
    opacity:0;
    transition:0.3s;
    white-space:nowrap;
}
.room:hover::after{ opacity:1; }
</style>
</head>
<body>

<h2>UG VIEW ALLOTMENT</h2>
<a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>

<form method="post">
<select name="day" required>
<option value="">-- Select Day --</option>
<?php for($d=1;$d<=6;$d++): ?>
<option value="Day <?php echo $d; ?>" <?php if($selected_day=="Day $d") echo "selected"; ?>>
Day <?php echo $d; ?>
</option>
<?php endfor; ?>
</select>
<button type="submit">View</button>
</form>

<?php if($selected_day != ""): ?>
    <?php foreach($blocks as $block_name => $rooms): ?>
        <div class="block">
            <h3><?php echo $block_name; ?></h3>
            <div class="rooms">
                <?php foreach($rooms as $room):
                    $class = $room_data[$room] ?? "";
                    $color = $class ? "green" : "yellow";
                    $class_label = $class ? $class : "Free Room";
                ?>
                <div class="room <?php echo $color; ?>" data-class="<?php echo $class_label; ?>">
                    <span class="room-name"><?php echo $room; ?></span>
                    <span class="room-class <?php echo $class ? 'allocated' : 'free'; ?>">
                        <?php echo $class ? $class : "Free"; ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>