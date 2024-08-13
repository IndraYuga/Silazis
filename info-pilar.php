<?php
include 'function/koneksi.php';

if (isset($_GET['id_info'])) {
  $id_info = $_GET['id_info'];

  // Query untuk mendapatkan data barang berdasarkan id_info
  $sql = "SELECT * FROM tb_info WHERE id_info = $id_info";
  $result = $koneksi->query($sql);
}else {
  echo "ID pilar tidak ditemukan.";
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
    <?php

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
    <section class="slider_section ">
      <div class="slider_container">
        <div class="item">
          <div class="img-box">
            <a href="about.html">
            <img src="images/logo/<?php echo $row['gambar']; ?>" alt="" />
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  
        <div class="heading_container heading_center">
          <h2>
            <?php echo $row['NamaInfo']; ?>
          </h2>
          <br>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Program Pilar <?php echo $row['NamaInfo']; ?>
            </button>
            <!-- <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="form_pen_sk.html"><?php echo $row['program']; ?></a></li>
            </ul> -->
            <?php
            $sql2 = "SELECT program FROM tb_info WHERE id_info = $id_info"; // Ganti NamaTabel sesuai dengan nama tabel Anda

            // Eksekusi pernyataan SQL
            $result2 = $koneksi->query($sql2);
            if ($result2->num_rows > 0) {
              echo "<ul class = 'dropdown-menu'>";
              while ($row2 = $result2->fetch_assoc()) {
                  // Ambil data dari kolom program
                  $programArray = json_decode($row2['program'], true);
          
                  // Tampilkan setiap elemen array sebagai dropdown item
                  foreach ($programArray as $program) {
                      echo "<li><a class='dropdown-item' href=''>$program</a></li>";
                    }
                }
                echo "</ul>";
            }
            ?>
          </div>
          <section class="client_section layout_padding">
            <div class="container">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <!-- <div class="detail-box"> -->
                        <p>
                          <?php echo $row['deskripsi1']; ?>
                        </p>

                    </div>
                    <div class="carousel-item">
                      <!-- <div class="detail-box"> -->
                        <p>
                          <?php echo $row['deskripsi2']; ?>
                        </p>
                      <!-- </div> -->
                    </div>
                  </div>
                  <a class="carousel-control-prev d-none" href="#customCarousel1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </section>
          
        </div>
        <?php
      } else {
        echo "Data pilar tidak ditemukan.";
      }

    // Tutup koneksi
    // $koneksi->close();
    ?>
      <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Kegiatan Kami 
        </h2>
      </div>
      <br>
      <?php 
      $result3 = mysqli_query($koneksi, "SELECT * FROM tb_artikel ORDER BY tanggal DESC LIMIT 4");
      while($artikel = mysqli_fetch_array($result3)) { 
        $tanggal = $artikel['tanggal'];
        $tanggalKonversi = date('d F Y', strtotime($tanggal));
      ?>
      <div class="col-lg-6">
        <div class="d-flex align-items-center bg-white mb-3 w" style="height: 110px;">
            <img class="img-fluid" src="images/<?php echo $artikel['gambar']; ?>" alt="" style="height: 110px; width: 110px;">
            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?php echo $artikel['kategori']; ?></a>
                    <a class="text-body" href="berita.php" style="font-size:13px;"><small><?php echo $tanggalKonversi ?></small></a>
                </div>
                <?php
                echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="berita.php?id_artikel=' . $artikel['id_artikel'] . '">' . $artikel['judul'] . '</a>';
                ?>

            </div>
        </div>
      </div>
      <?php } ?>
  </section>
 
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