<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include ("../contact/contact.php");
        //Telefon id, isim ve fiyat bilgilerin almak için telefonlar tablosu çağırıldı.
        $query_telefonlar = mysqli_query($connection, 'select * from telefonlar');
        $query_sepet = mysqli_query($connection, 'select * from sepet');
        /*foreach () {
            /*$query_telefonlar = mysqli_query($connection, 'select * from telefonlar');
        $i = 1;
        while ($take = mysqli_fetch_array($query_telefonlar)) {
            $data = [
              "id" => $take["id"],
              "isim" => $take["isim"],
              "ram" => $take["ram"],
              "ekran_boyutu" => $take["ekran_boyutu"],
              "hafiza" => $take["hafiza"],
              "islemci" => $take["islemci"]
            ];
          
            $all_data[] = $data;
            $i++;
          }
          $query_telefonlar = mysqli_query($connection,'select * from bayi');
        
          while ($take = mysqli_fetch_array($query_telefonlar)) {
            $data = [
              
            ];
          
            $all_data[] = $data;
            $i++;
          } */
              ?>
</body>
</html>