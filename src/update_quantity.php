<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['action'])) {
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$productId])) {
        switch ($action) {
            case 'increase':
                $_SESSION['cart'][$productId]++;
                break;
            case 'decrease':
                if ($_SESSION['cart'][$productId] > 1) {
                    $_SESSION['cart'][$productId]--;
                } else {
                    unset($_SESSION['cart'][$productId]);
                }
                break;
            default:
                break;
        }
    }
}

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
