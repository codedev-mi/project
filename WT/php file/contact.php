<?php
// Database connection settings
$host = 'localhost';
$dbname = 'frosty_db'; // change to your actual DB name
$username = 'root'; // your DB username
$password = '';     // your DB password

// Capture form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Basic validation
if (empty($name) || empty($email) || empty($message)) {
    die("Please fill in all fields.");
}

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert message
    $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    echo "<h2>Thank you for contacting us, $name!</h2>";
    echo "<p>Your message has been received. We'll get back to you soon.</p>";
    echo '<a href="assignment3.html">Return to Home</a>';

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
