<?php
session_start();
include 'db.php';

if(isset($_POST['admin_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded admin login (or you can query an admin table)
    if($username == 'admin' && $password == 'admin123'){
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $error = "Invalid admin credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2 style="text-align:center;">Admin Login</h2>
<div class="login-container">
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit" name="admin_login">Login</button>
    </form>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
</body>
</html>
