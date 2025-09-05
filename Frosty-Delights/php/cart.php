<?php
session_start();

if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(isset($_GET['clear']) && $_GET['clear'] == '1'){
    $_SESSION['cart'] = array();
}

$cart_count = count($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Your Cart (<?php echo $cart_count; ?> items)</h1>

<?php
if($cart_count > 0){
    echo "<ul>";
    foreach($_SESSION['cart'] as $item){
        echo "<li>".$item."</li>";
    }
    echo "</ul>";

    // Order Button
    echo '<form action="place-order.php" method="post">
            <button type="submit">Place Order</button>
          </form>';
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

<a href="flavours.html" class="button">Back to Home</a>

</body>
</html>
