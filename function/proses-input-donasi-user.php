

<?php
include 'koneksi.php';
session_start();

// Periksa apakah pengguna sudah login
$hp = $_SESSION['hp'];

$query = "SELECT * FROM tb_user WHERE hp = '$hp' LIMIT 1";
$result = mysqli_query($koneksi, $query);                                                                                     
                                                                                        // Ambil data admin
$user = mysqli_fetch_assoc($result);     
// Cek apakah data artikel sudah disubmit dari form
if (isset($_POST['submit'])) {
    $donatur = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];

    // Memasukkan tanggal hari ini dengan format Y-m-d
    $tanggal = date('Y-m-d'); // Format: tahun-bulan-hari

    // Mengelola gambar yang diunggah
    $gambarName = uniqid() . "_" . $_FILES['gambar']['name'];

    // Lokasi penyimpanan file gambar
    $targetDir = "../images/donasi/";
    $targetFile = $targetDir . basename($gambarName);

    // Pindahkan file gambar ke lokasi penyimpanan
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
        // Memasukkan tanggal hari ini dengan format Y-m-d
        $tanggal = date('Y-m-d'); // Format: tahun-bulan-hari

        // Simpan data ke dalam database (contoh menggunakan MySQLi)
        include "koneksi.php";

        // Siapkan pernyataan SQL untuk menyimpan data ke dalam tabel dengan prepared statements
        $sql = "INSERT INTO tb_donasi (nama, kategori, nominal, keterangan, tanggal, gambar) VALUES (?, ?, ?, ?, ?, ?)";

        // Buat prepared statement
        $stmt = $koneksi->prepare($sql);

        // Bind parameter ke statement
        $stmt->bind_param("ssssss", $donatur, $kategori, $nominal, $keterangan, $tanggal, $gambarName);

        // Eksekusi pernyataan SQL
        if ($stmt->execute()) {
            
            // Ganti 081392754854 dengan nomor tujuan Anda
            $nomorTujuan = "081392754854";
            
            // Ganti $user['nama'] dengan cara Anda mendapatkan nama pengguna
            $namaPengguna = $user['nama'];
        
            // Bentuk tautan WhatsApp dengan data yang sesuai
            $whatsappLink = "https://wa.me/$nomorTujuan/?text=Saya%20$namaPengguna%20Sudah%20Berdonasi%20pada%20tanggal%20$tanggal%20Mohon%20Konfirmasinya";
            
            // Redirect ke tautan WhatsApp
            echo "<script>window.location.href='$whatsappLink';</script>";
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
