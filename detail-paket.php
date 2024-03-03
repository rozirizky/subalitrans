<?php
include "admin/includes/coneksi.php";
include "admin/includes/rupiah.php";
$id = $_GET['id'];
$query = mysqli_query($koneksidb,"SELECT * FROM tour WHERE id = '$id'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subali Trans | Detail Paket</title>
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
            <h2 class="m-0 text-primary"><img src="img/logo.png" alt="" style="width:60px;height:60px;"> &nbsp;Subali
                Trans</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link ">Home</a>

                <a href="daftar-mobil.php" class="nav-item nav-link ">Daftar Mobil</a>
                <a href="tour.php" class="nav-item nav-link">Tour dan travel</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
              
            </div>

        </div>
    </nav>
    <!-- Navbar End -->



    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 ">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
   
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="admin/img/<?php echo $row['gambar1'] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="admin/img/<?php echo $row['gambar2'] ?>" class="d-block w-100" alt="...">
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
            <div class="col-lg-6 ">
                <div class="row">
                   
                        <h2 class="text-left mb-3"><?php echo $row['wisata'] ?></h2>
                   
                    <div class=" text-left" style="padding-top:10px;">
                        <h4 style="color:red"><?php echo rupiah($row['harga']) ?><span
                                style="color:black;font-size: 15px;"> / <?php echo $row['orang'] ?> orang
                                 </span></h4>
                    </div>
                    <hr>
                    <p> <?php echo $row['deskripsi'] ?></p>
                </div>

              <hr>
                <a href=""
                class="btn btn-primary mt-1 p-3" style="width:100%;margin-top:-100px;">Sewa Sekarang</a>

         

            </div>
        </div>
       
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="card shadow p-3">
                    <center><h4 >Destinasi</h4></center>
                    <hr>
                  
                    <p><?php echo $row['destinasi'] ?></p>
                </div>

            </div>
            <div class="col-lg-6">
            <div class="card shadow p-3">
                    <center><H4 >Fasilitas</H4></center>
                    <hr>
                  
                    <p><?php echo $row['fasilitas'] ?></p>
                </div>
               
                </div>


            
         
           
        </div>
    </div>
    <br>


    <?php include "footer.php" ?>