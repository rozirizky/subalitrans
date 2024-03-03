<?php include "includes/header.php"?>
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                   
                                    <th scope="col">No</th>
                                    <th scope="col">kategori</th>
                                 
                                    <th scope="col" colspan="2" class="text-center"><a href="tambahkategori.php " class="btn btn-sm btn-primary "> Tambah Mobil</a></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <?php 
                                    $id = 1;
                                    $query = mysqli_query($koneksidb,"SELECT * FROM kategori");
                                    while($row = mysqli_fetch_assoc($query)):
                                    ?>
                                     <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?= $row['kategori']  ?></td>
                                    <td class="text-center"><a class="btn btn-sm btn-primary" href="delete-kategori.php?id=<?= $row['id']  ?>">delete</a> </td>
                                    <td class="text-center"> <a class="btn btn-sm btn-primary" href="edit-kategori.php?id=<?= $row['id']  ?>">edit</a></td>
                                </tr>

                               <?php
                            $id++;
                            endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php include "includes/footer.php"?>