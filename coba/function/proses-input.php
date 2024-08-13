
<?php
// Cek apakah data barang sudah disubmit dari form
if (isset($_POST['submit'])) {
  // Ambil data barang yang diinput dari form
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $kategori = $_POST['kategori'];

  // Generate judul file acak
  $gambarName = uniqid() . "_" . $_FILES['gambar']['name'];

  // Lokasi penyimpanan file gambar
  $targetDir = "../img/";
  $targetFile = $targetDir . basename($gambarName);

  // Pindahkan file gambar ke lokasi penyimpanan
  if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
    // Simpan data ke dalam database (contoh menggunakan MySQLi)
    include "koneksi.php";

    // Siapkan pernyataan SQL untuk menyimpan data ke dalam tabel
    $sql = "INSERT INTO tb_artikel (judul, gambar, isi, kategori) VALUES ('$judul', '$gambarName', '$isi', '$kategori')";

    // Eksekusi pernyataan SQL
    if ($koneksi->query($sql) === TRUE) {
      echo "Data berhasil disimpan.";
      header('location: ../tampil.php');
    } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
  } else {
    echo "Error saat mengunggah gambar.";
  }
}
?>
