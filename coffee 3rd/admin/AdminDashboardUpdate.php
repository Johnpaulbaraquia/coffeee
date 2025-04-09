
<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
    exit();
}
?>
<?php include 'admin_navbar.php'; ?>
<h2>Admin Dashboard</h2>
<link rel="stylesheet" href="../css/admin.css">
<a href="orders.php">📦 Manage Orders</a>
