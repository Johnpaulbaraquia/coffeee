<?php
session_start();
include 'config.php';

// ✅ Redirect to login if user is NOT logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// ✅ User is logged in, proceed with checkout
$user_id = $_SESSION['user_id'];
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'];
    $gcash_screenshot = "";

    if ($payment_method == "GCash" && isset($_FILES['gcash_screenshot'])) {
        $gcash_screenshot = time() . "_" . $_FILES['gcash_screenshot']['name'];
        move_uploaded_file($_FILES['gcash_screenshot']['tmp_name'], "uploads/" . $gcash_screenshot);
    }

    $order_date = date('Y-m-d H:i:s');
    
    // ✅ Insert into orders table
    $conn->query("INSERT INTO orders (user_id, order_date, status, payment_method, gcash_screenshot) 
                  VALUES ('$user_id', '$order_date', 'Pending', '$payment_method', '$gcash_screenshot')");
    
    $order_id = $conn->insert_id;

    // ✅ Insert items into order_items table
    foreach ($cart_items as $id => $item) {
        $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) 
                      VALUES ('$order_id', '$id', '{$item['quantity']}', '{$item['price']}')");
    }

    // ✅ Clear cart after successful order
    unset($_SESSION['cart']);
    echo "<script>alert('Order Placed Successfully!'); window.location='order_tracking.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/tracking.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <h2>Checkout</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Select Payment Method:</label><br>
            <input type="radio" name="payment_method" value="COD" required> Cash on Delivery (COD)<br>
            <input type="radio" name="payment_method" value="GCash" required> GCash (Upload Payment Screenshot)<br>
            <input type="radio" name="payment_method" value="Dine-in" required> Dine-in<br>

            <div id="gcash_upload" style="display: none;">
                <label>Upload GCash Screenshot:</label>
                <input type="file" name="gcash_screenshot" accept="image/*">
            </div>

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('input[name="payment_method"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                document.getElementById('gcash_upload').style.display = this.value === 'GCash' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
