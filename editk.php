<?php
//untuk koneksi ke database
session_start();
include("koneksi.php");

//proses edit
$id_krit  = $_POST['id_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot    = $_POST['bobot'];
$status   = $_POST['status'];

// $ubah = mysql_query("UPDATE tab_kriteria SET nama_kriteria ='".$nama_kriteria."',bobot ='".$bobot."',status ='".$status."' WHERE id_kriteria='".$id_krit."' ");

$qBobot = $koneksi->query("SELECT SUM(bobot) FROM tab_kriteria");
$cBobot = $koneksi->query("SELECT bobot FROM tab_kriteria WHERE id_kriteria = $id_krit");
$currentBobot = round($cBobot->fetch_array()[0], 3);
$totalBobot = round($qBobot->fetch_array()[0], 3);

$query = "UPDATE tab_kriteria SET nama_kriteria ='$nama_kriteria' , bobot ='$bobot' ,status ='$status' WHERE id_kriteria='$id_krit' ";

if ($totalBobot + $bobot - $currentBobot <= 1.00) {
  $result = mysqli_query($koneksi, $query);
  echo "<script>alert('Ubah Data Dengan ID = " . $id_krit . " Berhasil') </script>";
  echo "<script>window.location.href = \"kriteria.php\" </script>";
} else {
  echo "<script>alert('Bobot melebihi 1.00')</script>";
  echo "<script>window.location.href = \"kriteria.php\" </script>";
}

// if ($result) {
//   // code...
//   echo "<script>alert('Ubah Data Dengan ID = " . $id_krit . " Berhasil') </script>";
//   echo "<script>window.location.href = \"kriteria.php\" </script>";
// } else {
//   // code...
//   echo "<script>alert('Bobot melebihi 1.00')</script>";
//   echo "<script>window.location.href = \"kriteria.php\" </script>";
// }
