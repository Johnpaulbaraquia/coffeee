<?php

include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; // Fix: Match input field name
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (full_name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($query)) {
        echo "<script>alert('Registration Successful! You can now login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - Coffee Shop</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="FullName" placeholder="FullName" required><br><br>
            <input type="email" name="email" placeholder="Enter Email" required><br><br>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>
            <button type="login.php">Register</button>
           
        </form>
        <p>Already an Account?<a href="./login.php">Login here!</a></p>
    </div>
</body>
</html>
