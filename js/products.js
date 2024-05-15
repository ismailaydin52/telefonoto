document.addEventListener('DOMContentLoaded', function () {
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
});
