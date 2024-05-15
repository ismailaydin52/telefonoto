<?php 
include ("contact.php");

$query_telefonlar = mysqli_query($connection, 'SELECT * FROM telefon');
$query_ozellik = mysqli_query($connection, 'SELECT * FROM ozellik');

$telefon_data = array();
$ozellik_data = array();

while ($take = mysqli_fetch_array($query_ozellik)) {
    $ozellik = [
        "id" => $take["id"],
        "ram" => $take["ram"],
        "ekran_boyutu" => $take["ekran_boyutu"],
        "hafiza" => $take["hafiza"],
        "islemci" => $take["islemci"]
    ];
    $ozellik_data[] = $ozellik;
}

while ($take = mysqli_fetch_array($query_telefonlar)) {
    $telefon = [
        "telefon_id" => $take["telefon_id"],
        "marka"=> $take["marka"],
        "model"=> $take["model"],
        "fiyat"=> $take["fiyat"],
    ];
    $telefon_data[] = $telefon;
}

// Telefon ve özellik verilerini birleştirme
$telefon_ozellik = array();
foreach ($telefon_data as $key => $telefon) {
    $telefon_ozellik[$key] = array_merge($telefon, $ozellik_data[$key]);
}

// Diziyi yazdırma
/*foreach ($telefon_ozellik as $ts) {
    print_r($ts['id']);
    print_r($ts['telefon_id']); 
    print_r($ts['ekran_boyutu']); 
    print_r($ts['hafiza']); 
    print_r($ts['islemci']); 
    print_r($ts['marka']); 
    print_r($ts['ram']); 
    print_r($ts['model']); 
    print_r($ts['fiyat']); echo "<br>";
}*/

$query_kullanici = mysqli_query($connection, 'SELECT * FROM kullanici');
$kullanici_datas = array();

while($take = mysqli_fetch_array($query_kullanici)){
    $datas = [
        'musteri_id'=> $take['musteri_id'],
        'hesap_tipi'=> $take['hesap_tipi'],
        'soyad'=> $take['soyad'],
        'ad'=> $take['ad'],
        'email'=> $take['email'],
        'sifre'=> $take['sifre'],
        'dogum_gunu'=> $take['dogum_gunu'],
        'adres'=> $take['adres']
    ];
    $kullanici_datas[] = $datas;
}



?>
