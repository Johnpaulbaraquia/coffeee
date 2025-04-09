<?php
session_start();
include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "<script>alert('Login Successful!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Coffee Shop</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter Email" required><br><br>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>
            <button type="submit">Login</button>
           <!-- <button style="background-color: white;"> <a href="./register.php">Register</a></button>  -->
        </form>
        <p>Don't have an Account?<a href="./register.php">Register here!</a></p>

    </div>
</body>
</html>
