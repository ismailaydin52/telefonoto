<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Depo İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">

</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include ("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include ("../../../contact/contact.php"); ?>
    <div id="right_container" class="admin_container">
      <div id="warehouse_add_form_div">
        <h1>Depo Ekleme</h1>
        <form action="#" method="post" id="warehouse_add_form">
          <input type="text" id="warehouse_town" name="warehouse_town" placeholder="Depo Sehiri">

          <input type="submit" value="Ekle" class="warehouse_button">
        </form>

      </div>
    </div>
  </div>
</body>

</html>