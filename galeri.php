<?php
    require "koneksi.php";

    $queryGaleri = mysqli_query($con, "SELECT * FROM galeri_foto");
    $galeriData = [];
    while ($row = mysqli_fetch_assoc($queryGaleri)) {
        $galeriData[] = $row;
    }

    function isVideo($filename) {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        return in_array($ext, ['mp4', 'webm', 'ogg']);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .gallery-img {
            object-fit: cover;
            width: 100%;
            max-width: 250px;
            aspect-ratio: 1/1;
            cursor: pointer;
        }
        @media (max-width: 576px) {
            .gallery-img {
                display: block;
                margin: 0 auto;
            }
        }
        .img-preview {
            max-height: 80vh;
            object-fit: contain;
            margin: 0 auto;
        }
        .caption-tanggal {
            position: absolute;
            bottom: 0;
            left: 0;
            margin: 1rem;
        }
        .gallery-img:hover {
            transform: scale(1.05);
        }
        .breadcrumb-item + .breadcrumb-item::before {
            color: #fff;
        }
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
</head>
<body class="bg-light">

<?php require "navbar.php"; ?>

<!-- Banner -->
<div class="bg-maroon border border-0 my-5 pt-5"
    style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('./asset/image/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="fw-bolder text-light">GALERI
                    <p class="fw-medium">DPC GMNI OKU</p>
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Galeri -->
<div class="container mb-5">
    <h2 class="text-center mb-4">Galeri Foto & Video</h2>
    <div class="row g-4 justify-content-center">
        <?php foreach ($galeriData as $index => $row) { ?>
            <div class="col-6 col-sm-4 col-md-3 d-flex">
                <?php if (isVideo($row['gambar'])) { ?>
                    <video class="img-fluid gallery-img rounded shadow-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#galeriPopup"
                        data-bs-slide-to="<?= $index ?>" muted>
                        <source src="asset/image/<?= htmlspecialchars($row['gambar']) ?>" type="video/mp4">
                        Browser tidak mendukung video.
                    </video>
                <?php } else { ?>
                    <img src="asset/image/<?= htmlspecialchars($row['gambar']) ?>"
                        class="img-fluid gallery-img rounded shadow-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#galeriPopup"
                        data-bs-slide-to="<?= $index ?>"
                        alt="<?= htmlspecialchars($row['judul_foto']) ?>">
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Popup Galeri -->
<div class="modal fade" id="galeriPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-dark">
            <div class="modal-body p-0">
                <div id="carouselGaleri" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        <?php foreach ($galeriData as $index => $row) { ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <?php if (isVideo($row['gambar'])) { ?>
                                    <video class="d-block img-preview rounded w-100" controls>
                                        <source src="asset/image/<?= htmlspecialchars($row['gambar']) ?>" type="video/mp4">
                                        Browser tidak mendukung video.
                                    </video>
                                <?php } else { ?>
                                    <img src="asset/image/<?= htmlspecialchars($row['gambar']) ?>"
                                        class="d-block img-preview rounded w-100"
                                        alt="<?= htmlspecialchars($row['judul_foto']) ?>">
                                <?php } ?>
                                <div class="caption-tanggal d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                                    <h5 class="text-white"><?= htmlspecialchars($row['judul_foto']) ?></h5>
                                    <small class="text-light">Tanggal: <?= htmlspecialchars(date("d-m-Y", strtotime($row['tanggal_upload']))) ?></small>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGaleri" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGaleri" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.gallery-img').forEach((media, index) => {
        media.addEventListener('click', () => {
            const carousel = bootstrap.Carousel.getOrCreateInstance(document.getElementById('carouselGaleri'));
            carousel.to(index);
        });
    });
</script>
</body>
</html>
