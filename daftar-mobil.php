<?php 
include "admin/includes/coneksi.php";
include "admin/includes/rupiah.php";

$batas = 6;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
$previous = $halaman - 1;
$next = $halaman + 1;
				

$data = mysqli_query($koneksidb,"SELECT * FROM daftar_mobil ");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


if (isset($_POST['filter'])) {
    $kategori = $_POST['kategori'];
    $include = $_POST['include'];
    $query = mysqli_query($koneksidb,"SELECT * FROM daftar_mobil WHERE kategori = '$kategori' AND include = '$include' ");
    
        
}else {
    $query = mysqli_query($koneksidb,"SELECT * FROM daftar_mobil ORDER BY `daftar_mobil`.`harga` ASC  LIMIT $halaman_awal, $batas");
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subali Trans | Daftar Mobil</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href='img/logo.png' rel='shortcut icon'>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="scss/search.scss" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Jl. Kapi Sraba Raya Blok 15N No 6</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+62 822-3448-6513</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">

                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/logo.png" alt="" style="width:60px;height:60px;"> &nbsp;Subali Trans</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link ">Home</a>

                <a href="daftar-mobil.php" class="nav-item nav-link active">Daftar Mobil</a>
                <a href="tour.php" class="nav-item nav-link">Tour dan travel</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                
            </div>

        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        
        <div class="row">
            <div class="col-lg-3">
                <div class="card p-3 shadow mb-3">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                        <h3 class="mb-2">Filter Mobil</h3>
                    </div>
                    <form action="" method="post">
                        <select name="kategori" class="form-control mb-3 bg-light text-center" required>
                            <option value="" >----- Kategori -----</option>
                            <?php  $kategori = mysqli_query($koneksidb,"SELECT * FROM kategori");
                     
                    while ($kategori_mobil = mysqli_fetch_assoc($kategori)) :?>
                            <option value="<?php echo $kategori_mobil['id'] ?>">
                                <?php echo $kategori_mobil['kategori'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <select name="include" class="form-control mb-3 bg-light text-center" required>
                            <option value="">----- Include -----</option>
                            <option value="lepas kunci">Lepas Kunci</option>
                            <option value="Driver + BBM ">Mobil + Driver</option>
                        </select>
                        <button class="btn btn-primary " style="width:100%" type="submit" name="filter">Submit</button>
                    </form>
                </div>
                <div class="card p-3 shadow mb-5 dftr">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                        <h3 class="mb-5">Mobil Terbaru</h3>
                    </div>
                    <?php 
                    $terbaru = mysqli_query($koneksidb,"SELECT * FROM daftar_mobil order by id desc limit 5 ");
                    while ($result = mysqli_fetch_assoc($terbaru)) { ?>

                    <div class="card" style="border-left:none;border-right:none;">

                        <div class="row ">
                            <div class="col-md-4 mt-3 " >
                                <img src="admin/img/<?php echo $result['gambar'] ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8 mt-2">
                                <a href="detail-mobil.php?id=<?php echo $result['id'] ?>" class="float-right">
                                    <h5><?php echo $result['mobil'] ?></h5>
                                </a>
                                <p><?php echo rupiah($result['harga']) ?> / hari</p>
                            </div>
                        </div>


                    </div>
                    <?php } ?>

                </div>
            </div>

            <div class="col-lg-9  mb-5">
                <div class="container">

                    <div class="row g-4">


                        <?php 
$count = mysqli_num_rows($query);
if ($count == 0) { ?>

                        <img src="img/search.webp" class="img-fluid">


                        <?php }else{ ?>


                        <?php 
                        
                        while ($row = mysqli_fetch_assoc($query)) { ?>

                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">


                            <div class="card produk shadow-lg rounded-0 py-2">
                             
                                <img class="card-img-top img-fluid crop rounded-0 p-1"
                                    src="admin/img/<?php echo $row['gambar'] ?>" alt="image">

                                <div class=" text-center p-4">
                              
                                    <h6 class="fw-bold "><?php echo $row['mobil'] ?> 
                                    </h6>
                                    <?php if ($row['include'] == 'Driver + BBM '){ ?>
                                    <p class=" text-start mt-3" ><?php echo $row['include'] ?>
                                    <span style="font-size:12px;">(City Tour Malang)</span><br>
                                    <?php echo rupiah($row['harga']) ?> / hari</p>
                                    <?php }else{ ?>
                                      <p class=" text-start mt-3" ><?php echo $row['include'] ?><br>
                                    
                                    <?php echo rupiah($row['harga']) ?> / hari</p>
                                    <?php } ?>
                                    
                                    <a href="detail-mobil.php?id=<?php echo $row['id'] ?>" class="btn btn-primary mt-2"
                                        style="width:100%;">Sewa Sekarang</a>
                                </div>
                            </div>

                        </div>
                        <?php      }  ?>
                        <?php }  ?>
                        <?php 
                        if(!isset($_POST['filter'])){   
                           
    ?>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php if ($halaman > 1) { ?>
                                <li class="page-item">

                                    <a class="page-link" href="?halaman=<?php echo $previous ?>">Previous</a>
                                </li>
                                <?php      } ?>

                                <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?>
                                <?php if ($x == $halaman) { ?>
                                <li class="page-item"><a class="page-link active-page"
                                        href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php }else { ?>
                                <li class="page-item"><a class="page-link"
                                        href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php } ?>


                                <?php
				}
				?>
                                <?php if ($halaman < $total_halaman) { ?>
                                <li class="page-item">

                                    <a class="page-link" href="?halaman=<?php echo $next ?>">Next</a>
                                </li>
                                <?php     
        
        } ?>
                            </ul>
                        </nav>



                        <?php  }
                        ?>
                       



                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Team End -->

    <?php include "footer.php" ?>