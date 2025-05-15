<?php
    require "koneksi.php";

    // Ambil semua kategori
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    // Cek apakah parameter kategori dikirim
    if (isset($_GET['kategori'])) {
        $kategori = mysqli_real_escape_string($con, $_GET['kategori']);

        // Ambil ID dari kategori tersebut
        $queryKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$kategori'");
        $kategoriData = mysqli_fetch_array($queryKategoriId);

        if ($kategoriData) {
            $kategoriId = $kategoriData['id'];
            // Batasi hanya 5 berita per halaman dan gunakan offset untuk pagination
            $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;
            
            $queryBerita = mysqli_query($con, "SELECT * FROM berita WHERE id_kategori='$kategoriId' LIMIT $limit OFFSET $offset");
            $totalBeritaQuery = mysqli_query($con, "SELECT COUNT(*) as total FROM berita WHERE id_kategori='$kategoriId'");
        } else {
            // Jika kategori tidak ditemukan, buat query kosong
            $queryBerita = mysqli_query($con, "SELECT * FROM berita WHERE 0");
            $totalBeritaQuery = mysqli_query($con, "SELECT COUNT(*) as total FROM berita WHERE 0");
        }
    } else {
        // Jika tidak ada filter kategori, tampilkan semua berita
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $queryBerita = mysqli_query($con, "SELECT * FROM berita LIMIT $limit OFFSET $offset");
        $totalBeritaQuery = mysqli_query($con, "SELECT COUNT(*) as total FROM berita");
    }

    // Total jumlah berita
    $totalBeritaRow = mysqli_fetch_assoc($totalBeritaQuery);
    $totalBerita = $totalBeritaRow['total'];
    $totalPages = ceil($totalBerita / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
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
                    <h1 class="fw-bolder text-light">BERITA <p class="fw-medium">
                    DPC GMNI OKU
                    </p></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                            <li class="breadcrumb-item active text-light" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- Banner Tutup -->

<!-- Hero Buka -->
    <div class="container-fluid">
        <div class="container mb-5">
            <div class="row align-items-start">
                <!-- List Kategori -->
                <div class="col-12 col-md-auto mb-3">
                    <ul class="list-group">
                        <h5>Kategori :</h5>
                        <a class="no-decoration" href="berita.php">
                            <li class="list-group-item">All</li>
                        </a>
                        <?php while ($data = mysqli_fetch_array($queryKategori)) { ?>
                        <a class="no-decoration" href="berita.php?kategori=<?php echo $data['nama']; ?>">
                            <li class="list-group-item"><?php echo $data['nama']; ?></li>
                        </a>
                        <?php } ?>
                    </ul>
                </div>

                <!-- Berita -->
                <div class="col order-0 order-md-1">
                    <?php while($data = mysqli_fetch_array($queryBerita)){ ?>
                    <div class="card card-berita mb-4">
                        <div class="row g-0 align-items-start">
                            <!-- Gambar di kiri -->
                            <div class="col-lg-4">
                                <img src="asset/image/<?php echo $data['gambar_utama']; ?>" class="img-fluid rounded-start" style="object-fit: cover;" alt="Gambar Berita">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                                    <p class="card-text">
                                        <?php echo substr(strip_tags($data['isi']), 0, 150); ?>...
                                    </p>
                                    <a href="detail_berita.php?id=<?php echo $data['id']; ?>" class="btn btn-maroon">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
        </div>
    </div>
<!-- Hero Tutup -->

<!-- Pagination Buka -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <!-- Previous Button -->
            <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?<?php 
                    $params = $_GET;
                    $params['page'] = max($page -1, 1); // previous page
                    echo http_build_query($params);
                ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Page Number Buttons -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?<?php 
                    $params = $_GET;
                    $params['page'] = $i;
                    echo http_build_query($params); 
                ?>"><?php echo $i; ?></a>
            </li>
            <?php endfor; ?>

            <!-- Next Button -->
            <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?<?php 
                    $params = $_GET;
                    $params['page'] = min($page +1, $totalPages); // next page
                    echo http_build_query($params);
                ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<!-- Pagination Tutup -->

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