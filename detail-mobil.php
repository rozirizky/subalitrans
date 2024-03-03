<?php
include "admin/includes/coneksi.php";
include "admin/includes/rupiah.php";
$id = $_GET['id'];
$query = mysqli_query($koneksidb,"SELECT * FROM daftar_mobil WHERE id = '$id'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subali Trans | Detail Mobil</title>
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



    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 ">
                <img src="admin/img/<?php echo $row['gambar'] ?>" class="img-fluid">
                <p style="color:#D81324;font-size:10px;"> Untuk penyewa Awal di (WAJIBKAN DP) bila booking Unit
                Langsung datang ke kantor di
                JL.SRABA RAYA BLOK 15N No 6 SAWOJAJAR 2 <br>
                ATAU VIA TF 4000155182 BCA A/N ARIANTO JAMIL </p>
            </div>
            <div class="col-lg-6">
                <h1><?php echo $row['mobil'] ?></h1>
                <hr>
                <h4 style="color:red"><?php echo rupiah($row['harga']) ?><span style="color:black;font-size: 15px;"> /
                        hari </span></h4>
                <hr>
                <p><?php echo $row['deskripsi'] ?></p>
                <hr>
               
            <a href="https://wa.me/6282234486513?text=Saya%20ingin%20in%20sewa%20mobil%20<?php echo $row['mobil'] ?>%20<?php echo $row['include'] ?>" class="btn btn-primary mt-2 p-3" style="width:100%;">Sewa Sekarang</a>
            </div>
        </div>
        <br>
        <div class="row mt-3">
       
            <h1 class="text-center mb-5 ">Persyaratan</h1>
            
            <div class="col-lg-16  ">
                <ul>
                    <h5>PERSYARATAN LEPAS KUNCI UNTUK DOMISILI LUAR MALANG : </h5>
                    <hr>
                    <li>
                        <p>Ktp 2 (penyewa dan pendamping)</p>
                    </li>
                    <li>
                        <p>Npwp /nametag pekerjaan /KTM /Dll</p>
                    </li>
                    <li>
                        <p>Deposit 3 jt ( deposit diserahkan cash / Transfer jika unit sudah di kirim )</p>
                    </li>
                    <li>
                        <p>Deposit di kembalikan saat pengembalian mobil</p>
                    </li>
                    <li>
                        <p>Bukti tiket pemberangkatan ke Malang</p>
                    </li>
                    <li>
                        <p>Bukti tiket pulang ke kota asal</p>
                    </li>
                    <li>
                        <p>Bukti booking Hotel di malang</p>
                    </li>

                </ul>
            </div>

            <div class="col-lg-12">
                <ul>
                    <h5>UNTUK UMUM : </h5>
                    <hr>
                    <li>
                        <p>KTP 2 ( PENYEWA & PENDAMPING ) + KK + STNK ( ASLI SEMUA BUKAN FOTOCOPY )+ SEPEDA MOTOR minim
                            2015 </p>
                    </li>
                   

                </ul>
                </div>
                <div class="col-lg-12">
                <ul>
                    <h5>UNTUK MAHASISWA/MAHASISWI : </h5>
                    <hr>
                    <li>
                        <p>KTP 2 + KTM 2 + STNK + SEPEDA MOTOR minim 2015
                            ASLI SEMUA BUKAN FOTOCOPY</p>
                    </li>

                </ul>

            </div>


         

        </div>
    </div>

    <?php include "footer.php" ?>