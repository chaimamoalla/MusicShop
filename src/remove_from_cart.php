<?php

session_start();

if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    if(isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Product not found in cart.";
    }
} else {
    echo "Product ID not received.";
}
?>
