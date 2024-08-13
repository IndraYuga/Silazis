<?php
include 'function/koneksi.php';

session_start();

// Periksa apakah pengguna sudah login
$hp = $_SESSION['hp'];

$query = "SELECT * FROM tb_user WHERE hp = '$hp' LIMIT 1";
$result = mysqli_query($koneksi, $query);                                                                                     
                                                                                        // Ambil data admin
$user = mysqli_fetch_assoc($result);     

if (!$user) {
    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Lazismu</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <!-- slidck slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map" integrity="undefined" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
<!-- POP UP INPUT DATA -->
<div class="modal fade shadow-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #F59402;">
        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
          Tata Cara Donasi
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol>
          <li>
            <h6><b>Scan QR Code diatas untuk diarahkan ke halaman donasi atau bisa download gambar QR Code dibawah</b></h6>
            <div style="text-align: center;">

            <img src="images/qr2.jpeg" alt="" style="width: 200px;">
            <a href="images/qr2.jpeg" download>
              <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style=" background-color: #F59402; border-color: #F59402;">
                  Unduh QR Code
              </button>
            </div>
            </a>
          </li>
          <br>
          <li><h6><b>Setelah QR Code di download silahkan buka aplikasi transfer yang anda ingin pakai</b></h6></li>
          <li><h6><b>Masukkan gambar QR Code tadi untuk discan</b></h6>
          <div style="text-align: center;">
          <img src="images/tutor1.jpeg" alt="" style="width: 300px;">
          <img src="images/tutor3.jpeg" alt="" style="width: 300px;">
          </div>
          <br>
          </li>
          <li><h6><b>Setelah Scan nanti anda akan diarahkan ke halaman bayar donasi</b></h6></li>
          <li><h6><b>Lakukan Proses Pembayaran Donasi</b></h6></li>
          <li><h6><b>Jangan lupa untuk Screenshot bukti pembayaran telah berhasil</b></h6></li>
          <li><h6><b>Jika sudah melakukan Pembayaran silahkan isi form dibawah untuk konfirmasi</b></h6></li>
        </ol>
        
      </div>
    </div>
  </div>
</div>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
              Silazis
            </span>
          </a>
          <div class="" id="">
            <div class="User_option">
              <a href="profil.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Login</span>
              </a>
            </div>
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <img src="images/menu.png" alt="">
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">Home</a>
                <a href="artikel.php">Kegiatan</a>
                <a href="pilar.php">Pilar</a>
                <a href="donasi.php">Donasi</a>
                <a href="profil.php">Profil</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section ">
      <div class="slider_container">
        <img src="images/qr2.jpeg"  alt="" />
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <div class="heading_container heading_center">
  <br>
    <b>Sebelum Donasi Baca ini dulu ya..</b>
    <div style="text-align: center;">
      <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-align: center; background-color: #F59402; border-color: #F59402;">
          Tutorial Donasi
      </button>
    </div>
    <br>
    <h2>
      Form Donasi
    </h2>
    

    <br>
    <form action="function/proses-input-donasi-user.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pc" value="">

        <label for="exampleDataList" class="form-label" for="nama">Nama</label>
        <input class="form-control form-control shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Masukkan Nama" name="nama" id="nama" value="<?php echo $user['nama']; ?>" required>

        <label for="kategori">Kategori:</label>
                  <div>
                    <select name="kategori" id="kategori" class="w-100">
                    <option value="" selected disabled>Pilih Kategori</option>
                    <?php
                    // Ambil nilai ENUM dari kolom 'kategori' pada tabel SQL
                    $query_enum = "SHOW COLUMNS FROM tb_donasi LIKE 'kategori'";
                    $result_enum = mysqli_query($koneksi, $query_enum);
                    $row_enum = mysqli_fetch_assoc($result_enum);
                    $enum_str = $row_enum['Type'];

                    // Ekstrak nilai ENUM dari string
                    preg_match_all("/'([^']+)'/", $enum_str, $matches);

                    // Loop melalui nilai ENUM dan buat opsi dropdown
                    foreach ($matches[1] as $enum_value) {
                        echo '<option value="' . $enum_value . '">' . $enum_value . '</option>';
                    }
                    ?>
                    </select>
                  </div>

        <!-- <label for="floatingTextarea2" for="alamat">Alasan</label>
        <textarea class="form-control shadow-sm" placeholder="Masukkan Alamat" style="height: 100px" name="alamat" aria-placeholder="Masukkan Alasan" id="alamat" required> </textarea> -->
        <label for="exampleDataList" class="form-label" for="nominal">Nominal</label>
                  <input class="form-control form-control shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Masukkan nominal" name="nominal" id="nominal" value="" required>

                  <br>
                  <label for="floatingTextarea2" for="keterangan">Keterangan</label>
                    <div class="form-floating mt-3">
                      <textarea class="form-control shadow-sm" placeholder="Masukkan Keterangan" id="floatingTextarea2" style="height: 100px" name="keterangan" id="keterangan"></textarea>
                    </div>
                  <div class="mb-3">
                    <label for="formFileSm" class="form-label mt-2 " for="gambar">Bukti Pembayaran</label>
                    <input class="form-control form-control-sm shadow-sm" id="formFileSm" type="file" type="file" name="gambar" id="gambar" required>
                  </div>


          <div class="col-sm-3"></div>
						<div class="col-sm-9 text-secondary">
              <input type="submit" name="submit" value="Bayar" class="btn btn-primary mt-3 text-white w-100">
            </div>
          </div>

    </form>
  </div>
  <br>
  

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span><br>Studi Independen Umsida</a><br></p>
      </div>
    </footer>
    <!-- footer section -->

  </div>
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>