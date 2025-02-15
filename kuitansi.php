<?php
include "function/koneksi.php";

if (isset($_GET['id_donasi'])) {
  $id_donasi = $_GET['id_donasi'];

  // Query untuk mendapatkan data donasi berdasarkan id_donasi
  $sql = "SELECT * FROM tb_donasi WHERE id_donasi = $id_donasi";
  $result = $koneksi->query($sql);
  
  $row = $result->fetch_assoc();

  $namaDonatur = $row['nama'];
  $sql2 = "SELECT * FROM tb_user WHERE nama = '$namaDonatur'";
  $result2 = $koneksi->query($sql2);
  $row2 = $result2->fetch_assoc();
}

// Ambil nilai nominal dari tb_donasi
$angka = $row['nominal'];

// Membuat objek NumberFormatter dengan bahasa Indonesia
$formatter = new NumberFormatter("id", NumberFormatter::SPELLOUT);

// Menggunakan metode format untuk mengonversi angka menjadi teks
$teks = $formatter->format($angka);
$teks = str_replace("Rupiah", "", $teks);

$tanggal = $row['tanggal'];

// Konversi format tanggal
$tanggalKonversi = date('d m Y', strtotime($tanggal));
?>

<html>

<head>
  <link rel="icon" href="logo.png" />
  <title>Kuitansi - LAZISMU UMSIDA</title>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
  <style>
    body {
      font-family: Arial;
    }

    #content {
      width: 100%;
      height: 100%;
    }

    #sk {
      position: absolute;
      font-size: 11px;
      text-align: center;
    }

    #form {
      padding: 0px;
    }
  </style>
</head>

<body>
  <div id="content"
    style="background-image: url('images/kuitansi.png'); background-position: top left;background-repeat: no-repeat;background-size: contain;background-image-resolution: from-image;width:100%;height:100%;">

    <table width="100%">
      <tr>
        <td valign="top" style="width:300px;text-align:center;">
          <table>
            <tr>
              <td valign="top">
                <div id="sk"><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  ______________________________<br><br>
                  <center>Lembaga Amil Zakat Nasional<br>
                    SK. Menteri Agama RI<br>
                    No. 730 Tahun 2016<br>
                    Tanggal 14 Desember 2016 </center>
                  ______________________________
                  <br><br>
                  <center>Kantor Pimpinan daerah Muhammadiyah<br>
                    Kabupaten Sidoarjo Lantai 2 <br>
                    JL. Mojopahit 666B Sidoarjo 61215<br>
                    t.(031)8956842/0812-3011-8660<br>
                    Email: lazismusidoarjo@yahoo.com<br>
                    Website: www.lazismu.org</center>
                  ______________________________
                </div>
              </td>
            </tr>
          </table>
        </td>
        <td valign="top" style="padding-top:60px;padding-left:30px;">
          <br><br><br>
          <div id="form">
            <table>
              <tr>
                <td valign="top">Nomor</td>
                <td valign="top">:</td>
                <td valign="top">
                </td>
                <td width="60%;" valign="top"></td>
                <td valign="top">Tanggal</td>
                <td valign="top">:</td>
                <td valign="top"> <?php echo $tanggalKonversi; ?>
                </td>
              </tr>
              <tr>
                <td colspan="7" align="center">
                  Bismillaahirrahmaanirrahim
                </td>
              </tr>
            </table>
            <table>
              <tr>
                <td colspan="3" valign="top"><br><b>Dengan ini, Saya</b></td>
              </tr>
              <tr>
                <td valign="top">Nama</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $row['nama']; ?>
                </td>
              </tr>
              <tr>
                <td valign="top">Alamat</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $row2['alamat']; ?>
                </td>
              </tr>
              <tr>
                <td valign="top">Telepon</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $row2['hp']; ?>
                </td>
              </tr>
              <tr>
                <td valign="top">NPWZ</td>
                <td valign="top">:</td>
                <td valign="top"></td>
              </tr>
              <tr>
                <td valign="top">NPWP</td>
                <td valign="top">:</td>
                <td valign="top">
                </td>
              </tr>
              <tr>
                <td colspan="3" valign="top"><br><b>Menunaikan</b></td>
              </tr>
              <tr>
                <td colspan="3" valign="top"><?php echo $row['kategori']; ?> : Rp <?php echo $row['nominal']; ?>
                </td>
              </tr>
              <tr>
                <td valign="top">Terbilang</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $teks; ?>
                </td>
              </tr>
              <tr>
                <td valign="top">Keterangan</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $row['keterangan']; ?>
                </td>
              </tr>
            </table>

          </div>
        </td>
      </tr>
    </table>
  </div>
  <button onclick="downloadPDF()">Download PDF</button>

  <script>
        function downloadPDF() {
            var element = document.getElementById('content');

            html2canvas(element).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(imgData, 'PNG', 0, 0, 210, 297);
                pdf.save('converted.pdf');
            });
        }
</script>
</body>

</html>