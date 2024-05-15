<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hesap İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php 
      $id=$_GET['id'];
      include ("../bayi_left_bar.php"); ?>
    </div>
    <!-- Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir. -->
    <?php include ("../../../contact/take_all_data.php"); ?>
    <div id="right_container">

      <!-- Hesap Arama için kodlar eklendi -->
      <div id="acount_search" class="search_div">
        <h2>HESAP BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="acount_search_form" class="search_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Hesap ID">
          <input type="text" name="search_name" id="search_name" placeholder="Hesap Adı">
          <button type="submit" id="search_info_button" class="search_button">Hesap Ara</button>
        </form>
      </div>

      <!-- Hesap özellikleri görüntüleme -->
      <div id="acount_info_divs">
        <h2>HESAP BİLGİLERİ</h2>
        <?php
        $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
        $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

        foreach ($kullanici_datas as $data) {
          $i = $data["musteri_id"];
          $display_style = 'none';
          if (empty($search_id) && empty($search_name)) {
            $display_style = 'block';
          } else {
            if ($search_id == $data["musteri_id"] || $search_name == $data["ad"]) {
              $display_style = 'block';
            }
            //Girilen ID ve İsim Değeri yoksa olacaklar
            $control = "select * from kullanici where musteri_id='$search_id' || ad='$search_name'";
            $result = mysqli_query($connection, $control);
            if (!$result) {
              // Sorgu hatası olduğunda buraya girer.
              echo "Sorgu hatası: " . mysqli_error($connection);
            } else {
              // Sorgu başarılı ise buraya girer.
              // mysqli_num_rows ile sorgu sonucundaki satır sayısını kontrol edebiliriz.
              if (!(mysqli_num_rows($result) > 0)) {
                echo "<b>" . $search_id . "</b>" . " ID'sine sahip kullanıcı bulunamadı.";
                exit();
              }
              mysqli_free_result($result);
            }
          }


          echo '<div id="search_info_cards_' . $i . '"  class="search_info_cards" style="display: ' . $display_style . '">';
          echo "Müşteri ID: " . $data["musteri_id"] . "<br>";
          echo "Hesap Tipi: " . $data["hesap_tipi"] . "<br>";
          echo "Ad: " . $data["ad"] . "<br>";
          echo "Soyad: " . $data["soyad"] . "<br>";
          echo "E-posta: " . $data["email"] . "<br>";
          echo "Şifre: " . $data["sifre"] . "<br>";
          echo "Doğum Günü: " . $data["dogum_gunu"] . "<br>";
          echo "Adres: " . $data["adres"] . "<br>";
          echo "</div>";
          $i++;
        }
        ?>
      </div>
      <div id="products_add_divs">
        <h1>Kullanıcı Ekleme</h1>
        <form action="#" method="post" id="products_add_form">
          <input type="text" id="musteri_id" name="musteri_id" placeholder="Müşteri ID" required><br>
          <label for="hesap_tipi">Hesap Tipi:</label>
          <select id="hesap_tipi" name="hesap_tipi">
            <option value="admin">Admin</option>
            <option value="bayi">Bayi</option>
            <option value="musteri">Müşteri</option>
          </select><br>
          <input type="text" id="ad" name="ad" placeholder="Ad" required>
          <input type="text" id="soyad" name="soyad" placeholder="Soyad" required>
          <input type="email" id="email" name="email" placeholder="E-posta" required>
          <input type="password" id="sifre" name="sifre" placeholder="Şifre" required>
          <input type="date" id="dogum_gunu" name="dogum_gunu" placeholder="Doğum Günü" required>
          <input type="text" id="adres" name="adres" placeholder="Adres" required>
          <input type="submit" value="Ekle">
        </form>
      </div>
    </div>
  </div>
  <script src="../../js/master_admin.js"></script>
</body>

</html>
