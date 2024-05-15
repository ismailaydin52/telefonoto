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
      <?php include ("../left_bar.php"); ?>
    </div>
    <!-- Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir. -->
    <?php include ("../../../contact/take_all_data.php"); ?>
    <div id="right_container">

      <!-- Hesap özellikleri görüntüleme -->
      <div id="acount_info_divs">

        <div id="container_register">
          <form method="post" id="register_form" action="../../../contact/add_acount.php">
            <h2>Kullanıcı Ekleme</h2>
            <input type="text" id="name" name="register_name" required placeholder="İsim">
            <input type="text" id="surname" name="register_surname" required placeholder="Soy İsim">
            <input type="email" id="email" name="register_email" required placeholder="E-mail">
            <input type="password" id="password" name="register_password" required placeholder="Şifre">
            <input type="date" id="birthday" name="register_birthday" required>
            <input type="tel" id="phone" name="register_adres" placeholder="İzmit/Kabaoğlu GSP" required>
            <select id="hesap_tipi" name="hesap_tipi">
              <option value="Admin">Admin</option>
              <option value="Bayi">Bayi</option>
              <option value="Musteri">Müşteri</option>
            </select>

            <input type="submit" value="Kayıt Ol">
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="../../js/master_admin.js"></script>
</body>

</html>