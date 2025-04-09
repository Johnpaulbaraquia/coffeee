<?php
session_start();
include '../config.php';

// ✅ Redirect if admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// ✅ Check if 'created_at' column exists before using it
$check_column = $conn->query("SHOW COLUMNS FROM products LIKE 'created_at'");
if ($check_column->num_rows > 0) {
    $query = "SELECT * FROM products ORDER BY created_at DESC";
} else {
    $query = "SELECT * FROM products";  // Fallback if 'created_at' is missing
}

$query = "SELECT * FROM products";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include 'admin_navbar.php'; ?>
    <br>
    <br>

    <div class="admin-content">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>Manage products, orders, and track payments from this panel.</p>

        <div class="admin-options">
            <a href="add_product.php" class="admin-card">➕ Add Product</a>
            <a href="orders.php" class="admin-card">📦 Manage Orders</a>
            <a href="./update_order_status.php" class="admin-card">👤 Manage Update</a>
            <a href="admin_settings.php" class="admin-card">⚙ Settings</a>
        </div>

        <h3>📌 Product List</h3>
        <table border="1">
        <tr>
    <th>Product Name</th>
    <th>Price</th>
    <?php if (isset($row['stock'])) { echo "<th>Stock</th>"; } ?>
    <th>Actions</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td>₱<?php echo isset($row['price']) ? number_format($row['price'], 2) : '0.00'; ?></td>
        <td><?php echo isset($row['stock']) ? $row['stock'] : 'N/A'; ?></td>
        <td>
            <a href="edit_product.php?id=<?php echo $row['id']; ?>">✏ Edit</a> |
            <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">🗑 Delete</a>
        </td>
    </tr>
<?php } ?>

        </table>
    </div>
</body>
</html>
