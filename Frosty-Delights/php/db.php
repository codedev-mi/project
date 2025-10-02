<?php
$host     = getenv('localhost');   
$dbname   = getenv('frosty_delights');  
$username = getenv('root');   
$password = getenv('');   
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage());
}
?>

