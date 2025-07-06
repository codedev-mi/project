<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin-login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2 style="text-align:center;">Welcome, Admin!</h2>
<div class="dashboard-links">
    <a href="view-orders.php">📦 Manage Orders</a><br>
    <a href="view-reservations.php">📋 Manage Reservations</a><br>
    <a href="view-payments.php">💳 Manage Payments</a><br>
    <a href="admin-logout.php">🚪 Logout</a>
</div>
</body>
</html>
