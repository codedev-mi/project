<?php

session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin-login.php");
    exit();
}


$host = "localhost";
$username = "root";
$password = "";
$database = "frosty_db";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get today's date
$today = date("Y-m-d");

// Prepare the SQL query safely
$sql = "SELECT * FROM reservation WHERE reserve_date = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the date parameter
    $stmt->bind_param("s", $today);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    die("Failed to prepare SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Today's Reservations - Frosty Delights</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f2a6a6;
        }
        h1 {
            text-align: center;
            font-family: Arial, sans-serif;
            color: #d94e4e;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<h1>🍽️ Today's Reservations</h1>

<?php
if ($result && $result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reserve Date</th>
            <th>Time</th>
            <th>Seats</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['reserve_date']}</td>
            <td>{$row['time']}</td>
            <td>{$row['seats']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No reservations found for today.</p>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

</body>
</html>
