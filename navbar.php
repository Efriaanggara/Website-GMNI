<?php
$page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar Buka -->
<nav class="navbar navbar-expand-lg shadow p-2 mb-5 bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-decoration-none" href="index.php">
            <img src="./asset/image/gmni.png" alt="GMNI" width="60" height="60" class="me-1 d-none d-sm-block">
            <h6 class="text-logo text-light">
                <div class="fw-bold">Dewan Pimpinan Cabang</div>
                <div class="text-danger">Gerakan Mahasiswa Nasional Indonesia</div>
                <div>Ogan Komering Ulu</div>
            </h6>
        </a>
        <button class="navbar-toggler bg-light shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto text-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light <?= $page == 'index.php' ? 'active text-maroon' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light <?= in_array($page, ['sejarah.php','visi_misi.php','pengurus.php']) ? 'active text-maroon' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item bg-dark text-light <?= $page == 'sejarah.php' ? 'active text-maroon' : '' ?>" href="sejarah.php">Sejarah</a></li>
                        <li><a class="dropdown-item bg-dark text-light <?= $page == 'visi_misi.php' ? 'active text-maroon' : '' ?>" href="visi_misi.php">Visi & Misi</a></li>
                        <li><a class="dropdown-item bg-dark text-light <?= $page == 'pengurus.php' ? 'active text-maroon' : '' ?>" href="pengurus.php">Struktur Pengurus</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light <?= $page == 'berita.php' ? 'active text-maroon' : '' ?>" href="berita.php">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light <?= $page == 'galeri.php' ? 'active text-maroon' : '' ?>" href="galeri.php">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light <?= $page == 'kontak.php' ? 'active text-maroon' : '' ?>" href="kontak.php">Kontak</a>
                </li>
                <li class="nav-item ms-lg-4">
                    <a href="join_us.php" class="btn btn-maroon">Join-Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar Tutup -->
