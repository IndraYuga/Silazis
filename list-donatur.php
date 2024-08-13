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
<br>
<div class="heading_container heading_center">
    <h2>
        Data Donatur
    </h2>
</div>
<br>
<div class="d-flex justify-content-center">
  <a href="list-donasi.php">
    <button type="button" class="btn btn-outline-success bg-success text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      <i class="fa-solid fa-eye"></i>
      Data Donasi
    </button>
  </a>
</div>

  <div class="mt-5">.</div>
                <div class="p-4 " style="padding:10px;" >
                            <?php
                            
                            include "function/koneksi.php";

                            // Query untuk mendapatkan data barang
                            if (isset($_GET['searchName']) || isset($_GET['searchTenggat'])) {
                              $searchName = $_GET['searchName'];
                              $searchTenggat = $_GET['searchTenggat'];
                          
                              // Query berdasarkan nama dan tenggat terpisah
                              if (!empty($searchName) && !empty($searchTenggat)) {
                                  $sql = "SELECT * FROM tb_user WHERE nama != 'admin' AND nama LIKE '%$searchName%' AND tenggat LIKE '%$searchTenggat%'";
                              } elseif (!empty($searchName)) {
                                  $sql = "SELECT * FROM tb_user WHERE nama != 'admin' AND nama LIKE '%$searchName%'";
                              } elseif (!empty($searchTenggat)) {
                                  $sql = "SELECT * FROM tb_user WHERE nama != 'admin' AND tenggat LIKE '%$searchTenggat%'";
                              } else {
                                  $sql = "SELECT * FROM tb_user WHERE nama != 'admin'";
                              }
                            } else {
                                $sql = "SELECT * FROM tb_user WHERE nama != 'admin'";
                            }
                            $result = $koneksi->query($sql);

                            if ($result->num_rows > 0)
                            echo
                            '<div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">HP</th>
                                    <th scope="col" class="text-center">Tenggat</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Password</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                                include 'function/koneksi.php';
                                $sql = "SELECT * FROM tb_user WHERE nama != 'admin'";
                                $result = $koneksi->query($sql);
                                $no = 1;

                                while ($row = $result->fetch_assoc()) {

                                
                                    
                                    echo '<tr>';
                                    echo '<td class="text-center align-middle" >' . $no++ . '</td>';
                                    // echo '<td class="text-center font align-middle"><img src="images/' . $row['gambar'] . '" class="img-thumbnail" height="10px" style="max-width: 60px; max-height: 60px; min-width: 60px; min-height: 60px ;" height="10px"></td>';
                                    echo '<td class="text-center font align-middle">' . $row['nama'] . '</td>';
                                    echo '<td class="font text-center align-middle">' . $row['hp'] . '</td>';
                                    echo '<td class="font text-center align-middle">' . $row['tenggat'] . '</td>';
                                    echo '<td class="font text-center align-middle">' . $row['alamat'] . '</td>';
                                    echo '<td class="font text-center align-middle">' . $row['email'] . '</td>';
                                    echo '<td class="font text-center align-middle">' . $row['password'] . '</td>';
                                    echo '<td class="text-center align-middle">' .
                                        '<div class="dropdown">' .
                                        '<button class="btn btn-secondary dropdown-toggle bg-primary border-0 font" type="button" data-bs-toggle="dropdown" aria-expanded="false">' .
                                        'Menu' .
                                        '</button>' .
                                        '<ul class="dropdown-menu">' .
                                        '<li>' .
                                        '<a href="edit-donatur.php?id_user=' . $row['id_user'] . '" class="btn btn-warning dropdown-item rounded-0 font text-success">
                                        <i class="fa-solid fa-eye"></i>
                                        Edit
                                        </a>' .
                                        '</li>' .
                                        '<li><hr class="dropdown-divider"></li>' .
                                        '<li>' .
                                        '<a href="function/proses-delete.php?id_user=' . $row['id_user'] . '" class="btn btn-warning dropdown-item rounded-0 font text-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">
                                        <i class="fa-solid fa-trash"></i>
                                        Hapus
                                        </a>' .
                                        '</li>' .
                                        '</ul>' .
                                        '</div>' .
                                        '</td>' .
                                        '</tr>';
                                    // $no++;

                                    $nama = $row['nama'];
                            
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                            
                        </div>
                    </div>
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