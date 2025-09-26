<?php
$host = getenv('localhost');
$dbname = getenv('frosty_delights');
$username = getenv('root');   // XAMPP default user
$password = getenv('');       // XAMPP default has no password

ry {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>
