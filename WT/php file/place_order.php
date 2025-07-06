<?php
session_start();

// Process order here if needed
// Example: Save order to database

// Clear the cart after placing the order
$_SESSION['cart'] = array();

// Redirect to cart page with 'clear' parameter to show empty cart
header("Location: cart.php?clear=1");
exit();
?>
