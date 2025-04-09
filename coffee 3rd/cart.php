<?php
session_start();
include 'config.php';

// Remove item from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Update quantity
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['quantities'] as $id => $qty) {
        $_SESSION['cart'][$id]['quantity'] = $qty;
    }
}

// Get products from session
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="content">
        <h2>Your Cart</h2>
        <?php if (empty($cart_items)) { ?>
            <p>Your cart is empty.</p>
        <?php } else { ?>
            <form method="POST">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <?php $total_price = 0; ?>
                    <?php foreach ($cart_items as $id => $item) { ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td>₱<?php echo $item['price']; ?></td>
                            <td>
                                <input type="number" name="quantities[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
                            </td>
                            <td>₱<?php echo $item['price'] * $item['quantity']; ?></td>
                            <td>
                                <a href="cart.php?remove=<?php echo $id; ?>">Remove</a>
                            </td>
                        </tr>
                        <?php $total_price += $item['price'] * $item['quantity']; ?>
                    <?php } ?>
                </table>
                <p><strong>Total: ₱<?php echo $total_price; ?></strong></p>
                <button type="submit">Update Cart</button>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
            </form>
        <?php } ?>
    </div>
</body>
</html>
