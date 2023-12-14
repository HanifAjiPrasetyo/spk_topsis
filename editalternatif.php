<?php
//koneksi
session_start();
include("koneksi.php");

$id_alter   = $_GET['id_alternatif'];
$alternatif = $koneksi->query("SELECT * FROM tab_alternatif WHERE id_alternatif = '" . $id_alter . "'");

while ($row = $alternatif->fetch_row()) {
  $nama  = $row[1];
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

</head>

<body>

  <!--menu-->
  <?php include_once('navbar.php') ?>

  <div class="container">

    <div class="row">
      <!--form alternatif-->
      <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Edit Alternatif
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form class="form" action="edita.php" method="post">
                  <div class="form-group">
                    <input class="form-control" type="text" name="id_alternatif" value=<?php echo $_GET['id_alternatif']; ?> readonly>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama_alternatif" value=<?php echo $nama; ?>>
                  </div>
                  <div class="form-group">
                    <a href="alternatif.php"><button type="button" class="btn btn-danger">Batal</button></a>
                    <button type="submit" class="btn btn-success">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--form alternatif-->

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