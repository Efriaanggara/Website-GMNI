<?php
    require "session.php";
    require "../koneksi.php";

    // Proses tambah kategori
    if (isset($_POST['simpan_kategori'])) {
        $kategori = htmlspecialchars($_POST['kategori']);

        $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
        $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

        if ($jumlahDataKategoriBaru > 0) {
            echo '<meta http-equiv="refresh" content="0; url=kategori.php" />';
        } else {
            $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
            if ($querySimpan) {
                echo '<meta http-equiv="refresh" content="0; url=kategori.php" />';
            } else {
                echo mysqli_error($con);
            }
        }
    }

    // Proses update kategori
    if (isset($_POST['update_kategori'])) {
        $id = $_POST['id'];
        $nama_kategori = htmlspecialchars($_POST['nama_kategori']);

        $queryUpdate = mysqli_query($con, "UPDATE kategori SET nama='$nama_kategori' WHERE id='$id'");

        if ($queryUpdate) {
            echo '<meta http-equiv="refresh" content="1; url=kategori.php" />';
        } else {
            echo '<meta http-equiv="refresh" content="2; url=kategori.php" />';
        }
    }

    // Ambil data kategori
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Style CSS -->
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
    <link rel="stylesheet" href="../asset/css/style.css" />
</head>

<body>
<!-- Navbar Buka -->
<?php
    require "navbar.php";
?>
<!-- Navbar Tutup -->

    <div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="index.php" class="no-decoration text-muted">
                                    <i class="bi bi-house-door"></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Kategori</li>
                        </ol>
                    </nav>
                </div>
                <div class="user">
                    <i class="bi bi-person-circle"></i> <?php echo $_SESSION['username']; ?>
                </div>
            </div>
        </div>

        <div class="container">
        <h2 class="text-center my-5 mb-4">Manajemen Kategori</h2>
            <form action="" method="POST" enctype="multipart/form-data" class="mb-5 p-4 shadow rounded bg-white">
            <h5>Tambah Kategori</h5>
                <div class="mb-3">
                <label for="judul" class="form-label">Kategori</label>
                <input type="text" class="form-control" name="kategori" required>
                </div>
                <div class="mt-2">
                    <button class="btn btn-maroon" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
                if (isset($_POST['simpan_kategori'])) {
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                    if ($jumlahDataKategoriBaru > 0) {
                        echo '<meta http-equiv="refresh" content="0; url=kategori.php" />';
                    } else {
                        $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                        if ($querySimpan) {
                            echo '<meta http-equiv="refresh" content="0; url=kategori.php" />';
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            ?>
        </div>

        
            <h5>List Kategori:</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-dark align-middle">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            $number = 1;
                            mysqli_data_seek($queryKategori, 0); // restart result set
                            while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                        <tr>
                            <td><?= $number; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-maroon btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editKategoriModal<?= $data['id'] ?>">Edit</button>

                                <!-- Modal -->
                                <div class="modal fade" id="editKategoriModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="editKategoriModalLabel<?= $data['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editKategoriModalLabel<?= $data['id'] ?>">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form method="POST" action="" class="edit">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                    <div class="mb-3">
                                                        <label for="nama_kategori<?= $data['id'] ?>" class="form-label">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="nama_kategori<?= $data['id'] ?>" name="nama_kategori" value="<?= htmlspecialchars($data['nama']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-maroon btn-sm" name="update_kategori">Simpan</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Hapus -->
                                <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-grey btn-sm mb-2" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                                $number++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
