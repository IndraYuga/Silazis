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
    <!-- end slider section -->
  </div>
  <br>
<div class="container">
    <div class="main-body">
    <div class="row gutters-sm">
    <?php
    if ($user['kelas'] == 'admin') {
        echo '
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/logo/user.png" alt="Admin" class="rounded-circle" width="150">

                        <div class="mt-3">
                            <h4>' . $user['nama'] . '</h4>
                            <a href="kelola-donasi.php">
                                <button class="btn btn-primary" style="background-color: #ff5a00; border-color: #ff5a00;">Kelola Donasi</button>
                            </a>
                            <a href="kelola-artikel.php">
                                <button class="btn btn-outline-primary" style="color: #ff5a00; border-color: #ff5a00;">Kelola Artikel</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    } else {
        echo '
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/logo/user.png" alt="Admin" class="rounded-circle" width="150">

                        <div class="mt-3">
                            <h4>' . $user['nama'] . '</h4>
                            <a href="donasi.php">
                                <button class="btn btn-primary" style="background-color: #ff5a00; border-color: #ff5a00;">Donasi</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    ?>

        <div class="col-lg-8">
					<div class="card">
						<div class="card-body">
                        <form action="function/proses-update-profil.php" method="POST">
                        <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nama Lengkap</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $user['nama']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nomor HP</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="hp" id="hp" value="<?php echo $user['hp']; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Alamat</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $user['alamat']; ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" name="submit" class="btn btn-primary px-4 w-100" value="Update Profil">
								</div>
							</div>
                            <br>
                            <div class="row">
                                <div class="col-sm-9 text-secondary">
                                    <a href="function/proses-logout.php">
                                        <input type="button" class="btn btn-primary px-4 w-100" style="background-color: #ff0000;border-style: none;" value="Logout">
                                    </a>
                                </div>
                            </div>
                        </form>
						</div>
                    </div>  
            </div>
    </div>
    <br>
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
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>