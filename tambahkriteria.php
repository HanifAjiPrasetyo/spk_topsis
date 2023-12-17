<?php
session_start();
include("koneksi.php");
if (isset($_POST['simpan'])) {
  $id_krit  = $_POST['id_krit'];
  $kriteria = $_POST['nm_krit'];
  $bobot    = $_POST['bobot'];
  $status    = $_POST['status'];
  // $sql    = "SELECT * FROM tab_kriteria";
  // $tambah = $koneksi->query($sql);

  $qBobot = $koneksi->query("SELECT SUM(bobot) FROM tab_kriteria");
  $totalBobot = round($qBobot->fetch_array()[0], 3);

  $sisaBobot = 1.00 - $totalBobot;

  $masuk = "INSERT INTO tab_kriteria VALUES ('" . $id_krit . "','" . $kriteria . "','" . $bobot . "','" . $status . "')";

  if ($bobot <= $sisaBobot) {
    $buat  = $koneksi->query($masuk);
    echo "<script>alert('Input Data Berhasil')</script>";
    echo "<script>window.location.href ='kriteria.php'</script>";
  } else {
    echo "<script>alert('Input Data Gagal')</script>";
    echo "<script>window.location.href ='kriteria.php'</script>";
  }
}
