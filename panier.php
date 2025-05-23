<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = max(1, intval($_POST['quantity'])); // sécuriser la quantité

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Redirection vers le catalogue après ajout
header('Location: catalogue.php');
exit();
?>
