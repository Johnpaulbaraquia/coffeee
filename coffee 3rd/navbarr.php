<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dana's Coffee shop</title>   
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> -->
     
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #f8f5f2;
            color: #333;
            background: url('../images/BG\ POGI.jpg') no-repeat center center/cover;

        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px; 
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 0; 
        }
        .hero img {
            width: 1000px;
            height: 1000px;
            border-radius: 20px;
        }
        .hero-content {
            max-width: 500px;
        }
        .hero h1 {
            font-size: 2.5rem;
            font-weight: 600;
        }
        .hero p {
            margin: 10px 0 20px;
        }
        .btn {
            background: #d99152;
            color: white; 
            padding: 10px;
            border: none;
            cursor: pointer; 
            font-weight: 600;
            border-radius: 5px;
        }
        .products {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 50px 0;
            border-radius: 10px;
        }
        .product {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .product img {
            width: 150px;
            margin-bottom: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header class="container">
        <h2>☕ DANA'S COFFEE</h2>
        <nav>
            <a href="./menu.php">Menu</a>
            <a href="./contact.php">Contact</a>
            <a href="#">About Us</a>
        </nav>

        <script src="https://kit.fontawesome.com/YOUR_FA_KIT.js" crossorigin="anonymous"></script>
    <style>
        .auth-menu {
            position: relative;
            display: inline-block;
        }

        .auth-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .auth-dropdown {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 120px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1;
            right: 0;
            border-radius: 5px;
        }

        .auth-dropdown a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        .auth-dropdown a:hover {
            background-color: #f1f1f1;
        }

        .auth-menu:hover .auth-dropdown {
            display: block;
        }
        .icon{
            height: 40px;
        }
    </style>
</head>
<body>

<div class="auth-menu">
    <i class="fa-solid fa-user auth-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="10" r="3"></circle><path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path></svg></i> 
    <div class="auth-dropdown">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="./logout.php">Logout</a>
    </div>
</div>
    </header>
    <section class="hero container">
        <div class="hero-content">
            <h1>FRAPPE</h1>
            <p>The Perfect Ice Cappuccino Bliss! caramel sugar, and a drizzle of caramel for the ultimate Frappuccino.</p>
            <a href="checkout.php" class="btn">ORDER NOW</a>
        </div>
        <img src="./images/new bg.png" alt="Frappe">
    </section>
    
    <section class="products container">
        <div class="product">
            <img src="./images/How to Make a Latte.jpg" alt="latte">
            <h3>Latte</h3>
            <p>5.0 ⭐</p>
        </div>
        <div class="product">
            <img src="./images/download (2).jpg" alt="Americano">
            <h3>Americano</h3>
            <p>4.7 ⭐</p>
        </div>
        <div class="product">
            <img src="./images/Homemade-iced-coffee-1200-1200.jpg" alt="ice coffee">
            <h3>Ice Coffee</h3>
            <p>4.9 ⭐</p>
        </div>
    </section>
</body>
</html>
