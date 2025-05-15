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
        .card-header {
        background-color: #800000;
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
                <h1 class="fw-bolder text-light">KONTAK <p class="fw-medium">
                DPC GMNI OKU
                </p></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="no-decoration text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Kontak</li>
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
            <div class="card border-grey mb-5">
                <div class="card-header text-light text-center fw-bolder">KONTAK</div>
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Gerakan Mahasiswa Nasional Indonesia</h5>
                    <p class="card-text">Alamat : Jl. Gotong Royong, Lr. Thafizh Qur’an, RT. 21, RW. 05, Kelurahan Kemalaraja, Kec. Baturaja Timur</p>
                    <p class="card-text">Telp : 0831-2651-0489/0812-7326-0340</p>
                    <p class="card-text">E-mail : dpc.gmnioku@gmail.com </p>
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