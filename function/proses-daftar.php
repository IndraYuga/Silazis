<?php
include 'koneksi.php';
// jika form di submit, masukkan data ke basis data.
if (isset($_POST['submit'])){
// menghapus backslashes
    $nama = stripslashes($_POST['nama']);
    $hp = stripslashes($_POST['hp']);
    $password = stripslashes($_POST['password']);


    $nama = mysqli_real_escape_string($koneksi,$nama);
    $hp = mysqli_real_escape_string($koneksi, $hp);
    $password = mysqli_real_escape_string($koneksi,$password);
    $query = mysqli_query($koneksi,"INSERT into tb_user (nama, hp, password) VALUES ('$nama', '$hp', '$password')");
    if($query){
        header('Location: ../login.php');
    }
}else{
header('Location: ../daftar.php');
}
?>