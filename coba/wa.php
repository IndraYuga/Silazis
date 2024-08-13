<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="myForm">
  <label for="phone">Nomor WhatsApp:</label>
  <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor WhatsApp">

  <label for="message">Pesan:</label>
  <textarea id="message" name="message" placeholder="Masukkan pesan"></textarea>

  <button type="button" onclick="updateWhatsAppLink()">Buat Tautan WhatsApp</button>
</form>

<a id="whatsappLink" href="" target="_blank">Tautan WhatsApp</a>

<script>
function updateWhatsAppLink() {
  // Tangkap nilai dari formulir
  var phone = document.getElementById("phone").value;
  var message = document.getElementById("message").value;

  // Bentuk URL WhatsApp dengan nilai formulir
  var whatsappURL = "https://wa.me/" + phone + "/?text=" + encodeURIComponent(message);

  // Ubah href tautan WhatsApp
  document.getElementById("whatsappLink").href = whatsappURL;
}
</script>
</body>
</html>