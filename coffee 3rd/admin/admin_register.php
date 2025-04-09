<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Insert admin into database
    $sql = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql)) {
        echo "<script>alert('Admin Registered!'); window.location='admin_login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/log admin.css">
</head>
<body>
    <div class="form-container"></div>
    <form method="POST">
    <h2>Admin Registration</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <p>Already an admin? <a href="admin_login.php">Login here</a></p>

    </form>
    
</body>
</html>
