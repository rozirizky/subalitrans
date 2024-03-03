<?php
include "includes/coneksi.php";
$id = $_POST['id'];
if (isset($_POST['button'])) {
  
    $gambar = $_FILES['gambar']['name'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];

    $tambah = mysqli_query($koneksidb,"UPDATE `daftar_mobil` SET 
        `gambar` = '$gambar' WHERE `daftar_mobil`.`id` = $id;");

    if ($tambah) {
        echo '<script>alert("gambar behasil diedit");window.location.href="edit.php?id='.$id.'";</script>';
        move_uploaded_file($tmp_gambar,'img/'.$gambar);
    }else {
        echo '<script>alert("Terjadi Kesalahan");</script>';
    }
}