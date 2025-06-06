


<?php
include '../config.php'; // Ensure correct path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Handle Image Upload
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
    $conn->query($query);

    echo "<script>alert('Product Added Successfully!'); window.location='AdminDashboardUpdate.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product - Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<?php include 'admin_navbar.php'; ?>
<br>
<br>

    <div class="admin-content">
        <h2>Add Product</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" placeholder="Price" required>
            <input type="file" name="image" required>
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
