<?php
  require "koneksi.php";
  $queryBerita = mysqli_query($con, "SELECT id, judul, isi, gambar_utama FROM berita LIMIT 3");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
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
  </style>
      <link rel="stylesheet" href="./asset/css/style.css" />
  <!-- CSS -->
  </head>

  <body>
<!-- Navbar Buka -->
    <?php
        require "navbar.php";
    ?>
<!-- Nabar Tutup -->
<!-- Hero Buka  -->
    <div class="carousel-inner">
    <div class="carousel-item active">
      <image src="./asset/image/banner.jpg" class="img-fluid banner" alt="">
      <div class="carousel-caption">
      <h5 class="text-logo text-light">
          <div class="fw-bold">Dewan Pimpinan Cabang</div>
          <div class="text-maroon fw-bold" style=" text-shadow: 1px 1px 0 white, -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white;;">Gerakan Mahasiswa Nasional Indonesia</div>
          <div class="fw-bold">Ogan Komering Ulu</div>
        </h5>
      </div>
    </div>
    </div>
<!-- Hero Tutup -->

<!-- About Buka -->
    <section id="about">
      <div class="container py-3">
        <div class="row">
          <div class="about-img col-md-4">
            <div class="img-container">
              <h4 class="text-maroon fw-bold text-center">Tentang Kami</h4>
              <img src="./asset/image/gmni.png" alt="Tentang Kami" class="img-fluid w-25 mx-auto d-block">
            </div>
          </div>
          <div class="about-text col-md-8">
            <h5 class="about-desa text-maroon">Gerakan Mahasiswa Nasional Indonesia</h5>
            <p style="text-align: justify;">Merupakan sebuah organisasi mahasiswa yang ada di Ogan Komering Ulu, Baturaja. Organisasi ini adalah sebuah gerakan mahasiswa yang berlandaskan ajaran Marhaenisme yang memperjuangkan hak-hak masyarakat yang tertindas oleh sistem pemerintahan.</p>
          </div>
        </div>
      </div>
    </section>
<!-- About Tutup -->

<!-- Berita Buka -->
  <section id="berita" class="latar">
    <div class="container">
      <div class="berita-title text-center text-light">
        <h3>BERITA & ARTIKEL TERBARU</h3>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4 pt-1 pb-5">
        <?php while($data = mysqli_fetch_array($queryBerita)) { ?>
          <div class="col">
            <div class="card h-100">
              <img src="asset/image/<?= $data['gambar_utama']; ?>" class="card-img-top" alt="">
              <div class="card-body text-center">
                <h5 class="card-title text-maroon"><?= $data['judul']; ?></h5>
                <p class="card-text text-truncate"><?= $data['isi']; ?></p>
                <a href="detail_berita.php?id=<?= $data['id']; ?>" class="btn btn-maroon">Baca Selengkapnya..</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

<!-- Berita Tutup -->

<!-- Join Us Buka -->
<div class="container my-5">
    <div class="p-4 rounded-4 border border-dark" style="background-color: #f2f2f2;">
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
<!-- Join Us Tutup -->

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
