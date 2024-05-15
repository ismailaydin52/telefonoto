<?php
session_start();
// Kullanıcı bilgilerini al
$email = $_POST['email'];
$sifre = $_POST['password'];

// Veritabanı bağlantısı
$servername = "localhost"; // Veritabanı sunucusu (genellikle localhost)
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "telefon_otomasyon"; // Kullanılacak veritabanı adı

// Veritabanı bağlantısını oluştur
$connection = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($connection->connect_error) {
    die("Veritabanı bağlantısında hata: " . $connection->connect_error);
}

// Kullanıcıyı sorgula
$sql = "SELECT hesap_tipi, musteri_id FROM kullanici WHERE email='$email' AND sifre='$sifre'";
$result = $connection->query($sql);

$sessiongiris = "SELECT * FROM kullanici WHERE email='$email' AND sifre='$sifre";
$sessionsonuc = $connection->query($sessiongiris);

echo "hata";
if ($sessionsonuc) {
    while ($row = $sessionsonuc->fetch_assoc()) {
        $hesap_tipi = $row["hesap_tipi"];
        $id = $row["musteri_id"];
        $isim = $row["ad"];
        $soyisim = $row["soyad"];
        $email = $row["email"];
        $sifre = $row["sifre"];
        $dogum_gunu = $row["dogum_gunu"];
        $adres = $row["adres"];

        // Process each row here
    }
} else {
    // Handle the case where the query failed
    echo "Error executing query: " . $mysqli->error;
}




// Kullanıcı var mı kontrol et
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Her satırı işle
        $hesap_tipi = $row["hesap_tipi"];
        $id = $row["musteri_id"];

        if ($hesap_tipi == "müsteri") {
            header("Location: ../home/home.php?id=$id");
            exit();
        } elseif ($hesap_tipi == "bayi") {
            header("Location: ../users/bayi_yonetim/bayi_islem/bayi_bilgi.php?id=$id");
            exit();
        } elseif ($hesap_tipi == "admin") {
            header("Location: ../users/master_admin/urun_islem/urun_gor.php?id=$id");
            exit();
        } else {
            echo "<script>alert('Bu hesap herhangi bir hesap tipiyle uyuşmamaktadır.');</script>";
            echo "<script>setTimeout(function() { window.location.href = '../login/login.php'; }, );</script>";
            exit();
        }
    }
} 





else {
    // Giriş başarısız ise, kullanıcıyı tekrar giriş sayfasına yönlendir
    echo "<script>alert('Hatalı Giriş!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '../login/login.php'; }, );</script>";
    exit();
}

// Veritabanı bağlantısını kapat
$connection->close();
?>
