<?php 
include 'includes/coneksi.php';
$id = $_GET['id'];
$delete = mysqli_query($koneksidb,"DELETE FROM kategori WHERE id = '$id'");
if ($delete) {
	header("location: kategori.php");
}else{
    echo "gagal";
}
 ?>