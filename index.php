<?php
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
    <title>roumiSPA</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="../js/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Great+Vibes&display=swap" rel="stylesheet">

</head>
<body>
   <div class="h-page1">
    <header class="header">
        <img src="../images/logoSpa.png" alt="Spa Logo" style="width: auto;height: 300px;" class="logo">
        <nav class="info">
            <a href="#">Home</a>
            <a href="../html/services.html">Services</a>
            <a href="../html/blog.html">Blog</a>
           
            <a href="../html/shop.html">Shop</a>
            <a href="contact.php">Contacts</a>
        </nav>
        <nav class="icons">
          <a href="../html/cart.html"><i class="fas fa-shopping-cart"></i> </a>
          <a href="../html/fav.html"><i class="fas fa-heart"></i> </a>
          <a href="#"><i class="fas fa-user"></i> </a>
        </nav>
      </header>
    <div class="text-des">
        <p id="text" style="font-family:'Great Vibes', cursive;"></p>
        <h1 id="des"></h1>
    </div>
    <div class="btn">
     <a style="text-decoration: none; " href="contact.php"> <button class="contact-btn">Contact Us </button></a>
      <a style="text-decoration: none;" href="../html/services.html"> <button class="des-btn">Read More  </button></a>
   </div></div>
  
   

   <div class="categories">
    <div class="cat">
      <img src="../images/gallery-spa-6.jpg" alt="For Her">
      <div class="cat-overlay">
        <h1>FOR<br>HER</h1>
        <a href="forher.php" class="cat-btn">View Services</a>
      </div>
    </div>
  
    <div class="cat">
      <img src="../images/him.jpg" alt="For Him">
      <div class="cat-overlay">
        <h1>FOR<br>HIM</h1>
        <a href="forhim.php" class="cat-btn">View Services</a>
      </div>
    </div>
  
    <div class="cat">
      <img src="../images/gallery-spa-4.jpg" alt="For Couple">
      <div class="cat-overlay">
        <h1>For <br> Married</h1>
        <a href="forcouple.php" class="cat-btn">View Services</a>
      </div>
    </div>
  </div>
  

    
  
   
  </div>
  
     
     <div class="h-page2">
        <div class="ourphilosophy">
            <h1>Our Philosophy</h1>
            <p>At Wellness & Beauty Spa, we believe real beauty comes from inner balance. We offer a calm space where body, mind, and soul reconnect.</p>
            <p>Our treatments enhance natural beauty, restore energy, and provide deep relaxation using natural products and expert care.</p>
            <ul>
                <li><span>✔</span> Personalized care</li>
                <li><span>✔</span>Natural, high-quality products.</li>
                <li><span>✔</span> Skilled wellness therapists</li>
            </ul>
            <div class="btn-ph">
               <a  style="text-decoration: none;" href="../html/services.html"><button class="des-btn2">Read More</button></a> 
               <a style="text-decoration: none;" href="contact.php"> <button class="contact-btn2"> Contact Us <span>→</span></button></a>
            </div>
       
     </div> </div>
     <div class="h-page3">
        <h1>Our Services</h1>
        <p> "Discover a world of relaxation and beauty with our specialized spa <br> <br>From soothing massages to revitalizing facials,<br> <br>we offer a range of services designed to enhance your well-being and rejuvenate your body and mind."</p>
        <div class="boxes">

            <div class="box"> <img src="../images/icon-1.png" alt="">
                <h1>Facials</h1>
                <p>Skin rejuvenation and glow.</p>

            </div>
            <div class="box">
                <img src="../images/icon-2-.png" alt="">
                <h1>Body Treatments</h1>
                <p>Complete body care.</p>  
            </div>
            <div class="box">
                <img src="../images/icon-3-.png" alt="">
                <h1>Waxing</h1>
                <p> Effective hair removal.</p>
            </div>
            <div class="box"> 
                <img src="../images/icon-4-.png" alt="">
                <h1>Massage  </h1>
                <p>Relaxation and stress relief.</p></div>
                <div class="box">
                    <img src="../images/icon-5-.png" alt="">
                    <h1>Finishing Touches</h1>
                    <p>Final beauty enhancements.</p>
                </div>
            <div class="box">
                <img src="../images/icon-6-.png" alt="">
                <h1>Hands & Feet </h1>
                <p>Nail and skin care.</p>
            </div>
            <div class="box">
                <img src="../images/icon-7-.png" alt="">
                <h1>Tea Therapy</h1>
                <p> Relaxation with tea extracts.</p>
            </div>
            <div class="box">
                <img src="../images/icon-8-.png" alt="">
                <h1>Aroma Therapy</h1>
                <p>Soothing scent-based healing.</p>
            </div>
        </div>
     </div>
     <div class="h-page4">
        <div class="appointment-form">
            <h1>Make an Appointment</h1>
            <p>"Indulge in pure relaxation at our spa, where wellness and serenity await you."</p>
            <form action="index.php" method="POST"> 
              <label for="name">Name</label>
              <input type="text" name="name" id="name" required placeholder="Enter your name">
          
              <label for="phone">Phone</label>
              <input type="tel" name="phone" id="phone" required placeholder="Enter your phone number">
          
              <label for="facials">Service</label>
              <input type="text" name="subject" id="facials" required placeholder="Select facial type">
          
              <label for="date">Date</label>
              <input type="date" name="date" id="date" required>
          
              <label for="message">Message</label>
              <textarea name="message" id="message" rows="4" placeholder="Your message"></textarea>
          
              <input type="hidden" name="email" value="client@domain.com"><!-- حقل خفي لإرسال بريد -->
              <button style="cursor:pointer" type="submit">Book Now</button>
          </form>
          
        </div>
        <div class="opening-hours">
            <h2>Opening Hours</h2>
            <p><strong>Monday to Friday:</strong> 09:00 am - 08:00 pm</p>
            <p><strong>Saturday:</strong> 09:00 am - 08:00 pm</p>
            <p><strong>Sunday:</strong> 09:00 am - 08:00 pm</p>
            <p>Check out seasonal discounts for registered users.</p>
        </div>
    </div>
   
    <footer class="footer">
      <div class="footer-container">
    
       
        <div class="footer-column">
          <img class="logo" src="../images/logoSpa.png" style="margin-top: -170px;width:auto;margin-left: -140px;" alt="ROUMI Logo">
          <p  style="margin-top: -170px;" class="desc">
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
    
       
        <div class="footer-column" >
          <h3>Contact</h3>
          <p><i class="fas fa-map-marker-alt"></i> bab elzouer,djorf</p> 
          <p><i  class="fas fa-envelope"></i> roumaissasassi8@gmail.com</p>
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
    
    <div  style="margin-top: -2px;" class="footer-bottom">
      <p>© 2025 ROUMI SPA & Wellness Center. All Rights Reserved.</p>
    </div>
   
    
    
</html>
