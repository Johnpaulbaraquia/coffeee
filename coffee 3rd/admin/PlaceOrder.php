<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
    $total_price = $product['price'] * $quantity;

    $conn->query("INSERT INTO orders (product_id, quantity, total_price, status) 
                  VALUES ($product_id, $quantity, $total_price, 'Pending')");

    echo "<h2>Order Successful! Your order is now Pending.</h2>";
    echo "<a href='index.php'>Back to Home</a>";
}
?>
