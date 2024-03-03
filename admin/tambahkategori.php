<?php include "includes/header.php";

if (isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
   
    $tambah = mysqli_query($koneksidb,"INSERT INTO `kategori` (`id`, `kategori`) VALUES (NULL, '$kategori');");

    if ($tambah) {
        echo '<script>alert("kategori behasil ditambahkan");window.location.href="kategori.php";</script>';
        
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
                            <h2 class="mb-4">Tambah Kategori</h2>
                            <form action="" method="post" >
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kategori"
                                    >
                                <label for="floatingInput">Kategori</label>
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