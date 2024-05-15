<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/register.css">
</head>

<body>
    <?php
    require ("../navbar/navbar.php");
    ?>

    <div id="container_register">

        <form method="post" id="register_form" action="../contact/user_registration.php">
            <h2>Kayıt Formu</h2>
            <label for="name">İsim</label><br>
            <input type="text" id="name" name="register_name" required><br><br>

            <label for="surname">Soyisim</label><br>
            <input type="text" id="surname" name="register_surname" required><br><br>

            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="register_email" required><br><br>

            <label for="password">Şifre</label><br>
            <input type="password" id="password" name="register_password" required><br><br>

            <label for="birthday">Doğum Günü</label><br>
            <input type="date" id="birthday" name="register_birthday" required><br><br>

            <label for="phone">Adres</label><br>
            <input type="tel" id="phone" name="register_adres" placeholder="İzmit/Kabaoğlu GSP" required><br><br>

            <input type="submit" value="Kayıt Ol" onclick="submitForm()">
            <input type="button" value="Hesabınız var mı? Giriş yapın." id="login_button_register" onclick="go_login()">

        </form>
       

    </div>
    <!--Burada footer verilmiştir-->
    <footer>
        <?php require ("../footer/footer.php"); ?>
    </footer>
    <!--Burada script verilmiştir-->

    <script>
        function go_login() {
            window.location.href = "../login/login.php";
        };
        // Form gönderildikten sonra

        function submitForm() {
    // Formdan gelen verileri alma
    var name = document.getElementById("register_name").value;
    var surname = document.getElementById("register_surname").value;
    var email = document.getElementById("register_email").value;
    var adres = document.getElementById("register_adres").value;
    var password = document.getElementById("register_password").value;
    var birthday = document.getElementById("register_birthday").value;

    // AJAX kullanarak formu gönder
    var xhr = new XMLHttpRequest();
    var url = "../login/login.php"; // Kodun olduğu PHP dosyasının adı

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
        }
    };

    var params = "register_name=" + name + "&register_surname=" + surname + "&register_email=" + email + "&register_adres=" + adres + "&register_password=" + password + "&register_birthday=" + birthday;
    xhr.send(params);
}


    </script>

</body>

</html>