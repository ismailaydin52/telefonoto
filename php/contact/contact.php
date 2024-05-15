<!--Telefonlar tablosuna bağlanır.-->
<?php
$host = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "telefon_otomasyon";
$tablo = "telefon";
$connection = mysqli_connect($host, $kullanici, $sifre);
if($connection){
    
}else{
    echo "Veri tabanına bağlanamadık...";
}
@mysqli_select_db($connection, $veritabani) or die("Veri tabanına bağlanamadık...");
?>