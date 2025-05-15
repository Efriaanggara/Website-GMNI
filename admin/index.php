<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori =mysqli_num_rows($queryKategori);

    $queryBerita = mysqli_query($con, "SELECT * FROM berita");
    $jumlahBerita =mysqli_num_rows($queryBerita);

    $queryGaleri = mysqli_query($con, "SELECT * FROM galeri_foto");
    $jumlahGaleri =mysqli_num_rows($queryGaleri);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../asset/css/style.css" />
</head>

<body>
<!-- Navbar Buka -->
<?php
    require "navbar.php";
?>
<!-- Navbar Tutup -->

    <div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-house-door"></i> Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="user">
                    <i class="bi bi-person-circle"></i></i> <?php echo $_SESSION['username']; ?></li>
                </div>
            </div>
        </div>

            <div class="container">
            <h3>Halaman Dashboard</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="summary-kategori p-3">
                            <div class="row">
                                <div class="col-5">
                                    <i class="bi bi-card-list" style="font-size: 60px; color: #fff;"></i>
                                </div>
                                <div class="col-5 mt-auto text-light">
                                    <h3 class="fs-3">Kategori</h3>
                                    <p class="fs-6"><?php echo $jumlahKategori; ?> Kategori</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="summary-berita p-3">
                            <div class="row">
                                <div class="col-5">
                                    <i class="bi bi-journal-richtext" style="font-size: 60px; color: #fff;"></i>
                                </div>
                                <div class="col-5 mt-auto text-light">
                                    <h3 class="fs-3">Berita</h3>
                                    <p class="fs-6"><?php echo $jumlahBerita; ?> Berita</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="summary-galeri p-3">
                            <div class="row">
                                <div class="col-5">
                                    <i class="bi bi-images" style="font-size: 60px; color: #fff;"></i>
                                </div>
                                <div class="col-5 mt-auto text-light">
                                    <h3 class="fs-3">Galeri</h3>
                                    <p class="fs-6"><?php echo $jumlahGaleri; ?> Foto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>