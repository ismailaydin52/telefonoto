<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayi İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
  <style>
    
  </style>
</head>

<body>
  <div id="container">
  <div id="left_container">
      <?php include("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include ("../../../contact/contact.php"); ?>
    <div id="right_container">
        <div id="bayi_add_form_div">
          <h1>Bayi Ekleme</h1>
          <form action="#" method="post" id="bayi_add_form">
            <input type="text" id="bayi_town" name="bayi_town" placeholder="Bayi Sehiri">
            <input type="submit" value="Ekle" id='dealer_add_button'>
          </form>

      </div>
    </div>
  </div>
</body>

</html>