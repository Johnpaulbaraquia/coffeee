<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_date DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Tracking</title>
    <link rel="stylesheet" href="./css/tracking.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <h2>Your Orders</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Proof of Payment</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if ($row['gcash_screenshot']) { ?>
                            <a href="uploads/<?php echo $row['gcash_screenshot']; ?>" target="_blank">View</a>
                        <?php } else { ?>
                            N/A
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
