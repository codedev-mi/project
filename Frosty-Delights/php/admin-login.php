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
  <div class="admin-login-container">
  <div class="admin-login-box">
    <h2>Admin Login</h2>
    <form method="POST" action="admin-login.php">
      <div class="form-group">
        <input type="text" name="username" placeholder="Enter Username" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Enter Password" required>
      </div>
      <button type="submit">Login</button>
    </form>

    <a href="index.html" class="back-home-btn">⬅ Back to Home</a>
    
  </div>
</div>


</body>

</html>
