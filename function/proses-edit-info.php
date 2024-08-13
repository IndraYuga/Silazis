<?php
// Cek apakah data barang sudah disubmit dari form edit
if (isset($_POST['submit'])) {
  // Ambil data barang yang diinput dari form edit
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];

  // Include file koneksi
  include "koneksi.php";

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
    $targetDir = "../images/";
    $gambarName = uniqid() . "_" . $gambar;
    $targetFile = $targetDir . $gambarName;

    if (move_uploaded_file($gambarTmp, $targetFile)) {
      // Update data barang dengan gambar baru
      $sql = "UPDATE tb_user SET gambar='$gambarName', nama='$nama', nama_lengkap='$namaLengkap',  kelamin='$kelamin', alamat='$alamat', email='$email' WHERE id_info = $id_info";

      if ($koneksi->query($sql) === TRUE) {
        header('location: ../list_user.php');
      } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
    } else {
      echo "Error saat mengunggah gambar.";
    }
  } else {
    // Update data barang tanpa mengganti gambar
    $sql = "UPDATE tb_user SET nama='$nama', nama_lengkap='$namaLengkap', kelamin='$kelamin', alamat='$alamat', email='$email'  WHERE id_info = $id_info";

    if ($koneksi->query($sql) === TRUE) {
      header('location: ../list_user.php');
    } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
  }

  // Tutup koneksi
  $koneksi->close();
}
?>