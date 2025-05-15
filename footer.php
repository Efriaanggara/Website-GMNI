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
        }
?>

<footer class="text-white pt-5 pb-3" style="background-color: #800000;">
        <div class="container">
        <div class="row mb-4">
            <!-- Logo dan Judul -->
            <div class="col-md-12 mb-4">
            <div class="d-flex align-items-center">
            <img src="asset/image/gmni.png" alt="Logo GMNI" width="70" class="me-2">
            <div>
                <h5 class="fw-bold mb-0">GERAKAN MAHASISWA NASIONAL INDONESIA</h5>
                <p class="mb-0">OGAN KOMERING ULU</p>
            </div>
            </div>
        </div>
        </div>
        <div class="row text-start">
            <!-- Kontak -->
            <div class="col-md-6 mb-4">
            <h6 class="fw-bold">HUBUNGI KAMI</h6>
            <p class="mb-1">Email : dpc.gmnioku@gmail.com</p>
            <p class="mb-0">
                Jln. Gotong Royong, Lr. Thafizh Qur’an, RT/21 Kemalaraja,<br>
                Kec. Baturaja Timur, Kab. Ogan Komering Ulu, Sumatera Selatan
            </p>
            </div>
            <!-- Kategori -->
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold">KATEGORI BERITA</h6>
                <ul class="list-unstyled">
                <?php while ($data = mysqli_fetch_array($queryKategori)) { ?>
                        <a class=" text-light no-decoration" href="berita.php?kategori=<?php echo $data['nama']; ?>">
                            <li class="list-group-item"><?php echo $data['nama']; ?></li>
                        </a>
                        <?php } ?>
                </ul>
            </div>
            <!-- Link -->
            <div class="col-md-2 mb-4">
            <h6 class="fw-bold">LINK</h6>
            <ul class="list-unstyled">
                <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
                <li><a href="sejarah.php" class="text-white text-decoration-none">Profile</a></li>
                <li><a href="berita.php" class="text-white text-decoration-none">Berita</a></li>
                <li><a href="galeri.php" class="text-white text-decoration-none">Galeri</a></li>
            </ul>
            </div>
        </div>
        <div class="text-center small">
            <strong>#Pejuang Pemikir - Pemikir Pejuang</strong>
        </div>
        <hr class="border-white">
        <div class="text-center small">
            <strong>Copyright | 2025 Gerakan Mahasiswanasional Indonesia Ogan Komering Ulu</strong>
        </div>
        </div>
    </footer>