<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fetch cart from session
$cart = $_SESSION['cart'];

// Set content type to JSON
header('Content-Type: application/json');

// Output JSON encoded cart data
echo json_encode($cart);
