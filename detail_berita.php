<?php
    require "koneksi.php";

    // Ambil ID dari URL
    $id = htmlspecialchars($_GET['id']);

    // Ambil detail berita berdasarkan ID
    $queryBerita = mysqli_query($con, "SELECT * FROM berita WHERE id='$id'");
    $Berita = mysqli_fetch_array($queryBerita);

    // Ambil 3 berita lainnya (kecuali yang sedang dibuka)
    $queryBeritalainnya = mysqli_query($con, "SELECT id, judul, tanggal_terbit, gambar_utama FROM berita WHERE id != '$id' ORDER BY tanggal_terbit DESC LIMIT 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    <h1 class="fw-bolder text-light">DETAIL BERITA <p class="fw-medium">
                    DPC GMNI OKU
                    </p></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                            <li class="breadcrumb-item"><a href="berita.php" class="no-decoration text-light">Berita</a></li>
                            <li class="breadcrumb-item active text-light" aria-current="page">Detail Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- Banner Tutup -->

<!-- Hero Buka -->
<div class="container">
    <div class="judul-berita">
        <h1 class="fw-bold"><?= $Berita['judul']; ?></h1>
        <p><i class="bi bi-calendar4-week"></i> <small class="text-muted"><?= date("d-m-Y", strtotime($Berita['tanggal_terbit'])); ?></small></p>
    </div>
    <div class="img-berita mb-3">
        <img src="asset/image/<?= $Berita['gambar_utama']; ?>" class="img-fluid rounded" style="width: 100%; max-height: 400px; object-fit: cover;">
    </div>
    <div class="row py-4">
        <div class="col-lg-9 col-md-8 col-12">
            <p><?= $Berita['isi']; ?></p>
        </div>
        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 mt-md-0 d-flex justify-content-lg-end">
            <div class="berita-lainnya rounded p-3 w-100 w-lg-75" style="background-color: rgba(108, 117, 125, 0.25);">
                <h5 class="fw-bold mb-3"><span class="text-maroon">|</span> Berita Lainnya</h5>
                <?php while($berita = mysqli_fetch_array($queryBeritalainnya)) { ?>
                    <div class="d-flex mb-3">
                        <img src="./asset/image/<?= $berita['gambar_utama']; ?>" class="rounded" width="80" height="60" style="object-fit: cover;">
                        <div class="ms-3">
                            <a href="detail_berita.php?id=<?= $berita['id']; ?>" class="text-decoration-none text-maroon fw-bolder d-block" style="font-size: 15px;">
                                <?= $berita['judul']; ?>
                            </a>
                            <i class="bi bi-calendar4-week"></i>
                            <small class="text-muted"><?= date("d-m-Y", strtotime($berita['tanggal_terbit'])); ?></small>
                        </div>
                    </div>
                <?php } ?>
            </div>
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
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"crossorigin="anonymous">
</script>
</body>
</html>