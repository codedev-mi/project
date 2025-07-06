<?php
session_start();

if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(isset($_POST['item_name'])){
    $item = $_POST['item_name'];
    $_SESSION['cart'][] = $item;
}

header("Location: cart.php");
exit();
?>
