<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "frosty_db";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all POST fields are set
if (
    isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) &&
    isset($_POST['reserve_date']) && isset($_POST['time']) && isset($_POST['seats'])
) {
    // Get and sanitize input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $reserve_date = $_POST['reserve_date'];
    $time = $_POST['time'];
    $seats = (int)$_POST['seats'];

    // Check for empty values after trimming
    if ($name === '' || $email === '' || $phone === '' || $reserve_date === '' || $time === '' || $seats <= 0) {
        echo "All fields are required.";
        exit();
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO reservation (name, email, phone, reserve_date, time, seats) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $name, $email, $phone, $reserve_date, $time, $seats);

    if ($stmt->execute()) {
        echo "<script>alert('Reservation successful!'); window.location.href='book-table.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "All fields are required.";
}

$conn->close();
?>
