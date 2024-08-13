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
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map" integrity="undefined" crossorigin="anonymous" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    .product-item {
	border: 1px solid #eee;
	margin-bottom: 30px;
    }

    .product-item .down-content {
        padding: 30px;
        position: relative;
    }

    .product-item img {
        width: 100%;
        overflow: hidden;
    }

    .product-item .down-content h4 {
        font-size: 17px;
        color: #1a6692;
        margin-bottom: 20px;
    }

    .product-item .down-content h6 {
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 18px;
        color: #121212;
    }

    .product-item .down-content p {
        margin-bottom: 20px;
    }

    .product-item .down-content ul li {
        display: inline-block;
    }

    .product-item .down-content ul li i {
        color: #f33f3f;
        font-size: 14px;
    }

    .product-item .down-content span {
        position: absolute;
        right: 30px;
        bottom: 30px;
        font-size: 13px;
        color: #f33f3f;
        font-weight: 500;
    }
    .card2 {
    width: 200px;
    height: 200px;
    border-radius: 5px;
    background-color: #ffffff;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    }
  </style>

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
    <!-- end slider section -->
  </div>
  <br>
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <img src="images/logo/user.png" alt="Admin" class="rounded-circle" width="150">

                    <div class="mt-3">
                      <h4><?php echo $user['nama']; ?></h4>
                      <a href="kelola-donasi.php">
                        <button class="btn btn-primary" style="background-color: #ff5a00; border-color: #ff5a00;">Kelola Donasi</button>
                      </a>
                      <a href="kelola-artikel.php">
                        <button class="btn btn-outline-primary" style="color: #ff5a00; border-color: #ff5a00;" >Kelola Artikel</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
        </div>
    </div>
    
</div>
<div class="heading_container heading_center" >
    <h2 >
    Kelola Donasi 
    </h2>
</div>
<br>
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">             
                <div class="card2">
                    <div class="col-md-4">
                        <div class="product-item">
                        <a href="input-donasi.php"><img src="images/logo/plus.jpg" alt=""></a>
                            <div class="down-content">
                                <a href="#"><h4></h4></a>
                                <h6>Input donasi</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card2">
                    <div class="col-md-4">
                        <div class="product-item">
                        <a href="list-donatur.php"><img src="images/logo/detail.jpg" alt=""></a>
                            <div class="down-content">
                                <a href="#"><h4></h4></a>
                                <h6>Data donasi</h6>
                            </div>
                        </div>
                    </div>
                </div>
             
        </div> 
    </div> 
</div> 
            
    <br>
    <!-- <footer class="footer_section">
      <div class="container">
        <p></p>
      </div>
    </footer> -->
    <!-- footer section -->

  </div>
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