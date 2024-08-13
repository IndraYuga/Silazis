<?php
session_start();

include 'koneksi.php';

$hp = $_POST['hp'];
$password = $_POST['password'];

// Query untuk mencari admin dengan username dan password yang cocok di tabel admin
$query_user = "SELECT * FROM tb_user WHERE hp='$hp' AND password='$password'";
$result_user = mysqli_query($koneksi, $query_user);

// Periksa apakah query menghasilkan hasil yang benar
if ($result_user && mysqli_num_rows($result_user) == 1) {
    // Ambil id_user dari hasil query yang sesuai dengan admin yang login
    $adminData = mysqli_fetch_assoc($result_user);
    $iduser = $adminData['hp'];

    // Simpan id_user ke dalam sesi
    $_SESSION['hp'] = $iduser;
    
    // Redirect ke halaman beranda atau halaman lain yang sesuai
    
    header("Location: ../index.php");
    echo '<script>alert("Login berhasil");</script>';
    exit;
} else {
    // Jika tidak ditemukan user dengan hp dan password yang cocok, kembali ke halaman login
    header('location: ../login.php?loginSuccess=false');
    
}

?>

