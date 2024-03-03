<?php include "includes/header.php";
$id = $_GET['id'];
$query = mysqli_query($koneksidb, "SELECT * FROM daftar_mobil WHERE id = '$id'");
 $row = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $mobil = $_POST['mobil'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $include = $_POST['include'];
    
    $tambah = mysqli_query($koneksidb,"UPDATE `daftar_mobil` SET `harga` = '$harga',
     `mobil` = '$mobil',
      `kategori` = '$kategori',
       `deskripsi` = '$deskripsi',
        `include` = '$include'
        WHERE `daftar_mobil`.`id` = $id;");

    if ($tambah) {
        echo '<script>alert("Mobil behasil diedit");window.location.href="data-mobil.php";</script>';
   
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
                                 value="<?php echo $row['mobil'] ?>"   >
                                <label for="floatingInput">Nama Mobil</label>
                            </div> 
                           
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="harga"
                                value="<?php echo $row['harga'] ?>"  >
                                <label >Harga</label>
                            </div>
                            <div class="form-floating mb-3">
                            
                                <select class="form-select" name="kategori"
                                    aria-label="Floating label select example">
                                    <?php 
                                    $id_kategori = $row['kategori'];
                                    $aksi = mysqli_query($koneksidb,"SELECT * FROM kategori WHERE id = '$id_kategori'");
                                    $baris = mysqli_fetch_assoc($aksi);
                                    ?>
                                    <option selected value="<?php echo $row['kategori'] ?>"><?php echo $baris['kategori']?></option>
                                    <?php   
      $kategori = mysqli_query($koneksidb,"SELECT * FROM kategori"); 
    
    while ($ro = mysqli_fetch_assoc($kategori)) :?>
    <option value="<?php echo $ro['id'] ?>"><?php echo $ro['kategori'] ?></option>
        
                                    <?php endwhile; ?>
    </select>

                                <label for="floatingSelect">kategori Mobil</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control"
                                    name="deskripsi" style="height: 150px;"> <?php echo $row['deskripsi'] ?></textarea>
                                <label for="floatingTextarea">Deskripsi</label>
                            </div>
                            <fieldset class="row mb-3 mt-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Include</legend>
                                    <div class="col-sm-10">
                                    <?php if ($row['include'] == 'lepas kunci') { ?>
                                        <div class="form-check">
                                            
                                                <input class="form-check-input" type="radio" name="include"
                                                 value="lepas kunci" checked >
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
                                     <?php       }else{ ?>

                                        <div class="form-check">
                                            
                                            <input class="form-check-input" type="radio" name="include"
                                             value="lepas kunci"  >
                                             <label class="form-check-label" >
                                            Lepas Kunci
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="include"
                                            value="+ driver" checked>
                                        <label class="form-check-label" > Driver
                                        </label>
                                    </div>
                                           
                                           <?php } ?>
                                    </div>
                                    
                                </fieldset>
                                <div class="mb-3">
                                <label >Upload Gambar</label><br><br>
                                <img src="img/<?php echo $row['gambar'] ?>" width="100px"><br><br>
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 edit gambar
</button>

<!-- Modal -->

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



            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-secondary ">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload Gambar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4">
      <form action="gantigambar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value = "<?php echo $id ?>">
     <input class="form-control bg-dark" type="file" id="formFile" name ="gambar">
     </div>
        <button type="submit" class="btn btn-primary" style = "width:100%" name="button">edit</button>
        </form>
      </div>
     
    </div>
  </div>
</div>
            <?php include "includes/footer.php"?>