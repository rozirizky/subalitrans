<?php include "includes/header.php";

if (isset($_POST['submit'])) {
    $mobil = $_POST['mobil'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $include = $_POST['include'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];

    $tambah = mysqli_query($koneksidb,"INSERT INTO 
    `daftar_mobil` (`id`, `harga`, `mobil`, `kategori`, `deskripsi`, `include`, `gambar`) 
    VALUES (NULL, '$harga', '$mobil', '$kategori', '$deskripsi', '$include', '$gambar');");

    if ($tambah) {
        echo '<script>alert("Mobil behasil ditambahkan");window.location.href="data-mobil.php";</script>';
        move_uploaded_file($tmp_gambar,'img/'.$gambar);
    }else {
        echo '<script>alert("Terjadi Kesalahan");</script>';
    }
}

?>
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
               

                    <div class="col-sm-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h2 class="mb-4">Tambah Mobil</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="mobil"
                                    >
                                <label for="floatingInput">Nama Mobil</label>
                            </div> 
                           
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="harga"
                                    >
                                <label >Harga</label>
                            </div>
                            <div class="form-floating mb-3">
                            
                                <select class="form-select" name="kategori"
                                    aria-label="Floating label select example">
                                    <option selected>Pilih Kategori</option>
                                    <?php   
      $query = mysqli_query($koneksidb,"SELECT * FROM kategori"); 
    
    while ($row = mysqli_fetch_assoc($query)) :?>
    <option value="<?php echo $row['id'] ?>"><?php echo $row['kategori'] ?></option>
        
    
                                    <?php endwhile; ?>
                                </select>
                                <label for="floatingSelect">kategori Mobil</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control"
                                    name="deskripsi" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Deskripsi</label>
                            </div>
                            <fieldset class="row mb-3 mt-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Include</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="include"
                                                 value="lepas kunci" >
                                            <label class="form-check-label" >
                                                Lepas Kunci
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="include"
                                                value="+ driver">
                                            <label class="form-check-label" > Driver
                                            </label>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                                <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Gambar</label>
                                <input class="form-control bg-dark" type="file" name="gambar">
                            </div>
                            <div class="mb-3 mt-5">
                                <button type="submit" class="btn btn-primary" style="width:100%" name="submit">Tambah</button>
                            </div>
                            

                            </form>
                        </div>
                    </div>
                   
                   
               
            </div>
            <!-- Form End -->
                </div>
            </div>
            <?php include "includes/footer.php"?>