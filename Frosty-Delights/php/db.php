<?php
$host = "localhost";
$dbname = "frosty_delights";
$username = "root";   // XAMPP default user
$password = "";       // XAMPP default has no password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>
