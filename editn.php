<?php
//koneksi
session_start();
include("koneksi.php");

$alternatif = $_POST['id_alternatif'];
$kriteria   = $_POST['id_kriteria'];
$nilai       = $_POST['nilai'];

$query = "UPDATE tab_topsis SET nilai = $nilai WHERE id_alternatif=$alternatif AND id_kriteria=$kriteria";

$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Ubah Nilai Matriks Berhasil') </script>";
    echo "<script>window.location.href = \"nilmat.php\" </script>";
} else {
    echo "<script>alert('Ubah Nilai Matriks Gagal')</script>";
    echo "<script>window.location.href = \"nilmat.php\" </script>";
}
