<?php include "includes/header.php";

if (isset($_POST['submit'])) {
    $wisata = $_POST['wisata'];
    $harga = $_POST['harga'];
    $destinasi = $_POST['destinasi'];
    $deskripsi = htmlentities($_POST['deskripsi']);
    $fasilitas = $_POST['fasilitas'];
    $gambar1 = $_FILES['gambar1']['name'];
    $tmp_gambar1 = $_FILES['gambar2']['tmp_name'];
    $gambar2 = $_FILES['gambar2']['name'];
    $tmp_gambar2 = $_FILES['gambar2']['tmp_name'];
    $jumlah = $_POST['orang'];

    $tambah = mysqli_query($koneksidb,"INSERT INTO `tour` 
    (`id`, `wisata`, `harga`, `deskripsi`, `destinasi`, `fasilitas`, `gambar1`, `gambar2`,`orang`) 
    VALUES 
    (NULL, '$wisata', '$harga', '$deskripsi', '$destinasi', '$fasilitas', '$gambar1', '$gambar2','$jumlah');");

    if ($tambah) {
        echo '<script>alert("Mobil behasil ditambahkan");window.location.href="data-mobil.php";</script>';
        move_uploaded_file($tmp_gambar1,'img/'.$gambar1);
        move_uploaded_file($tmp_gambar2,'img/'.$gambar2);
    }else {
        echo '<script>alert("Terjadi Kesalahan");</script>';
    }
}

?>
<script src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">

        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
           
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h2 class="mb-4">Tambah wisata</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="center">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="wisata">
                            <label for="floatingInput">Tour wisata</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="harga">
                            <label>Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="orang">
                            <label>jumlah orang</label>
                        </div>
                    	<div class="form-group mb-3">
										<label class=" control-label mb-1">Deskripsi</label>
									
											<textarea class="form-control" name="deskripsi" rows="3" ></textarea>
									

									</div>
                                    <div class="form-group mb-3 ">
										<label class=" control-label mb-1">Destinasi</label>
										
											<textarea class="form-control" name="destinasi" rows="3" ></textarea>
									

									</div>
                                    <div class="form-group mb-3">
										<label class=" control-label mb-1">Fasilitas</label>
										
											<textarea class="form-control" name="fasilitas" rows="3" ></textarea>
									

									</div>
                        <div class="form-floating">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Gambar 1</label>
                                <input class="form-control bg-dark" type="file" name="gambar1">
                            </div>
                            <div class="form-floating">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Gambar 2</label>
                                    <input class="form-control bg-dark" type="file" name="gambar2">
                                </div>
                                <div class="mb-3 mt-5">
                                    <button type="submit" class="btn btn-primary" style="width:100%"
                                        name="submit">Tambah</button>
                                </div>


                    </form>
                </div>
            </div>



        </div>
        <!-- Form End -->
    </div>
</div>
<?php include "includes/footer.php"?>