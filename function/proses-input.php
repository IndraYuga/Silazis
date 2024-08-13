<?php
// Cek apakah data artikel sudah disubmit dari form
if (isset($_POST['submit'])) {
    // Ambil data artikel yang diinput dari form
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];

    // Generate judul file acak
    $gambarName = uniqid() . "_" . $_FILES['gambar']['name'];

    // Lokasi penyimpanan file gambar
    $targetDir = "../images/";
    $targetFile = $targetDir . basename($gambarName);

    // Pindahkan file gambar ke lokasi penyimpanan
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
        // Memasukkan tanggal hari ini dengan format Y-m-d
        $tanggal = date('Y-m-d'); // Format: tahun-bulan-hari

        // Simpan data ke dalam database (contoh menggunakan MySQLi)
        include "koneksi.php";

        // Siapkan pernyataan SQL untuk menyimpan data ke dalam tabel dengan prepared statements
        $sql = "INSERT INTO tb_artikel (judul, gambar, isi, kategori, tanggal) VALUES (?, ?, ?, ?, ?)";

        // Buat prepared statement
        $stmt = $koneksi->prepare($sql);

        // Bind parameter ke statement
        $stmt->bind_param("sssss", $judul, $gambarName, $isi, $kategori, $tanggal);

        // Eksekusi pernyataan SQL
        if ($stmt->execute()) {
            echo "Data berhasil disimpan.";
            header('location: ../buat-artikel.php');
            
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup koneksi
        $stmt->close();
        $koneksi->close();
    } else {
        echo "Error saat mengunggah gambar.";
    }
}
?>
