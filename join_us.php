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
        .bg-maroon {
        background-color: #8B0000;
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
                <h1 class="fw-bolder text-light">BERGABUNG BERSAMA <p class="fw-medium">
                DPC GMNI OKU
                </p></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Join-Us</li>
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
        <!-- Kolom Kiri -->
        <div class="col-md-9">
            <!-- Syarat Bergabung -->
            <div class="mb-4">
                <h4 class="fw-bold">SYARAT BERGABUNG :</h4>
                <ol class="fs-5">
                    <li>Mahasiswa aktif di Ogan Komering Ulu</li>
                    <li>Siap mengikuti peraturan yang ada</li>
                    <li>Mengikuti pengkaderan</li>
                </ol>
            </div>
            <!-- Card Join Us -->
            <div class="container">
                <!-- Wrapper dengan border dan radius -->
                <div class="p-0 rounded-4 border border-dark overflow-hidden">
                    <!-- Header Join Us -->
                    <div class="bg-maroon text-white text-center py-3 fs-4 fw-bold">
                        JOIN – US
                    </div>

                    <!-- Konten Form -->
                    <div class="p-4" style="background-color: #f2f2f2;">
                        <div class="row align-items-center">
                            <!-- Kiri: Teks -->
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h4 class="fw-bold">BERGABUNG BERSAMA KAMI!</h4>
                                <p>
                                    Ayo jadi bagian dari GMNI, mulai langkahmu dengan menjadi mahasiswa yang berjiwa Nasionalis untuk memperjuang masyarakat marhen!
                                </p>
                            </div>

                            <!-- Kanan: Form dan Tombol -->
                            <div class="col-md-6">
                                <!-- Form Email -->
                                <div class="input-group mb-3">
                                    <input type="email" id="emailInput" class="form-control" placeholder="Masukan Nama Email Kamu" aria-label="Email">
                                    <a id="submitBtn" class="btn btn-maroon d-flex align-items-center text-white">
                                    <i class="bi bi-envelope-fill me-2"></i> Submit
                                    </a>
                                </div>

                                <!-- Tombol WhatsApp -->
                                <a href="https://wa.me/6281273260340" class="btn btn-maroon w-100 mb-2 d-flex align-items-center justify-content-center rounded-3">
                                    <i class="bi bi-whatsapp me-2"></i> Gabung via Whatsapp
                                </a>

                                <!-- Tombol Email -->
                                <a href="mailto:dpcgmniogankomeringulu@gmail.com" class="btn btn-maroon w-100 d-flex align-items-center justify-content-center rounded-3">
                                    <i class="bi bi-envelope-fill me-2"></i> Gabung via Email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        const email = document.getElementById('emailInput').value.trim();
        if (email) {
        const subject = encodeURIComponent("Pendaftaran Bergabung GMNI");
        const body = encodeURIComponent("Halo,\n\nSaya ingin bergabung dengan GMNI. Berikut alamat email saya: " + email + "\n\nTerima kasih.");
        window.location.href = `dpcgmniogankomeringulu@gmail.com?subject=${subject}&body=${body}`;
        } else {
        alert("Silakan masukkan alamat email kamu terlebih dahulu.");
        }
    });
</script>
</body>
</html>