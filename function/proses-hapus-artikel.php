<?php
// Include file koneksi
include "koneksi.php";

// Cek apakah parameter id_artikel sudah diterima
if (isset($_GET['id_artikel'])) {
  $id_artikel = $_GET['id_artikel'];

  // Query untuk mendapatkan data barang berdasarkan id_artikel
  $sql = "SELECT gambar FROM tb_artikel WHERE id_artikel = $id_artikel";
  $result = $koneksi->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $gambar = $row['gambar'];

    // Hapus gambar dari folder uploads
    if (file_exists("gambar/" . $gambar)) {
      unlink("gambar/" . $gambar);
    }

    // Query untuk menghapus data tb_artikel dari database
    $sql = "DELETE FROM tb_artikel WHERE id_artikel = $id_artikel";

    if (mysqli_multi_query($koneksi, $sql) === TRUE) {
      echo "Data tb_artikel berhasil dihapus.";
      header('location: ../list-artikel.php');
    } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
  } else {
    echo "Data tb_artikel tidak ditemukan.";
    
  }
} else {
  echo "ID tb_artikel tidak ditemukan.";
}

// Tutup koneksi
$koneksi->close();
?>
