<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
    <?php 
    $id=$_GET['id'];
    include("../bayi_left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include ("../../../contact/take_all_data.php");
    ?>
    <div id="right_container" class="admin_container">
        <!--Buraya Ürün Bulmak için kodlar eklendi-->
        <div id="products_search">
        <h2>ÜRÜN BİLGİLERİNİ GÖRÜNTÜLE</h2>
          <form id="search_info_form" method="POST">
            <input type="text" name="search_id" id="search_id" placeholder="Ürün ID">
            <input type="text" name="search_name" id="search_name" placeholder="Ürün Modeli">
            <button type="submit" id="search_info_button">Ürünü Ara</button>
          </form>
        </div>
        <!--Ürün özellikleri görüntüleme ve id isim ile bulma-->
        <div id="products_info_divs">

          <?php
          $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
          $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

          foreach ($telefon_ozellik as $ts) {
            $i = $ts['id'];
            $display_style = 'none'; // Başlangıçta tüm divler gizlenecek

            if (empty($search_id) && empty($search_name)) {
              $display_style = 'block'; // Eğer inputlardan gelen değerler yoksa, tüm divler görünür olacak
            } else {
              if ($search_id == $ts['id'] || $search_name == $ts['model']) {
                $display_style = 'block'; // Aranan ID ile eşleşen divler görünür hale gelecek
              }
            }

            echo '<div id="search_info_cards_' . $i . '"  class="search_info_cards" style="display: ' . $display_style . '">';
            echo "Telefon ID: " . $ts['id'] . "<br>";
            echo "Telefon Modeli: " . $ts['model'] . "<br>";
            echo "RAM: " . $ts['ram'] . " GB" . "<br>";
            echo "Ekran Boyutu: " . $ts['ekran_boyutu'] . " inç" . "<br>";
            echo "Hafıza: " . $ts['hafiza'] . " GB" . "<br>";
            echo "İşlemci: " . $ts['islemci'] . "<br>";
            echo "<button type='button' onclick='go_products(".$ts['id'].")' id='go_store_button_" . $i . "' class='go_store_button'>Mağazada Gör</button>";
            echo "</div>";
            $i++;
          }

          
          ?>
        </div>
          
        <!--Ürün özelliklerini değiştirme-->
        <div id="products_settings_divs">

          <h1>Telefon Özelliklerini Değiştirme</h1>
          <form action="telefon_degistir.php" method="post" id="products_fix_form">
            <input type="number" id="fix_telefon_id" name="fix_telefon_id" placeholder="Telefon ID" required>
            <input type="text" id="fix_telefon_markasi" name="fix_telefon_markasi" placeholder="Telefon Markası"
              required>
            <input type="text" id="fix_telefon_adi" name="fix_telefon_adi" placeholder="Telefon Adı" required>
            <input type="number" id="fix_ram" name="fix_ram" placeholder="Ram (GB)" required>
            <input type="number" id="fix_hafiza" name="fix_hafiza" placeholder="Hafıza (GB)" required>
            <input type="number" id="fix_pil_kapasitesi" name="fix_pil_kapasitesi" placeholder="Pil Kapasitesi (mAh)"
              required>
            <input type="text" id="fix_islemci" name="fix_islemci" placeholder="İşlemci" required>
            <input type="number" id="fix_fiyat" name="fix_fiyat" placeholder="Fiyat (TL)" required>
            <input type="file" id="fix_resim" name="fix_resim">
            <input type="number" id="fix_depo_id" name="fix_depo_id" placeholder="Depo ID" required>

            <input type="submit" value="Değiştir">
          </form>
        </div>


      <script src="../../../../js/master_admin.js">
      </script>


</body>

</html>