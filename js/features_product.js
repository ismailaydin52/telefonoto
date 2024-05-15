function choice_photo() {
    var topImg = document.getElementById("main_pictures_img");
    var clickedImg = event.target;

    // Tıklanan resmin src'sini alıp üstteki ana resmin src'si ile değiştir
    topImg.src = clickedImg.src;

    // Tüm alt resimlerin etkin sınıfını kaldır
    var bottomImgs = document.getElementsByClassName("bottom_pictures_img");
    for (var i = 0; i < bottomImgs.length; i++) {
        bottomImgs[i].classList.remove("active");
    }

    // Tıklanan resmin etkin sınıfını ekle
    clickedImg.classList.add("active");
}
//Sepet ürün eklemek için yapılacak işlemler

function add_list(){
    
}

/*document.addEventListener('DOMContentLoaded', function () {
    // Tüm kartları seç
    var cards = document.querySelectorAll('.card');

    // Her bir kart için tıklama olayı ekle
    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            // Kartın id'sini al
            var cardId = this.id;
            var cardNumber = cardId.replace("card", "");

            var url = 'features_product.php?id=' + cardNumber;
            window.location.href = url;
        });
    });
});*/
