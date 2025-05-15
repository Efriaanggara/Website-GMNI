<?php
    require "session.php";
    require "../koneksi.php";

    $pesan = '';
    $alertClass = '';

    if (isset($_POST['register'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah username sudah digunakan
        $cek = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($cek) > 0) {
            $pesan = "Username sudah terdaftar. Silakan pilih yang lain.";
            $alertClass = "danger";
            header("Refresh: 2; url=register.php");
        } else {
            $simpan = mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')");
            if ($simpan) {
                $pesan = "Registrasi berhasil! Silakan login.";
                $alertClass = "success";
                header("Refresh: 2; url=register.php");
            } else {
                $pesan = "Terjadi kesalahan saat menyimpan data.";
                $alertClass = "danger";
                header("Refresh: 2; url=register.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DPC GMNI OKU | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asset/css/style.css" />
    <style>
        .btn-maroon {
        background-color: #800000;
        color: #fff;
        border: 1px solid #ffcccc;
        }
        .btn-maroon:hover {
        background-color: #990000;
        color: #fff;
        }
        .btn-grey {
        background-color: #1b0a07;
        color: #fff;
        }
        .btn-grey:hover {
        background-color: #60696b;
        color: #fff;
        }
        .text-maroon {
        color: #800000;
        }
    </style>
</head>
<body>
<!-- Navbar Buka -->
    <?php
        require "navbar.php";
    ?>
<!-- Navbar Tutup -->

<!-- Hero Buka -->
<div class="main-content">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="bread">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php" class="no-decoration text-muted"><i class="bi bi-house-door"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
            <div class="user">
                <i class="bi bi-person-circle"></i> <?php echo $_SESSION['username']; ?></li>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="container">
            <?php if ($pesan != ''): ?>
            <div class="alert alert-<?= $alertClass; ?> alert-dismissible fade show" role="alert">
                <?= $pesan; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="mb-5 p-4 shadow rounded bg-white">
            <div class="text-maroon text-center" style=" text-shadow: 1px 1px 0 white, -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white;;">
                <h2>Register.</h2></div>
                <div><p class="text-dark text-center pb-3 small">Silahkan Membuat Username dan Password untuk Login!</p>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="register" class="btn btn-maroon">Register</button>
            </div>
    </form>
    </div>
</div>

<!-- Hero Tutup -->
<!-- JS Bootstrap agar tombol alert bisa ditutup -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
