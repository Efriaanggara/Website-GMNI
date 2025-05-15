<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

header('Location: kategori.php'); // balik ke daftar kategori
exit;
?>