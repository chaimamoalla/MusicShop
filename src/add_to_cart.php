<?php

session_start();

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]++;
    } else {
        $_SESSION['cart'][$productId] = 1;
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    echo "Product ID not received.";
}
?>