<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "images/".$image);

    $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Coffee</title>
</head>
<body>
    <h2>Add a New Coffee</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Coffee Name" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="file" name="image" required>
        <button type="submit">Add Coffee</button>
    </form>
</body>
</html>
