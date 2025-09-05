<?php
// Database connection settings
$host = 'localhost';
$dbname = 'frosty_delights'; // make sure this database exists
$username = 'root'; // default XAMPP username
$password = '';     // default XAMPP password (empty)

// Capture form data safely
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Basic validation
if (empty($name) || empty($email) || empty($message)) {
    die("Please fill in all fields.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert message into database
    $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    // Success message with Return link
    echo "<h2>✅ Thank you for contacting us, " . htmlspecialchars($name) . "!</h2>";
    echo "<p>Your message has been received. We'll get back to you soon.</p>";
    echo "<a href='index.html' style='
        display:inline-block;
        padding:10px 20px;
        background:#c00b34;
        color:#fff;
        text-decoration:none;
        border-radius:5px;
        font-weight:bold;
    '>Return to Home</a>";

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>
