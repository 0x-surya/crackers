<?php
session_start(); // Start the session

// Check if the required POST variables are set
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Initialize the session array if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product already exists in the session cart based on the name
    $productExists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if (strcasecmp($item['name'], $productName) == 0) { // Compare names case-insensitively
            if ($quantity <= 0) {
                // Remove product if quantity is zero or less
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
            } else {
                // Update quantity and price if product already exists and quantity is positive
                $_SESSION['cart'][$key]['quantity'] = $quantity;
                $_SESSION['cart'][$key]['price'] = $productPrice;
                $_SESSION['cart'][$key]['totalprice'] = $productPrice * $quantity;
            }
            $productExists = true;
            break;
        }
    }

    // Add new product if not already in the session
    if (!$productExists && $quantity > 0) {
        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $quantity,
            'totalprice' => $productPrice * $quantity
        ];
    }

    // Respond with the updated session data
    echo json_encode($_SESSION['cart']);
} else {
    echo json_encode(['error' => 'Incomplete data received']);
}


if (isset($_GET['chechout'])) {
    header("Location: shop.php#checkout");
}
