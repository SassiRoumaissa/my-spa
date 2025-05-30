<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST["name"] ?? '';
    $email   = $_POST["email"] ?? 'noreply@example.com';
    $phone   = $_POST["phone"] ?? '';
    $subject = $_POST["subject"] ?? 'Appointment Request';
    $date    = $_POST["date"] ?? '';
    $msg     = $_POST["message"] ?? '';

    $fullMessage = "Name: $name\nPhone: $phone\nDate: $date\n\nMessage:\n$msg";

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'roumaissasassi8@gmail.com';
        $mail->Password   = 'zfgfogdgaftaveki'; // تأكدي من استخدام كلمة مرور التطبيقات
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('roumaissasassi8@gmail.com');
        $mail->Subject = $subject;
        $mail->Body    = $fullMessage;

        $mail->send();

        echo '
        <div id="success-message">✔️ تم الحجز بنجاح</div>
        <style>
        #success-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(238, 115, 222, 0.26);
            color: #36073d;
            padding: 20px 40px;
            border-radius: 8px;
            font-size: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            z-index: 9999;
        }
        </style>
        <script>
        setTimeout(() => {
            document.getElementById("success-message").style.display = "none";
        }, 5000);
        </script>
        ';
    } catch (Exception $e) {
        echo "❌ فشل في إرسال الموعد: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>For Couples</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Great+Vibes&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/forhim.css">
</head>
<body>

  <header class="header">
    <img src="../images/logoSpa.png" alt="Spa Logo" style="width: auto;height: 300px;" class="logo">
    <nav class="info">
      <a href="index.php">Home</a>
      <a href="../html/services.html">Services</a>
      <a href="../html/blog.html">Blog</a>
      <a href="../html/shop.html">Shop</a>
      <a href="contact.php">Contacts</a>
    </nav>
    <nav class="icons">
      <a href="../html/cart.html"><i class="fas fa-shopping-cart"></i></a>
      <a href="../html/fav.html"><i class="fas fa-heart"></i></a>
      <a href="#"><i class="fas fa-user"></i></a>
    </nav>
  </header>

  <section class="shop-title">
    <div class="overlay"></div>
    <h1>Services / For Married </h1>
  </section>

  <section class="services">
    <div class="service-card">
      <i class="fas fa-spa"></i>
      <h2>Couple’s Massage</h2>
      <p>Relax together with a soothing massage designed for two.</p>
    </div>
  
    <div class="service-card">
      <i class="fas fa-water"></i>
      <h2>Jacuzzi for Two</h2>
      <p>Enjoy a private jacuzzi experience with your loved one.</p>
    </div>
  
    <div class="service-card">
      <i class="fas fa-heart"></i>
      <h2>Romantic Spa Package</h2>
      <p>Unforgettable romantic treatments crafted for couples.</p>
    </div>
  
    <div class="service-card">
      <i class="fas fa-smile-beam"></i>
      <h2>Facial & Relaxation</h2>
      <p>Indulge in a rejuvenating facial followed by deep relaxation.</p>
    </div>
  </section>
  

  <!-- Booking Section -->
  <section class="booking">
    <h2>Book Your Appointment</h2>
    <form id="bookingForm" method="POST" action="">
  <input type="text" id="name" name="name" placeholder="Your Name" required>
  <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
  <select id="service" name="subject" required>
    <option value="">Select Service</option>
    <option value="Men’s Facial">Men’s Facial</option>
    <option value="Haircut & Beard Trim">Haircut & Beard Trim</option>
    <option value="Back Massage">Back Massage</option>
    <option value="Body Waxing">Body Waxing</option>
  </select>
  <input type="date" id="date" name="date" required>
  
  
  <button type="submit">Book Now</button>
</form>
    <p id="confirmation" class="hidden">Thank you! We’ll contact you soon.</p>
  </section>

 

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-column">
        <img class="logo" src="../images/logoSpa.png" style="margin-top: -170px;width:auto;margin-left: -140px;" alt="ROUMI Logo">
        <p style="margin-top: -170px;" class="desc">
          Relax. Rejuvenate. Repeat.<br>
          Discover the ultimate spa experience that awakens your senses and soothes your soul.
        </p>
        <div style="margin-top: 30px;" class="social-icons">
          <i class="fab fa-twitter"></i>
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-youtube"></i>
        </div>
      </div>

      <div class="footer-column">
        
        <h3>Contact</h3>
        <p><i class="fas fa-map-marker-alt"></i> bab elzouer,djorf</p> 
        <p><i  class="fas fa-envelope"></i>roumaissasassi8@gmail.com</p>
        <p><i class="fas fa-phone"></i> +213 674668185</p>
      </div>

      <div class="footer-column">
        <h3>Services</h3>
        <ul>
          <li>Stone Massage</li>
          <li>Aromatherapy</li>
          <li>Waxing</li>
          <li>Body Wraps</li>
          <li>Facials</li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Latest Posts</h3>
        <div class="post">
          <img src="../images/image-8-150x150-140x140.jpg" alt="">
          <div>
            <p class="post-title">Spa Rituals for Home</p>
            <p class="post-date">11 Apr, 2024</p>
          </div>
        </div>
        <div class="post">
          <img src="../images/image-9-150x150-140x140.jpg" alt="">
          <div>
            <p class="post-title">Aromatherapy Secrets</p>
            <p class="post-date">10 Apr, 2024</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div style="margin-top: -2px;" class="footer-bottom">
    <p>© 2025 ROUMI SPA & Wellness Center. All Rights Reserved.</p>
  </div>

</body>
</html>
