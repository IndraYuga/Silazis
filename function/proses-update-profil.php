<?php
// Cek apakah data barang sudah disubmit dari form edit
if (isset($_POST['submit'])) {
  // Ambil data barang yang diinput dari form edit
  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $hp = $_POST['hp'];
  $rekening = $_POST['rekening'];
  $alamat = $_POST['alamat'];

  // Include file koneksi
  include "koneksi.php";
    // Update data barang tanpa mengganti foto
    $sql = "UPDATE tb_user SET nama='$nama', hp='$hp', email='$email',rekening='$rekening', alamat='$alamat' WHERE id_user = $id_user";

    if ($koneksi->query($sql) === TRUE) {
      header('location: ../profil.php');
    } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
  

  // Tutup koneksi
  $koneksi->close();
}
?>