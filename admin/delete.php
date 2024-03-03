<?php 
include 'includes/coneksi.php';
$id = $_GET['id'];
$delete = mysqli_query($koneksidb,"DELETE FROM daftar_mobil WHERE id = '$id'");
if ($delete) {
	header("location:data-mobil.php");
}else{
    echo "gagal";
}
 ?>