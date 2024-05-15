<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayi İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
      margin: auto;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }
  </style>
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include ("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include ("../../../contact/contact.php"); ?>
    <div id="right_container" class="admin_container">
      <div id="dealers_search">
        <h2>BAYİ BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="dealer_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Bayi ID">
          <input type="text" name="search_city" id="search_city" placeholder="Bayi Şehri">
          <button type="submit" id="search_info_button">Bayileri Bul</button>
        </form>
      </div>

      <!--Buraya Bayi Bulmak için kodlar eklendi-->
      <div id="dealers_search">
        <h2>BAYİ BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <!--Bayi bilgilerini görüntüleme-->

        <div id="dealer_info_divs">

          <div class="card-container">
            <?php
            // Bayi bilgilerini alma
            $query_dealer_stock = mysqli_query($connection, 'SELECT * FROM bayi_stok');
            $query_dealer = mysqli_query($connection, 'SELECT * FROM bayi');
            $product_types = array(); // Ürün tiplerini tutacak dizi
            $all_data_dealer_stock = array();
            // Tüm bayi stoklarını al
            while ($take = mysqli_fetch_array($query_dealer_stock)) {
              $data = [
                "dealer_id" => $take["bayi_id"],
                "phone_id" => $take["telefon_id"],
                "stock" => $take["stok"]
              ];
              $all_data_dealer_stock[] = $data;
              // Ürün tiplerini diziye ekle
              $product_types[] = $data["phone_id"];
            }
            // Ürün tiplerini unique hale getir
            $product_types = array_unique($product_types);
            $all_data_dealer = array();
            // Tüm bayileri al
            while ($take = mysqli_fetch_array($query_dealer)) {
              $data = [
                "dealer_id" => $take["bayi_id"],
                "city" => $take["ilce"]
              ];
              $all_data_dealer[] = $data;
            }
            // Her bir bayi için işlem yap
            foreach ($all_data_dealer as $dealer) {
              $dealer_id = $dealer['dealer_id'];
              $dealer_city = $dealer['city'];
              $stock_amount = 0; // Başlangıçta stok miktarını sıfırla
              // Bayi stok miktarını hesapla
              foreach ($all_data_dealer_stock as $dealer_stock) {
                if ($dealer_stock['dealer_id'] == $dealer_id) {
                  $stock_amount += $dealer_stock['stock'];
                }
              }
              // Ürün tipi sayısını al
              $product_type_count = count($product_types) + 1;

              // Kartları filtrele
              $search_id = isset($_POST["search_id"]) ? $_POST["search_id"] : "";
              $search_city = isset($_POST["search_city"]) ? $_POST["search_city"] : "";

              $display_style = "none";
              if (empty($search_id) && empty($search_city)) {
                $display_style = 'block';
              } else {
                if ($search_id == $dealer["dealer_id"] || $search_city == $dealer["city"]) {
                  $display_style = 'block';
                }
              }
              echo "  <div class='card' id ='dealer_card_" . $dealer_id . "' style='display: " . $display_style . "'>";
              echo "<h3>Bayi Bilgileri</h3>";
              echo "<p><strong>Bayi ID:</strong> " . $dealer_id . "</p>";
              echo "<p><strong>Bayi Şehri:</strong> " . $dealer_city . "</p>";
              echo "<p><strong>Stok Miktarı:</strong> " . $stock_amount . "</p>";
              echo "<p><strong>Ürün Tipi Sayısı:</strong>" . $product_type_count . "</p>";
              echo '<button type="button" onclick="showSales(' . $dealer_id . ')" class="dealer_button" id="dealer_exp_' . $dealer_id . '">Geçmiş İşlemleri Gör</button>';
              echo "</div>";

            }
            //Geçmiş işlemleri görüntüleme kodu
            $satilan_urunler = array();
            $satilan_urun_dealer = mysqli_query($connection, "SELECT * FROM satilan_urun");
            while ($take = mysqli_fetch_array($satilan_urun_dealer)) {
              $satilan_urunler[] = array(
                "bayi_id" => $take["bayi_id"],
                "telefon_id" => $take["telefon_id"],
                "musteri_id" => $take["musteri_id"],
                "satis_miktari" => $take["satis"],
                "tarih" => $take["tarih"]
              );
            }
            echo "<table border='1' id='sales_table'>";
            echo "<tr><th>Bayi ID</th><th>Telefon ID</th><th>Müşteri ID</th><th>Satış Miktarı</th><th>Tarih</th></tr>";

            foreach ($satilan_urunler as $urun) {
              $uid = $urun['bayi_id'];
              echo "<tr id='$uid' style='display:none;'>";
              echo "<td>" . $urun['bayi_id'] . "</td>";
              echo "<td>" . $urun['telefon_id'] . "</td>";
              echo "<td>" . $urun['musteri_id'] . "</td>";
              echo "<td>" . $urun['satis_miktari'] . "</td>";
              echo "<td>" . $urun['tarih'] . "</td>";
              echo "</tr>";
            }


            echo "</table>";
            ?>

          </div>
        </div>
      </div>
    </div>
    <script>
      function showSales(dealerId) {
    var rows = document.querySelectorAll("[id='" + dealerId + "']");
    
    rows.forEach(function(row) {
        if (row.style.display === "none") {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}



    </script>

</body>

</html>