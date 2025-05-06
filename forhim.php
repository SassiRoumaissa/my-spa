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
    <title>for him </title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Great+Vibes&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../css/forhim.css">
   <style>
 .slider-container {
  position: relative;
  margin-top: 15px;
  overflow: hidden;
  border-radius: 10px;
  height: 350px; /* 👈 هذا هو الارتفاع الثابت للسلايدر */
}

.slider {
  display: flex;
  transition: transform 0.5s ease;
  width: 100%;
  height: 100%; /* 👈 يأخذ كامل ارتفاع الكونتينر */
}

.slider img {
  width: 100%;
  height: 100%; /* 👈 يتم ضبط الصورة لتتناسب مع الكونتينر */
  object-fit: cover; /* 👈 يجعل الصورة تغطي المساحة بدون تشويه */
  flex-shrink: 0;
  border-radius: 20px;
  margin-top: 0; /* 👈 أزل الهامش لتوحيد الحجم */
}


/* Navigation Buttons */
.slider-container .prev,
.slider-container .next {
  position: absolute;
  top: 45%;
  transform: translateY(-50%);
  background-color: rgba(252, 178, 178, 0.5);
  color: white;
  border: none;
  padding: 10px 14px;
  cursor: pointer;
  border-radius: 50%;
  font-size: 18px;
}

.slider-container .prev { left: 10px; }
.slider-container .next { right: 10px; }

</style>
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
          <a href="../html/cart.html"><i class="fas fa-shopping-cart"></i> </a>
          <a href="../html/fav.html"><i class="fas fa-heart"></i> </a>
          <a href="#"><i class="fas fa-user"></i> </a>
        </nav>
      </header>
      <section class="shop-title">
        <div class="overlay"></div>
        <h1>Services/For Him</h1>
      </section>
      <section class="services">
  <div class="service-card" onclick="toggleSlider(this)">
    <i class="fas fa-user"></i>
    <h2>Men’s Facial</h2>
    <p>Refresh and hydrate your skin with a deep cleansing facial.</p>

    <div class="slider-container">
      <div class="slider">
        <img src="../images/mensfacial1.jpg" alt="Facial 1">
        <img src="../images/mensfacial2.jpg" alt="Facial 2">
        <img src="../images/mensfacial3.jpg" alt="Facial 3">
      </div>
      <button class="prev" onclick="prevSlide(event)">❮</button>
      <button class="next" onclick="nextSlide(event)">❯</button>
    </div>
  </div>

  <div class="service-card" onclick="toggleSlider(this)">
    <i class="fas fa-scissors"></i>
    <h2>Haircut & Beard Trim</h2>
    <p>Precision cuts and beard shaping for a polished look.</p>

    <div class="slider-container">
      <div class="slider">
        <img src="../images/haircut1.jpg" alt="Haircut 1">
        <img src="../images/haircut2.jpg" alt="Haircut 2">
        <img src="../images/haircut3.jpg" alt="Haircut 3">
      </div>
      <button class="prev" onclick="prevSlide(event)">❮</button>
      <button class="next" onclick="nextSlide(event)">❯</button>
    </div>
  </div>

  <div class="service-card" onclick="toggleSlider(this)">
    <i class="fas fa-hand-holding-heart"></i>
    <h2>Back Massage</h2>
    <p>Relieve tension with a therapeutic back massage.</p>

    <div class="slider-container">
      <div class="slider">
        <img src="../images/massage1.jpg" alt="Massage 1">
        <img src="../images/massage2.jpg" alt="Massage 2">
        <img src="../images/massage3.jpg" alt="Massage 3">
      </div>
      <button class="prev" onclick="prevSlide(event)">❮</button>
      <button class="next" onclick="nextSlide(event)">❯</button>
    </div>
  </div>

  <div class="service-card" onclick="toggleSlider(this)">
    <i class="fas fa-star"></i>
    <h2>Body Waxing</h2>
    <p>Smooth, clean finish for ultimate comfort and style.</p>

    <div class="slider-container">
      <div class="slider">
        <img src="../images/bodywax1.jpg" alt="Wax 1">
        <img src="../images/bodywax2.jpg" alt="Wax 2">
        <img src="../images/bodywax3.jpg" alt="Wax 3">
      </div>
      <button class="prev" onclick="prevSlide(event)">❮</button>
      <button class="next" onclick="nextSlide(event)">❯</button>
    </div>
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
      
      <div  style="margin-top: -2px;" class="footer-bottom">
        <p>© 2025 ROUMI SPA & Wellness Center. All Rights Reserved.</p>
      </div> 



      <script>
function toggleSlider(card) {
  card.classList.toggle("expanded");
  const slider = card.querySelector(".slider");
  slider.dataset.index = 0;
  slider.style.transform = "translateX(0%)";
}

function nextSlide(event) {
  event.stopPropagation();
  const slider = event.target.parentElement.querySelector(".slider");
  let index = parseInt(slider.dataset.index || "0");
  if (index < 2) index++;
  slider.dataset.index = index;
  slider.style.transform = `translateX(-${index * 100}%)`;
}

function prevSlide(event) {
  event.stopPropagation();
  const slider = event.target.parentElement.querySelector(".slider");
  let index = parseInt(slider.dataset.index || "0");
  if (index > 0) index--;
  slider.dataset.index = index;
  slider.style.transform = `translateX(-${index * 100}%)`;
}
</script>


</body>
</html>