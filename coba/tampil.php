<?php
// Konfigurasi koneksi ke database
include 'function/koneksi.php';

// Ambil ID artikel dari parameter URL

// Query untuk mengambil artikel berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM tb_artikel");
// $result = mysqli_query($koneksi, $query);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampil Artikel</title>
</head>
<body>
    <?php while($row = mysqli_fetch_array($result)) { ?>
        <h1><?php echo $row['judul']; ?></h1>
        <div class="d-flex justify-content-center align-items-center mt-4" style="height: 450px;">
            <img src="img/<?php echo $row['gambar']; ?>" style="max-width: 400px; max-height: 400px; min-width: 200px; min-height: 200px;" class="img-thumbnail">
        </div>
        <p><?php echo $row['isi']; ?></p>
    <?php } ?>
    <a href="list.php"><h1>Kembali ke Daftar Artikel</h1></a>
</body>
</html>
