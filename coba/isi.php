<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
<form method="post" action="insert.php" enctype="multipart/form-data">
    Nama : <input type="text" name="nama_info"><br>
    Gambar:
    <input class="form-control form-control-sm shadow-sm" id="formFileSm" type="file" type="file" name="gambar" id="gambar" required><br>
    Gambar 1: <input type="file" name="gambar_1"><br>
    Gambar 2: <input type="file" name="gambar_2"><br>
    Gambar 3: <input type="file" name="gambar_3"><br>
    Deskripsi: <br> 
    <input type="text" name="deskripsi1"><br>
    <input type="text" name="deskripsi2"><br>
    Program (pisahkan dengan koma): <input type="text" name="program"><br>
    Jenis Program <br>
    <input type="text" name="prog1"><br>
    <input type="text" name="prog2"><br>
    <input type="text" name="prog3"><br>
    <input type="text" name="prog4"><br>
    <input type="text" name="prog5"><br>
    <input type="submit" value="Simpan Data">
</form>


</body>
</html>
