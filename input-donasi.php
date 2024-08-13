<?php
include 'function/koneksi.php';

session_start();

// Periksa apakah pengguna sudah login
$hp = $_SESSION['hp'];
$query2 = "SELECT * FROM tb_user WHERE hp = '$hp' LIMIT 1";
$result2 = mysqli_query($koneksi, $query2);                                                                                     
                                                                                        // Ambil data admin
$user = mysqli_fetch_assoc($result2);   
if (!$user) {
  header("Location: login.php");
  exit();
}

// Query untuk mendapatkan daftar nama donatur
$queryAnggota = "SELECT nama FROM tb_user";
$resultAnggota = $koneksi->query($queryAnggota);

// Mengambil hasil query dan menyimpannya dalam bentuk array
$daftarAnggota = array();
while ($rowAnggota = $resultAnggota->fetch_assoc()) {
    $daftarAnggota[] = $rowAnggota;
}

// Menyimpan daftar anggota dalam bentuk JSON untuk diakses oleh JavaScript
$daftarAnggotaJSON = json_encode($daftarAnggota);
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
  <div class="col-lg-8">
					<div class="card">
						<div class="card-body">
            <div class="heading_container heading_center">
              <h2>
                Input Donasi
              </h2>
              <br>
              <form action="function/proses-input-donasi.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_pc" value="">
                <div class="form-group mb-3">
                    <label for="nama_donatur">Nama Donatur</label>
                    <input type="text" class="form-control" id="nama_donatur_input" name="nama_donatur" required>
                    <div id="suggestions" class="suggestions" style="border: 1px solid #ccc; max-height: 150px; overflow-y: auto; display: none;"></div>
                </div>

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
                  <br>

                  <label for="exampleDataList" class="form-label" for="nominal">Nominal</label>
                  <input class="form-control form-control shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Masukkan nominal" name="nominal" id="nominal" value="" required>

                  <br>
                  <label for="floatingTextarea2" for="keterangan">Keterangan</label>
                    <div class="form-floating mt-3">
                      <textarea class="form-control shadow-sm" placeholder="Masukkan Keterangan" id="floatingTextarea2" style="height: 100px" name="keterangan" id="keterangan" required></textarea>
                    </div>
                  <!-- <div>
                      <label for="isi"></label>
                      <textarea id="" name="isi">
                      </textarea>
                  </div> -->
                  <label for="exampleDataList" class="form-label mt-2" for="tanggal">Tanggal</label>
                    <input class="form-control form-control-sm shadow-sm" type="date" placeholder="Masukkan Jumlah Data" aria-label=".form-control-sm example" type="date" name="tanggal" id="tanggal">


                  <div class="bottom-0 end-0 p-1 text-end">
                      <a href="pendidikan.html" class="mg-left btn btn-warning mt-3 text-white">Kembali</a>
                      <input type="submit" name="submit" value="Kirim" class="btn btn-primary mt-3 text-white">
                  </div>
              </form>
            </div>
            </div>
          </div>  
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script>
                            const daftarAnggota = <?php echo $daftarAnggotaJSON; ?>;
                            const namaAnggotaInput = document.getElementById("nama_donatur_input");
                            const suggestions = document.getElementById("suggestions");

                            namaAnggotaInput.addEventListener("input", function () {
                                const searchText = namaAnggotaInput.value.trim().toLowerCase();

                                suggestions.innerHTML = "";

                                if (searchText.length === 0) {
                                    suggestions.style.display = "none";
                                    return;
                                }

                                daftarAnggota.forEach(anggota => {
                                    const nama = anggota.nama.toLowerCase();
                                    if (nama.includes(searchText)) {
                                        const suggestionItem = document.createElement("div");
                                        suggestionItem.className = "suggestion-item";
                                        suggestionItem.textContent = anggota.nama;

                                        suggestionItem.addEventListener("click", function () {
                                            namaAnggotaInput.value = anggota.nama;
                                            suggestions.style.display = "none";
                                        });

                                        suggestions.appendChild(suggestionItem);
                                    }
                                });

                                if (suggestions.children.length > 0) {
                                    suggestions.style.display = "block";
                                } else {
                                    suggestions.style.display = "none";
                                }
                            });
                        </script>


</body>

</html>