<?php include "includes/header.php"?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">

                        <th scope="col">No</th>
                        <th scope="col">Mobil</th>
                        <th scope="col">harga</th>
                        <th scope="col">kategori</th>
                        <th scope="col">deskripsi</th>
                        <th scope="col">include</th>
                        <th scope="col">gambar</th>
                        <th scope="col" colspan="2"> <a href="tambahmobil.php" class="btn btn-sm btn-primary"> Tambah
                                Mobil</a></th>
                    </tr>
                </thead>
                <tbody>

                    <?php   
      $query = mysqli_query($koneksidb,"SELECT * FROM daftar_mobil ORDER BY `id` DESC "); 
      $id = 1;
    
    while ($row = mysqli_fetch_assoc($query)) :?>


                    <tr>

                        <td><?php echo $id ?></td>
                        <td><?php echo $row['mobil'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <?php 
                                    $id_kategori = $row['kategori'];
                                    $kategori = mysqli_query($koneksidb,"SELECT * FROM kategori WHERE id = '$id_kategori'  "); 
                                    $nama_kategori = mysqli_fetch_assoc($kategori) ?>
                        <td><?php echo $nama_kategori['kategori'] ?></td>
                        <td>
                            <p>
                                <a class="link-primary" data-bs-toggle="collapse" href="#collapseExample"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                   show more
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <?php echo $row['deskripsi'] ?>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $row['include'] ?></td>
                        <td><img src="img/<?php echo $row['gambar'] ?>" width="50px"></td>


                        <td><a class="btn btn-sm btn-outline-primary" href="delete.php?id=<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></a>
                        </td>
                        <td> <a class="btn btn-sm btn-outline-warning" href="edit.php?id=<?php echo $row['id'] ?>"><i class="bi bi-pencil-fill"></i></a>
                        </td>
                    </tr>
                    <?php 
                                $id++;
                                endwhile; ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->

<?php include "includes/footer.php"?>