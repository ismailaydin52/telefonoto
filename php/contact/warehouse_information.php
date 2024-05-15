<?php
              // Depo bilgilerini alma
              $query_warehouse_stock = mysqli_query($connection, 'SELECT * FROM depo_stok');
              $query_warehouse = mysqli_query($connection, 'SELECT * FROM depo');
              $telefon_cesidi = array(); // Telefon çeşitlerini tutacak dizi
              $all_data_depo_stok = array();
              // Tüm depo stoklarını al
              while ($take = mysqli_fetch_array($query_warehouse_stock)) {
                $data = [
                  "depo_id" => $take["depo_id"],
                  "phone_id" => $take["telefon_id"],
                  "stok" => $take["stok"]
                ];
                $all_data_depo_stok[] = $data;
                // Telefon çeşitlerini diziye ekle
                $telefon_cesidi[] = $take["telefon_id"];
              }
              // Telefon çeşitlerini unique hale getir
              $telefon_cesidi = array_unique($telefon_cesidi);
              $all_data_depo = array();
              // Tüm depoları al
              while ($take = mysqli_fetch_array($query_warehouse)) {
                $data = [
                  "depo_id" => $take["depo_id"],
                  "sehir" => $take["sehir"]
                ];
                $all_data_depo[] = $data;
              }
              // Her bir depo için işlem yap
              foreach ($all_data_depo as $depo) {
                $depo_id = $depo['depo_id'];
                $depo_sehir = $depo['sehir'];
                $stok_miktari = 0; // Başlangıçta stok miktarını sıfırla
                // Depo stok miktarını hesapla
                foreach ($all_data_depo_stok as $depo_stok) {
                  if ($depo_stok['depo_id'] == $depo_id) {
                    $stok_miktari += $depo_stok['stok'];
                  }
                }
                // Telefon çeşidi sayısını al
                $telefon_cesidi_sayisi = count($telefon_cesidi) + 1;
              }
              ?>