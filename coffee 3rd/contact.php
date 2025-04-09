
<?php include './navbar.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us - Coffee Shop</title>
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>

<section class="contact-section">
    <h2>Contact Us</h2>
    <p>We'd love to hear from you! Feel free to reach out through the form below or visit us at our location.</p>

    <div class="contact-container">
      
        <div class="contact-info">
            <h3>📍 Our Location</h3>
            <p>CX4R+63G, Bacoor, Cavite, Philippines</p>

            <h3>📞 Call Us</h3>
            <p>Wala muna AHHAA</p>

            <h3>📧 Email</h3>
            <p>Dana's@coffeeshop.com</p>

            <h3>🌍 Follow Us</h3>
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>

      
        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form action="contact_process.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>


    <div class="map-container">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7733.265401412601!2d120.961765!3d14.454081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf093fffe4ff%3A0x3714ae5f6d7bb32!2sBacoor%2C%20Cavite%2C%20Philippines!5e0!3m2!1sen!2sph!4v1711367890123"
        width="100%" height="300" allowfullscreen="" loading="lazy">
    </iframe>
</div>


</section>

</body>
</html>
