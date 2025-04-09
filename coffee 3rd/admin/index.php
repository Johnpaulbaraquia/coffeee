<?php
include '../config.php';
$result = $conn->query("SELECT * FROM products");
?>

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<?php include 'admin_navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1> Manage Products</h1>
    <a href="add_product.php">+ Add New Product</a>
    <table border="1">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><img src="../images/<?php echo $row['image']; ?>" width="50"></td>
                <td><?php echo $row['name']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
