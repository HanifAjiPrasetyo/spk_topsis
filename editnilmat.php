<?php
//koneksi
session_start();
include("koneksi.php");

//perintah untuk menampilkan hasil edit
$id_krit  = $_GET['id_kriteria'];
$id_alt  = $_GET['id_alternatif'];

$nilmat = $koneksi->query("SELECT * FROM tab_topsis INNER JOIN tab_kriteria ON tab_kriteria.id_kriteria = tab_topsis.id_kriteria INNER JOIN tab_alternatif ON tab_alternatif.id_alternatif = tab_topsis.id_alternatif WHERE tab_topsis.id_alternatif = $id_alt AND tab_topsis.id_kriteria = $id_krit");

while ($row = $nilmat->fetch_row()) {
    $nama_alternatif = $row[8];
    $nama_kriteria = $row[4];
    $nilai = $row[2];
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
            <!--form kriteria-->
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Edit Nilai Matriks
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form" action="editn.php" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_alternatif" value=<?php echo $_GET['id_alternatif']; ?> readonly>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_kriteria" value=<?php echo $_GET['id_kriteria']; ?> readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_alternatif">Nama Alternatif</label>
                                        <input id="nama_alternatif" class="form-control" type="text" name="nama_alternatif" value="<?php echo $nama_alternatif; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kriteria">Nama Kriteria</label>
                                        <input id="nama_kriteria" class="form-control" type="text" name="nama_kriteria" value="<?= $nama_kriteria; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai">Nilai Matriks</label><span class="ms-2">(Nilai saat ini : <?= $nilai; ?>)</span>
                                        <select class="form-control" name="nilai">
                                            <option selected>Nilai</option>
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
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                        <a href="nilmat.php"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                    <div class="form-group">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--form kriteria-->

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