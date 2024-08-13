<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
</head>
<body>

<?php
// Koneksi ke database (contoh menggunakan MySQLi)
$koneksi = new mysqli("localhost", "root", "", "db_lazis");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Pernyataan SQL SELECT
$sql = "SELECT id_info, NamaProduk, GambarPaths FROM tb_info";

// Eksekusi pernyataan SQL
$result = $koneksi->query($sql);

// Periksa apakah query berhasil
if ($result->num_rows > 0) {
    // Tampilkan data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        $id = $row["ID"];
        $namaProduk = $row["NamaProduk"];
        $gambarPaths = json_decode($row["GambarPaths"], true); // Mendekode JSON menjadi array PHP

        // Tampilkan data atau lakukan operasi lain sesuai kebutuhan
        echo "<h2>ID: $id</h2>";
        echo "<p>Nama Produk: $namaProduk</p>";
        echo "<p>Gambar Paths:</p>";
        
        // Tampilkan gambar-gambar
        foreach ($gambarPaths as $path) {
            echo "<img src='$path' alt='Gambar Produk'><br>";
        }
    }
} else {
    echo "Tidak ada data ditemukan";
}

// Tutup koneksi
$koneksi->close();
?>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Program</title>
</head>
<body>

<?php
// Koneksi ke database (contoh menggunakan MySQLi)
$koneksi = new mysqli("localhost", "root", "", "db_lazis");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Pernyataan SQL SELECT
$sql = "SELECT program FROM tb_info"; // Ganti NamaTabel sesuai dengan nama tabel Anda

// Eksekusi pernyataan SQL
$result = $koneksi->query($sql);

// Periksa apakah query berhasil
if ($result === false) {
    die("Error dalam eksekusi query: " . $koneksi->error);
}

// Periksa apakah ada hasil data
if ($result->num_rows > 0) {
    echo "<ul class='dropdown-menu'>";
    while ($row = $result->fetch_assoc()) {
        // Ambil data dari kolom program
        $programArray = json_decode($row['program'], true);

        // Tampilkan setiap elemen array sebagai dropdown item
        foreach ($programArray as $program) {
            echo "<li><a class='dropdown-item' href='form_pen_sk.html'>$program</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "Tidak ada data ditemukan";
}

// Tutup koneksi
$koneksi->close();
?>

</body>
</html>
