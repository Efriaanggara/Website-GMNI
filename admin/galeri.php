<?php
    require "session.php";
    require "../koneksi.php";

    // Mengambil data galeri
    $queryGaleri = mysqli_query($con, "SELECT * FROM galeri_foto");
    $jumlahGaleri = mysqli_num_rows($queryGaleri);

    // Simpan foto atau video baru
    if (isset($_POST['simpan_foto'])) {
        $judul_foto = htmlspecialchars($_POST['judul_foto']);
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'mp4'];

        if (in_array($gambar_ext, $allowed_ext)) {
            $gambar_baru = date('YmdHis') . "_" . basename($gambar);
            $upload_dir = "../asset/image/";
            $upload_file = $upload_dir . $gambar_baru;

            move_uploaded_file($gambar_tmp, $upload_file);
            $querySimpan = mysqli_query($con, "INSERT INTO galeri_foto (judul_foto, gambar) VALUES ('$judul_foto', '$gambar_baru')");
            if ($querySimpan) {
                echo '<meta http-equiv="refresh" content="0; url=galeri.php" />';
            }
        }
    }

    // Update foto atau video
    if (isset($_POST['update_foto'])) {
        $id = $_POST['id'];
        $judul_foto = htmlspecialchars($_POST['judul_foto']);
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_lama = $_POST['gambar_lama'];

        if (!empty($gambar)) {
            $gambar_ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
            $allowed_ext = ['jpg', 'jpeg', 'png', 'mp4'];
            if (in_array($gambar_ext, $allowed_ext)) {
                $gambar_baru = date('YmdHis') . "_" . basename($gambar);
                $upload_file = "../asset/image/" . $gambar_baru;
                move_uploaded_file($gambar_tmp, $upload_file);
            } else {
                $gambar_baru = $gambar_lama;
            }
        } else {
            $gambar_baru = $gambar_lama;
        }

        $queryUpdate = mysqli_query($con, "UPDATE galeri_foto SET judul_foto='$judul_foto', gambar='$gambar_baru' WHERE id='$id'");
        if ($queryUpdate) {
            echo '<meta http-equiv="refresh" content="0; url=galeri.php" />';
        }
    }

    // Hapus foto atau video
    if (isset($_GET['hapus_id'])) {
        $id = $_GET['hapus_id'];
        $queryHapus = mysqli_query($con, "DELETE FROM galeri_foto WHERE id='$id'");
        if ($queryHapus) {
            echo '<meta http-equiv="refresh" content="0; url=galeri.php" />';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asset/css/style.css" />
    <style>
        .upload-img {
            max-width: 100px;
        }
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

<?php require "navbar.php"; ?>

<div class="main-content">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="bread">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="index.php" class="no-decoration text-muted"><i class="bi bi-house-door"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Galeri</li>
                    </ol>
                </nav>
            </div>
            <div class="user">
                <i class="bi bi-person-circle"></i> <?php echo $_SESSION['username']; ?>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
<div class="container">
    <h2 class="text-center mb-4">Manajemen Galeri</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="mb-5 p-4 shadow rounded bg-white">
        <h5>Tambah Foto / Video Galeri</h5>
        <div class="mb-3">
            <label for="judul_foto" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul_foto" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Pilih File (JPG, JPEG, PNG, MP4)</label>
            <input type="file" class="form-control" name="gambar" required>
        </div>
        <button type="submit" class="btn btn-maroon" name="simpan_foto">Simpan</button>
    </form>

    <h5 class="mt-5">List Galeri</h5>
    <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark align-middle">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Media</th>
                <th>Tanggal Upload</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                while ($data = mysqli_fetch_array($queryGaleri)) {
                    $file = $data['gambar'];
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_path = "../asset/image/" . $file;
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['judul_foto']); ?></td>
                <td>
                    <?php if (in_array($file_ext, ['jpg', 'jpeg', 'png'])): ?>
                        <img src="<?= $file_path ?>" class="upload-img" alt="Gambar Galeri">
                    <?php elseif ($file_ext === 'mp4'): ?>
                        <video width="100" controls>
                            <source src="<?= $file_path ?>" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    <?php else: ?>
                        Format tidak didukung
                    <?php endif; ?>
                </td>
                <td><?= date('d-m-Y', strtotime($data['tanggal_upload'])); ?></td>
                <td>
                    <button class="btn btn-maroon btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editGaleriModal<?= $data['id']; ?>">Edit</button>
                    <a href="?hapus_id=<?= $data['id']; ?>" class="btn btn-grey btn-sm mb-2" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editGaleriModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="editGaleriModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGaleriModalLabel">Edit Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <input type="hidden" name="gambar_lama" value="<?= $data['gambar']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul_foto" value="<?= htmlspecialchars($data['judul_foto']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ganti File (Opsional)</label>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-grey" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-maroon" name="update_foto">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
