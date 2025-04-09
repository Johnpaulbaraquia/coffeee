<?php
include 'config.php';
$result = $conn->query("SELECT * FROM products");
?>
<?php
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <?php include 'navbarr.php'; ?>
    <div class="product-list">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p>Price: ₱<?php echo $row['price']; ?></p>
                <form action="add_to_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        <input type="number" name="quantity" value="1" min="1"><br><br>
         <button type="submit">Add to Cart</button>
</form>
            </div>
        <?php } ?>
    </div>
</body>
</html>
