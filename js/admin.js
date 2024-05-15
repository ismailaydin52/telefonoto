document.getElementById('phoneForm').addEventListener('submit', function (event) {
  event.preventDefault();

  // Form verilerini al
  var phoneName = document.getElementById('phoneName').value;
  var storage = document.getElementById('storage').value;
  var ram = document.getElementById('ram').value;
  var rearCameraCount = document.getElementById('rearCameraCount').value;
  var rearCamera1 = document.getElementById('rearCamera1').value;
  var rearCamera2 = document.getElementById('rearCamera2').value;
  var frontCamera = document.getElementById('frontCamera').value;
  var batteryCapacity = document.getElementById('batteryCapacity').value;
  var screenSize = document.getElementById('screenSize').value;
  var color = document.getElementById('color').value;

  // Telefonu ekrana ekle
  addPhone(phoneName, storage, ram, rearCameraCount, rearCamera1, rearCamera2, frontCamera, batteryCapacity, screenSize, color);

  // Formu temizle
  document.getElementById('phoneForm').reset();
});

function addPhone(name, storage, ram, rearCameraCount, rearCamera1, rearCamera2, frontCamera, batteryCapacity, screenSize, color) {
  var phoneList = document.createElement('div');
  phoneList.classList.add('phone');

  var phoneHTML = `
    <h3>${name}</h3>
    <p><strong>Hafıza:</strong> ${storage} GB</p>
    <p><strong>RAM:</strong> ${ram} GB</p>
    <p><strong>Arka Kamera Sayısı:</strong> ${rearCameraCount}</p>
    <p><strong>1. Arka Kamera:</strong> ${rearCamera1}</p>
  `;

  if (rearCameraCount > 1) {
    phoneHTML += `<p><strong>2. Arka Kamera:</strong> ${rearCamera2}</p>`;
  }

  phoneHTML += `
    <p><strong>Ön Kamera:</strong> ${frontCamera}</p>
    <p><strong>Batarya Kapasitesi:</strong> ${batteryCapacity} mAh</p>
    <p><strong>Ekran Boyutu:</strong> ${screenSize} inç</p>
    <p><strong>Renk:</strong> ${color}</p>
  `;

  phoneList.innerHTML = phoneHTML;
  document.body.appendChild(phoneList);
}
document.getElementById('rearCameraCount').addEventListener('input', function () {
  var rearCameraCount = parseInt(this.value);
  var rearCameraDetails = document.getElementById('rearCameraDetails');
  rearCameraDetails.innerHTML = ''; // Önceki detayları temizle
  if (rearCameraCount > 4) {
    rearCameraCount = 4;
    document.getElementById('warning').innerText = 'Lütfen tüm alanları doldurun.';
    return false;
  }
  for (var i = 1; i <= rearCameraCount; i++) {
    var inputLabel = document.createElement('label');
    inputLabel.setAttribute('for', 'rearCamera' + i);
    inputLabel.textContent = i + '. Arka Kamera:';

    var inputField = document.createElement('input');
    inputField.setAttribute('type', 'text');
    inputField.setAttribute('id', 'rearCamera' + i);
    inputField.setAttribute('name', 'rearCamera' + i);
    inputField.setAttribute('required', 'required');

    var formGroup = document.createElement('div');
    formGroup.classList.add('form-group');
    formGroup.appendChild(inputLabel);
    formGroup.appendChild(inputField);

    rearCameraDetails.appendChild(formGroup);
  }
});

//displat düzenlenecek divlerin idlerini alma
var addPhoneDiv = document.getElementById("addPhone");
var delPhoneDiv = document.getElementById("delPhone");
var fixPhoneDiv = document.getElementById("fixPhone");
var delAcountDiv = document.getElementById("delAcount");
var settingsAcount = document.getElementById("settingsAcount");
var helpDiv = document.getElementById("help");
var firstStep = document.getElementById("firstStep");

function displayNone() {
  firstStep.style.display = "none";
  addPhoneDiv.style.display = "none";
  delPhoneDiv.style.display = "none";
  fixPhoneDiv.style.display = "none";
  delAcountDiv.style.display = "none";
  settingsAcount.style.display = "none";
  helpDiv.style.display = "none";
}
displayNone();

function showAddPhone() {
  displayNone();
  addPhoneDiv.style.display = "block";
}

function showDelPhone() {
  displayNone();
  delPhoneDiv.style.display = "block";
}

function showFixPhone() {
  displayNone();
  fixPhoneDiv.style.display = "block";
}

function showDelAcount() {
  displayNone();
  delAcountDiv.style.display = "block";
}

function logOut() {
  alert('Hesaptan çıkış yapıldı...')
}

function settingAcount() {
  displayNone();
  settingsAcount.style.display = "block";
}
function help() {
  displayNone();
  helpDiv.style.display = "block";
}
