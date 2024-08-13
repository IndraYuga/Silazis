<?php
// Cek apakah data barang sudah disubmit dari form edit
if (isset($_POST['submit'])) {
  // Ambil data barang yang diinput dari form edit
  $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $tenggat = $_POST['tenggat'];

  // Include file koneksi
  include "koneksi.php";
    // Update data barang tanpa mengganti gambar
    $sql = "UPDATE tb_user SET nama='$nama', tenggat='$tenggat' WHERE id_user = $id_user";

    if ($koneksi->query($sql) === TRUE) {
      header('location: ../list-donatur.php');
    } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
  

  // Tutup koneksi
  $koneksi->close();
}
?>