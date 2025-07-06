<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.html");
    exit;
}

include 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Today's Purchases</title>
  <link rel="stylesheet" href="admin-style.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fafafa;
    }
    h2 {
      text-align: center;
      margin-top: 30px;
    }
    .container {
      width: 90%;
      max-width: 900px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      padding: 10px;
      background-color: #f7f7f7;
      border-bottom: 1px solid #ddd;
      font-size: 16px;
    }
    li:nth-child(even) {
      background-color: #eaeaea;
    }
    a.back-link {
      display: inline-block;
      margin-top: 20px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }
    a.back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Today's Purchase History</h2>
    <ul>
      <?php
      $sql = "SELECT * FROM purchases WHERE purchase_date >= NOW() - INTERVAL 1 DAY ORDER BY purchase_date DESC";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<li>";
                  echo htmlspecialchars($row['customer_name']) . " bought " . 
                       htmlspecialchars($row['quantity']) . " × " . 
                       htmlspecialchars($row['product']) . 
                       " for ₹" . htmlspecialchars($row['total_price']) . 
                       " at " . htmlspecialchars($row['purchase_date']);
                  echo "</li>";
              }
          } else {
              echo "<li>No purchases made in the last 24 hours.</li>";
          }
      } else {
          echo "<li>Query error: " . htmlspecialchars(mysqli_error($conn)) . "</li>";
      }

      // Close connection safely
      mysqli_close($conn);
      ?>
    </ul>
    <a href="admin-dashboard.php" class="back-link">⬅ Back to Admin Panel</a>
  </div>
</body>
</html>
