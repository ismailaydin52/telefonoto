<?php
$servername = "root@localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Veritabanına bağlantı sağlanamadı: " . mysqli_connect_error());
}
?>
