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
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="tampilan/css/bootstrap.min.css">
  <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php include_once('navbar.php') ?>

  <!--tabel-tabel dan form-->
  <div class="container"> <!--container-->
    <div class="row"> <!--row-->
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Nilai Matriks
          </div>

          <div class="panel-body">
            <!--form pengisian-->
            <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    Alternatif
                  </div>

                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form class="form" action="tambahnilmat.php" method="post">
                          <div class="form-group">
                            <select class="form-control" name="alter">
                              <option>Nama Alternatif</option>
                              <?php
                              //ambil data dari database
                              $nama = $koneksi->query('SELECT * FROM tab_alternatif');
                              while ($datalter = $nama->fetch_array()) {
                                echo "<option value=\"$datalter[id_alternatif]\">$datalter[nama_alternatif]</option>\n";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control" name="krit">
                              <option>Nama Kriteria</option>
                              <?php
                              //ambil data dari database
                              $krit = $koneksi->query('SELECT * FROM tab_kriteria');
                              while ($datakrit = $krit->fetch_array()) {
                                echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[nama_kriteria]</option>\n";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control" name="nilai">
                              <option>Nilai</option>3
                              <option value="10">10</option>
                              <option value="9">9</option>
                              <option value="8">8</option>
                              <option value="7">7</option>
                              <option value="6">6</option>
                              <option value="5">5</option>
                              <option value="4">4</option>
                              <option value="3">3</option>
                              <option value="2">2</option>
                              <option value="1">1</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success">Proses</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--tabel-tabel-->
              <div class="row">
                <!--tabel alternatif-->
                <div class="col-xs-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      Tabel Alternatif
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">

                          <?php
                          $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                          ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>#Alternatif</th>
                                <th>Nama Alternatif</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i = 1;
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">" . $i . "</td>");
                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                echo "</tr>";
                                $i++;
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!--tabel kriteria-->

                <div class="col-xs-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      Tabel Kriteria
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">

                          <?php
                          $sql = $koneksi->query('SELECT * FROM tab_kriteria');
                          ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                echo ("<td align=\"left\">" . $row[2] . "</td>");
                                echo "</tr>";
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div> <!--row-->
  </div> <!--container-->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Tabel Pemberian Nilai
          </div>

          <div class="panel-body">
            <?php
            //pemanggilan data, matra dan pangkat
            $sql = $koneksi->query("SELECT * FROM tab_topsis
                  JOIN tab_alternatif ON tab_topsis.id_alternatif=tab_alternatif.id_alternatif
                  JOIN tab_kriteria ON tab_topsis.id_kriteria=tab_kriteria.id_kriteria") or die(mysqli_error($koneksi));
            ?>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ALTERNATIF</th>
                  <th>KRITERIA</th>
                  <th>NILAI</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                //menampilkan data
                while ($row = $sql->fetch_array()) {
                  $nmkriteria   = $row['nama_kriteria'];
                  echo ("<tr><td align=\"center\">" . $no . "</td>");
                  echo ("<td align=\"left\">" . $row[4] . "</td>");
                  echo ("<td align=\"left\">" . $nmkriteria . "</td>");
                  echo ("<td align=\"left\">" . $row[2] . "</td>");
                ?>
                  <td align="left">
                    <a href="editnilmat.php?id_alternatif=<?php echo $row['id_alternatif'] ?>&id_kriteria=<?= $row['id_kriteria'] ?>" class="me-3">
                      <i class="fa fa-edit fa-fw text-primary"></i>
                    </a>
                    <a href="hapusnilmat.php?id_alternatif=<?php echo $row['id_alternatif'] ?>&id_kriteria=<?= $row['id_kriteria'] ?>">
                      <i class="fa fa-trash fa-fw text-danger" onclick="return confirm('Hapus nilai matriks?')"></i>
                    </a>
                  </td>
                <?php
                  echo "</tr>";
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> <!--row-->
  </div> <!--container-->
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