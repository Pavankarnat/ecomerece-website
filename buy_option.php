<!-- buy_option.php -->
<?php
session_start();

if (!isset($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit();
}

$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buy Options</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <?php foreach ($cart as $product_id => $product): ?>
            <li>
                <?php echo htmlspecialchars($product['name']); ?> - $<?php echo htmlspecialchars($product['price']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Buy Options</h2>
    <form action="checkout.php" method="post">
        <!-- Include payment options, shipping details, etc. -->
        <button type="submit">Proceed to Checkout</button>
    </form>
</body>
</html>
