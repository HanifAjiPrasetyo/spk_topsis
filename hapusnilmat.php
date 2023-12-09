<?php
//untuk koneksi ke database
session_start();
include("koneksi.php");

//proses delete
$id_alter = $_GET['id_alternatif'];
$id_krit = $_GET['id_kriteria'];
$sql   = "DELETE FROM tab_topsis WHERE id_alternatif = '$id_alter' AND id_kriteria = '$id_krit'";
$hapus = $koneksi->query($sql);

if ($hapus === TRUE) {
    echo "<script>alert('Hapus ID Alt = " . $id_alter . " dan ID Krit = " . $id_krit . " Berhasil') </script>";
    echo "<script>window.location.href = \"nilmat.php\" </script>";
} else {
    echo "Maaf Tidak Dapat Menghapus !";
}
