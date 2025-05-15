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
                <h1 class="fw-bolder text-light">SEJARAH <p class="fw-medium">
                DPC GMNI OKU
                </p></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Sejarah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    </div>
<!-- Banner Tutup -->

<!-- Hero Buka -->
    <div class="container-fluid">
        <div class="container">
            <div class="card-sejarah">
                <div class="card-body text-center pb-5">
                    <h4 class="card-text fw-bolder">Gerakan Mahasiswa Nasional Indonesia</h4><p>DPC GMNI OKU merupakan sebuah organisasi mahasiswa yang ada di Ogan Komering Ulu, Baturaja. Organisasi ini adalah sebuah gerakan mahasiswa yang berlandaskan ajaran Marhaenisme yang memperjuangkan hak-hak masyarakat yang tertindas oleh sistem pemerintahan. Awal mula di bentuk DPC GMNI OKU pada tahun 2004 oleh Bung Supono dan Bung Yudi Risandi.

                    Kepengurusan selanjutnya diketuai oleh Bung Edo dan skertaris jendralnya Bung Irpan sampai pada tahun 2022, setelah masa jabatan Bung Edo Selesai dilanjutkan kepengurusan GMNI OKU oleh Bung Irpan sebagai ketua dan Bung Tirta sebagai Skertaris jendral sampai pada tahun 2024.

                    Hingga saat ini GMNI OKU masih aktif sebagai organisasi kemahasiswaan yang diketuai Bung Ryan Akbar Pramana untuk mengembangkan kader yang berjiwa marhenisme.</p>
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
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous">
</script>
</body>
</html>