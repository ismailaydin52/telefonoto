<?php
$id = $_GET['id'];
if (!empty($id)) {
    include '../navbar/navbar_login.php';
} else {
    include ('../navbar/navbar.php');
}
include ("../contact/contact.php");
$phoneID = $_GET['telefon_id'];
$query_resim = mysqli_query($connection, 'select * from resimler where id="' . $phoneID . '"');
$resim_row = mysqli_fetch_array($query_resim);
$resim1 = $resim_row['resim1'];
$resim2 = $resim_row['resim2'];
$resim3 = $resim_row['resim3'];
$resim4 = $resim_row['resim4'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css\features_product.css">
    <style>
        #product_details h5 {
            margin-top: 0px;
        }

        #product_details h3 {
            margin-bottom: 2px;
        }
    </style>
</head>

<body>
    <div id="product_info_div">
        <div id="product_pictures_div">
            <div id="top_pictures">
                <img src="<?php echo $resim1; ?>" id="main_pictures_img">
            </div>
            <div id="bottom_pictures">
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img id="first_bottom_picture_img" class="bottom_pictures_img" src="<?php echo $resim1; ?>">
                </div>
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img id="first_bottom_picture_img" class="bottom_pictures_img" src="<?php echo $resim2; ?>">
                </div>
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img id="first_bottom_picture_img" class="bottom_pictures_img" src="<?php echo $resim3; ?>">
                </div>
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img id="first_bottom_picture_img" class="bottom_pictures_img" src="<?php echo $resim4; ?>">
                </div>

            </div>
        </div>
        <div id="product_explain_div">
            <!--Veri alma -->
            <?php
            $sql_ozellik = mysqli_query($connection, "SELECT * FROM ozellik WHERE id ='$phoneID'");
            $sql_telefon = mysqli_query($connection, "SELECT * FROM telefon WHERE telefon_id ='$phoneID'");

            while ($ozellik = mysqli_fetch_array($sql_ozellik)) {
                $ram = $ozellik["ram"];
                $hafiza = $ozellik["hafiza"];
                $islemci = $ozellik["islemci"];
                $kamera = $ozellik["kamera"];
                $ekran_boyutu = $ozellik["ekran_boyutu"];
            }

            while ($telefon = mysqli_fetch_array($sql_telefon)) {
                $model = $telefon["model"];
                $marka = $telefon["marka"];
                $fiyat = $telefon["fiyat"];
            }

            $html = '<div id="product_details">
                        <h3>' . $model . '</h3>
                        <h5>' . $marka . '</h5>
                        <div id="urun_ozellik_div">
                            <h3>ÜRÜN ÖZELLİKLERİ</h3> 
                            <p><b> DAHİLİ HAFIZA: </b> ' . $hafiza . '</p>
                            <p><b> RAM KAPASİTESİ: </b> ' . $ram . '</p>
                            <p><b> EKRAN BOYUTU: </b> ' . $ekran_boyutu . ' inç</p>
                            <p><b> İŞLEMCİ: </b> ' . $islemci . '</p>
                        </div>
                        <div id="bottom_buttons_info_products">
                        <h1>' . $fiyat . ' TL</h1>
                        <label for="adet">Adet Sayısı:</label>
                        <input type="number" name="adet" min="1" max="10" value="1" id="eklenecek_adet">
                        <button id="sepete_ekle_button" onclick="add_to_cart()"><b>SEPETE EKLE</b></button>
                        </div>
                    </div>';

            echo $html;
            ?>
        </div>
    </div>
    <script src="../../js/features_product.js"></script>
</body>

</html>