<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ürün İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php 
      $id=$_GET['id'];
      include ("../bayi_left_bar.php"); ?>
    </div>

    <?php include ("../../../contact/take_all_data.php"); ?>
    <div id="right_container">

      <!--Ürün Bulmak için kodlar eklendi-->
      <div id="products_search">
        <h2>ÜRÜN BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="search_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Ürün ID">
          <input type="text" name="search_name" id="search_name" placeholder="Ürün Modeli">
          <button type="submit" id="search_info_button">Ürünü Ara</button>
        </form>
      </div>
      <!--Ürün özellikleri görüntüleme-->
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
          echo "<button type='button' onclick='go_products(" . $ts['id'] . ")' id='go_store_button_" . $i . "' class='go_store_button'>Mağazada Gör</button>";
          echo "</div>";
          $i++;
        }
        ?>
      </div>


      <!--Ürün silme-->
      <div id="products_delete_divs">
        <h4>Ürünü Silmek İstiyor musunuz?</h4>
        <button id="delete_confirm_yes" style="display: none;" onclick="delete_product()">Evet</button>
        <button id="delete_confirm_no" style="display: none;" onclick="cancel_delete()">Hayır</button>
      </div>
      <script src="../../../../js/master_admin.js">
      </script>




</body>

</html>