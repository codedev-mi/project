<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $product = mysqli_real_escape_string($conn, $item['name']);
            $quantity = (int)$item['quantity'];
            $total_price = (float)$item['price'] * $quantity;

            $sql = "INSERT INTO purchases (customer_name, product, quantity, total_price, purchase_date)
                    VALUES ('$customer_name', '$product', $quantity, $total_price, NOW())";
            mysqli_query($conn, $sql);
            if (!mysqli_query($conn, $sql)) {
    echo "Error: " . mysqli_error($conn);
}

        }

        unset($_SESSION['cart']); // clear the cart
        echo "<h2>Purchase completed successfully!</h2>";
        echo "<a href='index.html'>Continue Shopping</a>";
    } else {
        echo "<h2>Your cart is empty!</h2>";
    }
} else {
    // Display form to enter customer name
    echo '<h2>Enter Your Name to Complete Purchase</h2>';
    echo '<form method="POST" action="checkout.php">';
    echo 'Name: <input type="text" name="customer_name" required />';
    echo '<button type="submit">Checkout</button>';
    echo '</form>';
}
?>
