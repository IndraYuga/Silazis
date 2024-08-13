<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (contoh menggunakan MySQLi)
    $koneksi = new mysqli("localhost", "root", "", "db_lazis");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Data yang akan disisipkan (ambil dari form POST)
    $namaProduk = $_POST["nama_info"];
    $deskripsi1 = $_POST["deskripsi1"];
    $deskripsi2 = $_POST["deskripsi2"];
    $program = $_POST["program"];
    $prog1 = $_POST["prog1"];
    $prog2 = $_POST["prog2"];
    $prog3 = $_POST["prog3"];
    $prog4 = $_POST["prog4"];
    $prog5 = $_POST["prog5"];

    $programArray = explode(",", $program);
    $programJSON = json_encode($programArray);
    // Mendapatkan informasi file gambar yang diunggah
    $gambarPaths = [];
    for ($i = 1; $i <= 3; $i++) {
        $namaFile = $_FILES["gambar_$i"]["name"];
        $lokasiFileTmp = $_FILES["gambar_$i"]["tmp_name"];

        // Pindahkan file yang diunggah ke lokasi yang diinginkan
        $lokasiSimpan = "../images/$namaFile";
        move_uploaded_file($lokasiFileTmp, $lokasiSimpan);

        // Tambahkan path file ke array
        $gambarPaths[] = $lokasiSimpan;
    }

    // Konversi array gambarPaths menjadi string JSON
    $gambarPathsJSON = json_encode($gambarPaths);

    $gambarName = uniqid() . "_" . $_FILES['gambar']['name'];

    // Lokasi penyimpanan file gambar
    $targetDir = "../images/logo/";
    $targetFile = $targetDir . basename($gambarName);
    // Pindahkan file gambar ke lokasi penyimpanan
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
  
      // Siapkan pernyataan SQL untuk menyimpan data ke dalam tabel
      $sql = "INSERT INTO tb_info (NamaInfo, gambar, GambarPaths, deskripsi1, deskripsi2, program, prog1,  prog2, prog3, prog4, prog5) VALUES ('$namaProduk', '$gambarName', '$gambarPathsJSON', '$deskripsi1', '$deskripsi2', '$programJSON', '$prog1', '$prog2', '$prog3', '$prog4', '$prog5')";
  
      // Eksekusi pernyataan SQL
        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil disisipkan";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
        $gambarName = uniqid() . "_" . $_FILES['gambar']['name'];

        // Lokasi penyimpanan file gambar
        $targetDir = "../images/";
        $targetFile = $targetDir . basename($gambarName);
  
      // Tutup koneksi
      $koneksi->close();
    } else {
      echo "Error saat mengunggah gambar.";
    }
}
?>
