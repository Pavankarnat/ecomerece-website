<!-- checkout.php -->
<?php
session_start();

if (!isset($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit();
}

// Here you would process the payment and order

// Clear the cart after successful checkout
unset($_SESSION['cart']);

echo "Thank you for your purchase!";
?>
