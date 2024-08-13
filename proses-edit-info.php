<?php
// Cek apakah data barang sudah disubmit dari form edit
if (isset($_POST['submit'])) {
  // Ambil data barang yang diinput dari form edit
  $id_info = $_POST['id_info'];

  // Include file koneksi
  include "function/koneksi.php";

  // Proses update gambar jika ada gambar baru yang diupload
  if ($_FILES['gambar']['name'] != "") {
    // Ambil gambar lama
    $sql = "SELECT gambar FROM tb_info WHERE id_info = $id_info";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    $gambarLama = $row['gambar'];

    // Hapus gambar lama
    

    // Upload gambar baru
    $gambar = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];
    $targetDir = "images/logo/";
    $gambarName = uniqid() . "_" . $gambar;
    $targetFile = $targetDir . $gambarName;

    if (move_uploaded_file($gambarTmp, $targetFile)) {
      // Update data tb_info dengan gambar baru
      $sql = "UPDATE tb_info SET gambar='$gambarName'WHERE id_info = $id_info";

      if ($koneksi->query($sql) === TRUE) {
        header('location: index.php');
      } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
    } else {
      echo "Error saat mengunggah gambar.";
    }
  } else {
    // Update data tb_info tanpa mengganti gambar
    echo "kacau";
  }

  // Tutup koneksi
  $koneksi->close();
}
?>