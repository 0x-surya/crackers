<?php
session_start();
include "./includes/db.php";

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantities = $_POST['quantity'];
    $totals = $_POST['total'];

    foreach ($quantities as $productId => $quantity) {
        if ($quantity > 0) {
            // Fetch product details
            $qur = "SELECT * FROM `spl_product` WHERE `id` = " . intval($productId);
            $res = mysqli_query($con, $qur);
            $product = mysqli_fetch_assoc($res);

            // Add or update the product in the cart
            $_SESSION['cart'][$productId] = array(
                'name' => $product['name'],
                'price' => $product['amount'],
                'quantity' => $quantity,
                'total' => $product['amount'] * $quantity
            );
        } else {
            // Remove product from cart if quantity is 0
            unset($_SESSION['cart'][$productId]);
        }
    }

    // Redirect or output a response
    header("Location: your_cart_page.php");
    exit;
}
