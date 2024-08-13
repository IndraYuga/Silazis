<?php
// Konfigurasi koneksi ke database
include 'function/koneksi.php';

// Ambil ID artikel dari parameter URL

// Query untuk mengambil artikel berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM tb_artikel ORDER BY tanggal DESC LIMIT 4");
$result2 = mysqli_query($koneksi, "SELECT * FROM tb_info");                                                                                     
                                                                                        // Ambil data admin
// $info = mysqli_fetch_assoc($result2); 
// $result = mysqli_query($koneksi, $query);



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


  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

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
        <div class="item">
            <div class="img-box">
              <a href="">
                <img src="images/logo/lazis.png" alt="" />
              </a>
            </div>
        </div>
        <div class="item">
            <div class="img-box">
              <a href="artikel.php">
                <img src="images/logo/berita.png" alt="" />
              </a>
            </div>
        </div>
        <div class="item">
            <div class="img-box">
              <a href="donasi.php">
                <img src="images/logo/donasi.png" alt="" />
              </a>
            </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <br>
  <!-- recipe section -->

  
      <div class="btn-box" style="text-align: center;">
        <a href="donasi.php">
          <img src="images/poster.png" alt="" style="height: 180px; width: 360px; "/>
        </a>
      </div>
  <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center" id="berita">
        <h2>
          Kegiatan Kami 
        </h2>
      </div>
      <br>
      <?php while($row = mysqli_fetch_array($result)) { 
        $tanggal = $row['tanggal'];
        $tanggalKonversi = date('d F Y', strtotime($tanggal));
      ?>
      <div class="col-lg-6">
        <div class="d-flex align-items-center bg-white mb-3 w" style="height: 110px;">
            <img class="img-fluid" src="images/<?php echo $row['gambar']; ?>" alt="" style="height: 110px; width: 110px;">
            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?php echo $row['kategori']; ?></a>
                    <a class="text-body" href="berita.php" style="font-size:13px;"><small><?php echo $tanggalKonversi ?></small></a>
                </div>
                <?php
                echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="berita.php?id_artikel=' . $row['id_artikel'] . '">' . $row['judul'] . '</a>';
                ?>

            </div>
        </div>
      </div>
      <?php } ?>
  </section>

    <div class="container">
      <div class="heading_container heading_center" id="pilar">
        <h2>
          Pilar 
        </h2>
      </div>
      <br>
      <?php 
      $result2 = mysqli_query($koneksi, "SELECT * FROM tb_info"); 
      while($info = mysqli_fetch_array($result2)) { ?>
              <div class="col-lg-6">
                <div class="d-flex align-items-center bg-white mb-3 w" style="height: 110px;">
                    <img class="img-fluid" src="images/logo/<?php echo $info['gambar']; ?>" alt="" style="height: 110px; width: 110px;">
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <?php
                        echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="info-pilar.php?id_info='. $info['id_info'] .'">' . $info['NamaInfo'] . '</a>';
                        ?>
                    </div>
                </div>
              </div>
        <?php } ?>
        <br>
    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span><br>Studi Independen Umsida</a><br></p>
      </div>
    </footer>
    <!-- footer section -->
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>