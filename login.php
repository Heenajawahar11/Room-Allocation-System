<?php
session_start();

if(isset($_POST['login'])){
    $password = $_POST['password'];

    if($password === "admin123"){
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Wrong Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Room Allotment System</title>

<style>
body {
    margin: 0;
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #1e1e2f, #5a2ea6);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* LOGIN BOX */
.login-box {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(15px);
    padding: 35px;
    width: 320px;
    border-radius: 15px;
    text-align: center;
    color: #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    animation: fadeIn 0.6s ease;
}

/* ANIMATION */
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}

/* LOGO */
.logo {
    width: 80px;
    margin-bottom: 10px;
}

/* TITLE */
.title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
}

/* SUBTITLE */
.subtitle {
    font-size: 12px;
    color: #ccc;
    margin-bottom: 20px;
}

/* INPUT */
.login-box input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: none;
    border-radius: 8px;
    outline: none;
    background: rgba(255,255,255,0.2);
    color: #fff;
    transition: 0.3s;
}

.login-box input::placeholder {
    color: #ddd;
}

.login-box input:focus {
    box-shadow: 0 0 8px rgba(123,95,207,0.7);
}

/* BUTTON */
.login-box button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #7b5fcf;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.login-box button:hover {
    background: #9a7cff;
}

.login-box button:active {
    transform: scale(0.97);
}

/* ERROR */
.error {
    margin-top: 10px;
    color: #ff6b6b;
    font-size: 13px;
}

/* FOOTER */
.footer {
    margin-top: 15px;
    font-size: 11px;
    color: #aaa;
}
</style>

</head>
<body>

<div class="login-box">

    <!-- LOGO -->
    <img src="logo.png" class="logo" alt="Logo">

    <!-- TITLE -->
    <div class="title">ROOM ALLOTMENT SYSTEM</div>

    <!-- SUBTITLE -->
    <div class="subtitle">Admin Access Only</div>

    <!-- FORM -->
    <form method="post">
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">LOGIN</button>
    </form>

    <!-- ERROR -->
    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

    <!-- FOOTER -->
    <div class="footer">© Room Allotment System</div>

</div>

</body>
</html>