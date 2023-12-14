<?php
//koneksi
session_start();
include("koneksi.php");

//pemberian kode id secara otomatis
$carikode = $koneksi->query("SELECT id_alternatif FROM tab_alternatif") or die(mysqli_error($koneksi));
$datakode = $carikode->fetch_array();
$jumlah_data = mysqli_num_rows($carikode);

if ($datakode) {
  $nilaikode = substr($jumlah_data, 1);
  $kode = (int) $nilaikode;
  $kode = $jumlah_data + 1;
  $kode_otomatis = str_pad($kode, 0, STR_PAD_LEFT);
} else {
  $kode_otomatis = "1";
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SPK - Metode Topsis</title>
  <!--bootstrap-->
  <link href="styles/slider.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="tampilan/css/bootstrap.min.css">

  <!--icon-->
  <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

  <?php include_once('navbar.php') ?>

  <div class="container">

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Alternatif
          </div>

          <ul class="nav nav-tabs">
            <li>
              <a href="alternatif.php" data-toggle="tab">Tabel Alternatif</a>
            </li>
            <li class="active">
              <a href="alternatiftambah.php" data-toggle="tab">Tambah Alternatif</a>
            </li>
          </ul>

          <div class="panel-body">
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="">
                <!--form alternatif-->
                <form class="form" action="alternatiftambah.php" method="post">
                  <div class="form-group">
                    <input class="form-control" type="text" name="id_alter" value="<?php echo $kode_otomatis ?>" readonly>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="nm_alter" placeholder="Nama Alternatif">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success" type="submit" name="simpan">Tambah</button>
                  </div>
                </form>
                <!--form alternatif-->
              </div>
            </div>
          </div>
          <!--panel body-->
        </div>
      </div>
    </div>

  </div>

  <!--footer-->
  <footer class="text-center">
    <div class="footer-below">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <em>SPK Pemilihan Dosen Terbaik Metode Topsis</em>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <?php

  if (isset($_POST['simpan'])) {
    $id_alter   = $_POST['id_alter'];
    $alternatif = $_POST['nm_alter'];

    // $sql    = "SELECT * FROM tab_alternatif";
    // $tambah = $koneksi->query($sql);

    $masuk = "INSERT INTO tab_alternatif VALUES ('" . $id_alter . "','" . $alternatif . "')";
    $buat  = $koneksi->query($masuk);

    echo "<script>alert('Input Data Berhasil') </script>";
    echo "<script>window.location.href = \"alternatif.php\" </script>";
  }

  ?>


  <!--plugin-->
  <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>