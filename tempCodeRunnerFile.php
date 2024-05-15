<?php
          $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
          $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

          foreach ($all_data as $data) {
            $i = $data["id"];
            $display_style = 'none'; // Başlangıçta tüm divler gizlenecek
            if (empty($search_id) && empty($search_name)) {
              $display_style = 'block'; // Eğer inputlardan gelen değerler yoksa, tüm divler görünür olacak
            } else {
              if ($search_id == $data["id"] || $search_name == $data["isim"]) {
                $display_style = 'block'; // Aranan ID ile eşleşen divler görünür hale gelecek
              }
            }

            echo '<div id="search_info_cards_' . $i . '"  class="search_info_cards" style="display: ' . $display_style . '">';
            echo "Telefon ID: " . $data["id"] . "<br>";
            echo "Telefon Adı: " . $data["isim"] . "<br>";
            echo "RAM: " . $data["ram"] . " GB" . "<br>";
            echo "Ekran Boyutu: " . $data["ekran_boyutu"] . " inç" . "<br>";
            echo "Hafıza: " . $data["hafiza"] . " GB" . "<br>";
            echo "İşlemci: " . $data["islemci"] . "<br>";
            echo "<button type='button' onclick='go_products(this)' id='go_store_button_" . $i . "' class='go_store_button'>Mağazada Gör</button>";
            echo "</div>";
            $i++;
          }
          //deneme başarılı mı