<?php
session_start();
include '../config.php';

// ✅ Redirect if admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// ✅ Check if product ID is provided
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);  // Convert to integer to prevent SQL injection

    // ✅ Delete product from the database
    $delete_query = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        // ✅ Redirect back to the admin dashboard after deletion
        header("Location: dashboard.php?message=Product Deleted Successfully");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid product ID.";
}

$conn->close();
?>
