<?php
//koneksi
session_start();
include("koneksi.php");

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


  <!--menu-->
  <?php include_once('navbar.php') ?>

  <div class="container">

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Alternatif
          </div>

          <ul class="nav nav-tabs">
            <li class="active">
              <a href="alternatif.php" data-toggle="tab">Tabel Alternatif</a>
            </li>
            <li>
              <a href="alternatiftambah.php" data-toggle="tab">Tambah Alternatif</a>
            </li>
            <li class="ms-auto">
              <?php
              $jumlahAlt = $koneksi->query('SELECT COUNT(*) FROM tab_alternatif')->fetch_array();
              ?>
              <div class="mt-3 px-3 mb-3 fw-bold">Jumlah Alt : <?= $jumlahAlt[0] ?></div>
            </li>
          </ul>

          <div class="panel-body">
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="">
                <!--tabel alternatif-->
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <!-- <th>#Alternatif</th> -->
                      <th>Nama Alternatif</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                    while ($row = $sql->fetch_array()) {
                    ?>
                      <tr>
                        <!-- <td><?php echo $intId ?></td> -->
                        <td><?php echo $row[1] ?></td>
                        <td align="center"><a href="editalternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>"><i class="fa fa-edit fa-fw"></i> </td>
                        <td align="center"><a href="hapusalternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>"><i class="fa fa-trash fa-fw text-danger" onclick="return confirm('Hapus alternatif?')"></i> </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!--tabel alternatif-->
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

  <!--plugin-->
  <!-- <script src="tampilan/js/bootstrap.min.js"></script> -->

</body>

</html>