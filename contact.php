<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$messageSent = false; // تعريف مبدئي

// تضمين الملفات
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST["name"] ?? '';
    $email   = $_POST["email"] ?? '';
    $phone   = $_POST["phone"] ?? '';
    $subject = $_POST["subject"] ?? '';
    $msg     = $_POST["message"] ?? '';

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2; // تبقي التصحيح مفعّل
    $mail->Debugoutput = function($str, $level) {
        // تجاهل الطباعة للصفحة
        // يمكنك أيضًا حفظها في ملف إذا أردت
    };
    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'roumaissasassi8@gmail.com';
      $mail->Password = 'zfgfogdgaftaveki';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom($email, $name);
      $mail->addAddress('roumaissasassi8@gmail.com');
      $mail->isHTML(false);
      $mail->Subject = $subject;
      $mail->Body = "From: $name\nEmail: $email\nPhone: $phone\n\n$msg";

      $mail->send();
      $messageSent = true;

      // ✅ طباعة رسالة النجاح في وسط الصفحة مع إخفائها بعد 5 ثوانٍ
      echo '
      <div id="success-message">✔️ تم الإرسال بنجاح</div>
      <style>
      #success-message {
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color:rgba(238, 115, 222, 0.26);
          color:#36073d;
          padding: 20px 40px;
          border-radius: 8px;
          font-size: 20px;
          box-shadow: 0 0 10px rgba(0,0,0,0.3);
          z-index: 9999;
      }
      </style>
      <script>
      setTimeout(() => {
          const msg = document.getElementById("success-message");
          if (msg) {
              msg.style.display = "none";
          }
      }, 5000);
      </script>
      ';
  } catch (Exception $e) {
      echo "❌ فشل في الإرسال: {$mail->ErrorInfo}";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/contact.css">
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
    <h1>Contact Us</h1>
</section>
<section class="contact-section">
    <!-- Top Info Icons -->
    <div class="contact-info">
        <div class="info-box">
            <div class="icon-circle"><i class="fas fa-envelope"></i></div>
            <h4>Email Address</h4>
            <p><br>roumaissasassi8@gmail.com<br>roumaissaspa@gmail.com</p>
        </div>
        <div class="info-box">
            <div class="icon-circle"><i class="fas fa-phone"></i></div>
            <h4>Phone Number</h4>
            <p><br>(213) 1234 3431<br>(213) 4578 9341</p>
        </div>
        <div class="info-box">
            <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
            <h4>Office Location</h4>
            <p><br>Victoria Street, alger, oran<br>River Street,alger, oran</p>
        </div>
        <div class="info-box">
            <div class="icon-circle"><i class="fas fa-clock"></i></div>
            <h4>Work Day</h4>
            <p><br>Sun - Fri: 09:00 - 17:00<br>Sat - Mon: 09:00 - 15:00</p>
        </div>
    </div>

    <!-- Contact Form and Image -->
    <div class="contact-content">
        <!-- رسالة النجاح عند الإرسال -->
        <?php if ($messageSent): ?>
            <div id="successMessage" class="success-message" style="color: green; font-weight: bold; margin-bottom: 10px;">Message Sent ✔</div>
        <?php endif; ?>

        <div class="form-box">
            <h2>Get In Touch With Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            <form action="contact.php" method="POST">
                <div class="form-row">
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form-row">
                    <input type="text" name="phone" placeholder="Phone Number">
                    <input type="text" name="subject" placeholder="Subject">
                </div>
                <textarea name="message" placeholder="Message"></textarea>
                <button type="submit">SEND MESSAGE</button>
            </form>
        </div>
        <div class="image-box">
            <img src="../images/review.jpg" alt="">
        </div>
    </div>
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
            <p><i class="fas fa-map-marker-alt"></i> bab elzouer, djorf</p>
            <p><i class="fas fa-envelope"></i> roumaissasassi8@gmail.com</p>
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

<div class="footer-bottom">
    <p>© 2025 ROUMI SPA & Wellness Center. All Rights Reserved.</p>
</div>

<script>
    // إذا كانت هناك رسالة نجاح، أخفيها بعد 3 ثوانٍ
    window.onload = function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 3000);  // 3000 ملي ثانية (3 ثوانٍ)
        }
    };
</script>

</body>
</html>
