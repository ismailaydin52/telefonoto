<?php
include 'db_connection.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<img src="phone_image.jpg" alt="Phone Image">';
        echo '<div class="card-details">';
        echo '<h3>'.$row['brand'].' '.$row['model'].'</h3>';
        echo '<p>RAM: '.$row['ram'].' GB</p>';
        echo '<p>Ekran Boyutu: '.$row['screen_size'].' inç</p>';
        echo '<p>Hafıza: '.$row['storage'].' GB</p>';
        echo '<p>Batarya Kapasitesi: '.$row['battery'].' mAh</p>';
        echo '<a href="#" class="btn">Görüntüle</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Ürün bulunamadı.";
}
mysqli_close($conn);
?>
