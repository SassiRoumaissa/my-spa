<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mon_site_db";

// الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Échec de connexion : " . $conn->connect_error);
}

// استقبال البيانات من النموذج
$name = $_POST['name'];
$adress = $_POST['address'];
$numero = $_POST['phone'];

// إدخال البيانات في الجدول
$sql = "INSERT INTO commande (name, adress, numero) 
        VALUES ('$name', '$adress', '$numero')";

if ($conn->query($sql) === TRUE) {
    header("Location: cart.html"); // ← إعادة التوجيه إلى cart.html
    exit();
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
