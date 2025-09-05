<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin-login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #FFFBDA;
      margin: 0;
      padding: 0;
    }
    .dashboard-container {
      max-width: 600px;
      margin: 60px auto;
      padding: 30px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
      text-align: center;
    }
    h2 {
      color: #c00b34;
      margin-bottom: 25px;
    }
    .dashboard-links a {
      display: block;
      margin: 12px 0;
      padding: 12px;
      text-decoration: none;
      background: #c00b34;
      color: #fff;
      border-radius: 6px;
      font-weight: bold;
      transition: background 0.3s;
    }
    .dashboard-links a:hover {
      background: #a0092a;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <h2>Welcome, Admin! 👋</h2>
    <div class="dashboard-links">
      <a href="view-orders.php">📦 Manage Orders</a>
      <!-- <a href="view-reservations.php">📋 Manage Reservations</a> -->
      <a href="view-payments.php">💳 Manage Payments</a>
      <a href="view-messages.php">📩 View Contact Messages</a>
      <a href="admin-logout.php">🚪 Logout</a>
    </div>
  </div>

</body>
</html>
