<?php
//koneksi
session_start();
include("koneksi.php");

//pemberian kode id secara otomatis
$carikode = $koneksi->query("SELECT id_kriteria FROM tab_kriteria") or die(mysqli_error($koneksi));
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

if (isset($_POST['simpan'])) {
  $id_krit = $_POST['id_krit'];
  $kriteria = $_POST['nm_krit'];
  $bobot = $_POST['bobot'];
  $status = $_POST['status'];

  // Menghitung jumlah bobot saat ini
  $sqlHitungBobot = "SELECT SUM(bobot) AS total_bobot FROM tab_kriteria";
  $resultHitungBobot = $koneksi->query($sqlHitungBobot);
  $dataHitungBobot = $resultHitungBobot->fetch_assoc();
  $totalBobotSaatIni = $dataHitungBobot['total_bobot'];

  // Menambahkan bobot baru
  $totalBobotBaru = $totalBobotSaatIni + $bobot;

  // Memeriksa apakah total bobot setelah penambahan lebih dari 1
  if ($totalBobotBaru > 1) {
    // Jika jumlah bobot melebihi 1, tampilkan pesan error
    echo "<script>alert('Jumlah bobot telah melebihi 1')</script>";
  } else {
    // Jika jumlah bobot tidak melebihi 1, lanjutkan dengan penambahan kriteria
    $masuk = "INSERT INTO tab_kriteria VALUES ('$id_krit', '$kriteria', '$bobot', '$status')";
    $buat = $koneksi->query($masuk);

    echo "<script>alert('Input Data Berhasil')</script>";
    echo "<script>window.location.href ='kriteria.php'</script>";
  }
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
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="tampilan/css/bootstrap.min.css">

  <!--icon-->
  <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
  <!--menu-->
  <?php include_once('navbar.php') ?>

  <div class="container">

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Kriteria
          </div>

          <ul class="nav nav-tabs">
            <li>
              <a href="kriteria.php" data-toggle="tab">Tabel Kriteria</a>
            </li>
            <li class="active">
              <a href="kriteriatambah.php" data-toggle="tab">Tambah Kriteria</a>
            </li>
          </ul>

          <div class="panel-body">
            <!-- Tab panes -->
            <div class="tab-content">
              <!--form kriteria-->
              <form class="form" action="kriteriatambah.php" method="post">
                <div class="form-group">
                  <input class="form-control" type="text" name="id_krit" value="<?php echo $kode_otomatis; ?>" readonly>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="nm_krit" placeholder="Nama Kriteria">
                </div>
                <div class="form-group">
                  <input class="form-control mb-2" type="text" name="bobot" placeholder="Bobot">
                  <!-- <span class="ms-2 text-primary fs-5 fw-bold">Sisa bobot : <?= $sisaBobot;  ?></span> -->
                </div>
                <div class="form-group">
                  <select class="form-select form-control" name="status">
                    <option selected>-- Jenis --</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                  </select>
                </div>

                <!-- <div class="form-group">
                    <button class="btn btn-success" type="submit" name="simpan" disabled>Tambah</button>
                    <span class="ms-2 text-danger fs-5 fw-bold">Total bobot sudah 1 atau 100%</span>
                  </div> -->
                <div class="form-group">
                  <button class="btn btn-success" type="submit" name="simpan">Tambah</button>
                </div>
              </form>
              <!--form kriteria-->
            </div>
          </div>
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

  <!--plugin-->
  <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>
