<?php
include '../config.php';

$result = $conn->query("
    SELECT order_items.id, products.name, order_items.quantity, 
           (order_items.quantity * order_items.price) AS total_price, 
           orders.order_date 
    FROM order_items 
    JOIN products ON order_items.product_id = products.id 
    JOIN orders ON order_items.order_id = orders.id 
    ORDER BY orders.order_date DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Manage Orders</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<?php include 'admin_navbar.php'; ?>

    <h1>Order Management</h1>
    <a href="./AdminDashboardUpdate.php">⬅ Back to Dashboard</a>
    <table border="1">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>₱<?php echo number_format($row['total_price'], 2); ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td>
                    <a href="delete_order.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
