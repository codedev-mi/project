<?php
$host     = getenv('DB_HOST') ?: '127.0.0.1';
$dbname   = getenv('DB_NAME') ?: 'frosty_delights';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';  

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage());
}
?>
