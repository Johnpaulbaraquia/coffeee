<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$image);
        $conn->query("UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET name='$name', price='$price' WHERE id=$id");
    }

    header("Location: index.php");
}
?>

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h2>Edit Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        <input type="file" name="image">
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
