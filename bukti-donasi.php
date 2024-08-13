<?php
include 'function/koneksi.php';

session_start();

// Periksa apakah pengguna sudah login
$hp = $_SESSION['hp'];
$query2 = "SELECT * FROM tb_user WHERE hp = '$hp'LIMIT 1";
$result2 = mysqli_query($koneksi, $query2);                                                                                     
                                                                                        // Ambil data admin
$user = mysqli_fetch_assoc($result2);   
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/fontawesome-6-4-0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

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
  </div>
  <br>
  <div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/hasan.jpeg" alt="Admin" class="rounded-circle" width="150">
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
<br>
<div class="heading_container heading_center">
    <h2>
        Edit Tanggal Donasi Donatur
    </h2>
</div>
<br>
<div class="">

    <?php
    // Include file koneksi
    include "function/koneksi.php";

    // Cek apakah parameter id_pelatihan sudah diterima
    if (isset($_GET['id_donasi'])) {
      $id_donasi = $_GET['id_donasi'];

      // Query untuk mendapatkan data barang berdasarkan id_donasi
      $sql = "SELECT * FROM tb_donasi WHERE id_donasi = $id_donasi";
      $result = $koneksi->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        
        <!-- CONTENT -->
        <div class="mt-4">.</div>
        <div class="container mt-5 mb-5" style="min-height: calc(100vh - 67px - 180px);">
          <div class="card mb-3 shadow-sm border">
            <div class="row g-0">
              <div class="col-xl-7 col-lg-12">
                <div class="card-body">
                  <form action="function/proses-edit-donatur.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_donasi" value="<?php echo $row['id_donasi']; ?>">

                    <label for="exampleDataList" class="form-label" for="nama">Nama Donatur</label>
                    <input class="form-control form-control shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Masukkan Barang" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
                    <br>
                    <label for="exampleDataList" class="form-label" for="tenggat">Bukti</label>
                    <div class="col-xl-4 col-md-12">
                    <div class="d-flex justify-content-center align-items-center mt-4" style="height: 450px;">
                        <img src="images/donasi/<?php echo $row['gambar']; ?>" style="max-width: 400px; max-height: 400px; min-width: 200px; min-height: 200px;" class="img-thumbnail">
                    </div>
                    </div>

                    <div class="bottom-0 end-0 p-1 text-end">
                      <a href="list-donasi.php" class="mg-left btn btn-warning mt-3 text-white">Kembali</a>
                      <input type="submit" name="submit" value="Simpan" class="btn btn-primary mt-3 text-white">
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      } else {
        echo "Data barang tidak ditemukan.";
      }
    } else {
      echo "ID barang tidak ditemukan.";
    }

    // Tutup koneksi
    $koneksi->close();
    ?>


  </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#data-table').DataTable();
        } );
    </script>
  


</body>

</html>