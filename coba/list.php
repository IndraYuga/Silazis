<?php
// Konf
include 'koneksi.php';

// Query untuk mengambil daftar artikel
$query = "SELECT * FROM artikel";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Artikel</title>
</head>
<body>
    <h1>Daftar Artikel</h1>
    <ul>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='tampil_artikel.php?id=" . $row['id'] . "'>" . $row['judul'] . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>
