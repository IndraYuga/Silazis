<?php
// Cek apakah data artikel sudah disubmit dari form
if (isset($_POST['submit'])) {
    $donatur = $_POST['nama_donatur'];
    $kategori = $_POST['kategori'];
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
        // Memasukkan tanggal hari ini dengan format Y-m-d
        $tanggal = $_POST['tanggal']; // Format: tahun-bulan-hari

        // Simpan data ke dalam database (contoh menggunakan MySQLi)
        include "koneksi.php";

        // Siapkan pernyataan SQL untuk menyimpan data ke dalam tabel dengan prepared statements
        $sql = "INSERT INTO tb_donasi (nama, kategori, nominal, keterangan, tanggal) VALUES (?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($sql);

        // Bind parameter ke placeholders
        $stmt->bind_param("ssdss", $donatur, $kategori, $nominal, $keterangan, $tanggal);

        // Eksekusi pernyataan SQL
        if ($stmt->execute()) {
            echo "Data berhasil disimpan.";
            header('location: ../kelola-donasi.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup koneksi
        $stmt->close();
        $koneksi->close();
}
?>
