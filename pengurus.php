<?php
    require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous"
    />
    <!-- CSS -->
    <style>
        .text-logo {
        font-size: 0.85rem;
        line-height: 1.2;
        }
        .btn-maroon {
        background-color: #800000;
        color: #fff;
        border: 1px solid #ffcccc;
        }
        .btn-maroon:hover {
        background-color: #990000;
        color: #adb5bd;
        }
        .text-maroon {
        color: #800000;
        }
        .sidebar-artikel {
        font-size: 12px;
        }

        .sidebar-artikel h4 {
            font-size: 16px;
        }

        .sidebar-artikel .card {
            padding: 6px;
        }

        .sidebar-artikel .card img {
            height: 120px;
            object-fit: cover;
        }

        .sidebar-artikel h6 {
            font-size: 13px;
            margin-bottom: 4px;
        }

        .sidebar-artikel small {
            font-size: 11px;
        }

        .sidebar-artikel .btn {
            font-size: 10px;
            padding: 3px 6px;
        }
    </style>
    <link rel="stylesheet" href="./asset/css/style.css" />
    <!-- CSS -->
</head>

<body>
<!-- Navbar Buka -->
    <?php
        require "navbar.php";
    ?>
<!-- Navbar Tutup -->

<!-- Banner Buka -->
    <div class="bg-maroon border border-0 my-5 pt-5" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('./asset/image/bg.jpg'); background-color: rgb(0,0,0.7); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="fw-bolder text-light">STRUKTUR PENGRUS <p class="fw-medium">
                DPC GMNI OKU
                </p></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Struktur Pengurus</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    </div>
<!-- Banner Tutup -->

<!-- Hero Buka -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-9">
            <div class="pengurus">
            <img src="./asset/image/pengurus.jpg" class="img-fluid" alt="...">
            </div>
        </div>
        <!-- Kolom Kanan: Artikel Terbaru -->
        <div class="col-md-3 sidebar-artikel">
            <h4 class="fw-bold">Lest Artikel :</h4>
            <?php
            $queryBeritaSidebar = mysqli_query($con, "SELECT id, judul, tanggal_terbit, gambar_utama FROM berita ORDER BY tanggal_terbit DESC LIMIT 3");
            while($berita = mysqli_fetch_array($queryBeritaSidebar)) { ?>
            <div class="card shadow-sm">
                <img src="./asset/image/<?= $berita['gambar_utama']; ?>" class="card-img-top" alt="Artikel">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-maroon"><?= $berita['judul']; ?>
                    </h6>
                    <i class="bi bi-calendar4-week"></i>
                    <small class="text-muted"><?= date("d-m-Y", strtotime($berita['tanggal_terbit'])); ?></small><br>
                    <a href="detail_berita.php?id=<?= $berita['id']; ?>" class="btn btn-maroon btn-sm mt-2">Baca Selengkapnya</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
<!-- Hero Tutup -->

<!-- Footer Buka -->
    <?php
        require "footer.php";
    ?>
<!-- Footer Tutup -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous">
</script>
</body>
</html>