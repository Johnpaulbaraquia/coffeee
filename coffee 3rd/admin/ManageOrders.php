<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

$result = $conn->query("SELECT orders.id, products.name, orders.quantity, orders.total_price, orders.created_at, orders.status 
                        FROM orders 
                        JOIN products ON orders.product_id = products.id 
                        ORDER BY orders.created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Manage Orders</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Order Management</h1>
    <a href="index.php">⬅ Back to Dashboard</a>
    <table border="1">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>$<?php echo $row['total_price']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <form action="update_order_status.php" method="POST">
                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                        <select name="status" onchange="this.form.submit()">
                            <option value="Pending" <?php if($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                            <option value="Completed" <?php if($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                            <option value="Canceled" <?php if($row['status'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="delete_order.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
