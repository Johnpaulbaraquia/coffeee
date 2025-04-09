<?php
session_start();
include '../config.php';

// ✅ Redirect if admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// ✅ Check if order ID is provided
if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']); // Convert to integer to prevent SQL injection

    // ✅ Delete order from the database
    $delete_query = "DELETE FROM order_items WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $order_id);
    
    if ($stmt->execute()) {
        // ✅ Redirect back to the manage orders page after deletion
        header("Location: orders.php?message=Order Deleted Successfully");
        exit();
    } else {
        echo "Error deleting order: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid order ID.";
}

$conn->close();
?>
