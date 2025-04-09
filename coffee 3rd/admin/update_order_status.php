<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $conn->query("UPDATE orders SET status='$status' WHERE id='$order_id'");
}

$result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Orders - Admin</title>
    <link rel="stylesheet" href="../css/management.css">
</head>
<body>
<?php include 'admin_navbar.php'; ?>
<br>
<br>


    <div class="admin-content">
        <h2>Manage Orders</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Date</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Proof of Payment</th>
                <th>Update</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if ($row['gcash_screenshot']) { ?>
                            <a href="../uploads/<?php echo $row['gcash_screenshot']; ?>" target="_blank">View</a>
                        <?php } else { ?>
                            N/A
                        <?php } ?>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                            <select name="status">
                                <option <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option <?php if ($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                                <option <?php if ($row['status'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
                            </select>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
