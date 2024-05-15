<?php

session_start();
// Veritabanı bağlantısı ve gerekli diğer dosyaları include edin
$servername = "localhost"; // MySQL sunucusu
$username = "root"; // MySQL kullanıcı adı
$password = ""; // MySQL şifre
$database = "telefon_otomasyon"; // Kullanmak istediğiniz veritabanı adı

// MySQL bağlantısını oluşturun
$mysqli = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol edin
if ($mysqli->connect_error) {
    die("Veritabanı bağlantısında hata: " . $mysqli->connect_error);
}
$musteri_id = $_SESSION['id']; // id değerini al



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alın
    $isim = $_POST['register_name'];
    $soyisim = $_POST['register_surname'];
    $email = $_POST['register_email'];
    $sifre = $_POST['register_password'];
    $dogum_gunu = $_POST['register_birthday'];
    $adres = $_POST['register_adres'];

    // Güncelleme sorgusunu hazırlayın
    $query = "UPDATE kullanici SET ad=?, soyad=? ,email=?, sifre=?, dogum_gunu =?, adres=? WHERE musteri_id=?";

// Sorguyu hazırla
$stmt = $mysqli->prepare($query);

// Bağlayıcıları bağla
$stmt->bind_param("ssssssi", $isim,$soyisim,$email,$sifre,$dogum_gunu,$adres,$musteri_id);

// Sorguyu çalıştır
if ($stmt->execute()) {
    echo "Veri başarıyla güncellendi.";
} else {
    echo "Güncelleme sırasında hata oluştu: " . $stmt->error;
}

// MySQL bağlantısını kapat
$stmt->close();
   
    // Bağlantıyı kapatın

    $mysqli->close();
}
?>
