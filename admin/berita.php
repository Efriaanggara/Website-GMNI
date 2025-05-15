<?php
    require "session.php";
    require "../koneksi.php";

    // Proses Tambah
    if (isset($_POST['simpan_berita'])) {
        $judul = htmlspecialchars($_POST['judul']);
        $isi = htmlspecialchars($_POST['isi']);
        $id_kategori = $_POST['id_kategori'];
        $tanggal_terbit = date('Y-m-d H:i:s'); // Otomatis tanggal saat upload

        $gambar = $_FILES['gambar_utama']['name'];
        $tmp_name = $_FILES['gambar_utama']['tmp_name'];
        $folder = "../asset/image/";
        move_uploaded_file($tmp_name, $folder . $gambar);

        mysqli_query($con, "INSERT INTO berita (judul, isi, id_kategori, tanggal_terbit, gambar_utama) 
                            VALUES ('$judul', '$isi', '$id_kategori', '$tanggal_terbit', '$gambar')");
    }

    // Proses Update
    if (isset($_POST['update_berita'])) {
        $id = $_POST['id'];
        $judul = htmlspecialchars($_POST['judul']);
        $isi = htmlspecialchars($_POST['isi']);
        $id_kategori = $_POST['id_kategori'];

        if (!empty($_FILES['gambar_utama']['name'])) {
            $gambar = $_FILES['gambar_utama']['name'];
            $tmp_name = $_FILES['gambar_utama']['tmp_name'];
            $folder = "../asset/image/";
            move_uploaded_file($tmp_name, $folder . $gambar);
            $result = mysqli_query($con, "UPDATE berita SET judul='$judul', isi='$isi', id_kategori='$id_kategori', gambar_utama='$gambar' WHERE id=$id");
        } else {
            $result = mysqli_query($con, "UPDATE berita SET judul='$judul', isi='$isi', id_kategori='$id_kategori' WHERE id=$id");
        }

        if ($result) {
            header("Location: berita.php");
        } else {
            echo "Update gagal: " . mysqli_error($con);
        }
    }

    // Proses Hapus
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        mysqli_query($con, "DELETE FROM berita WHERE id=$id");
        header("Location: berita.php");
    }

    // Query data kategori dan berita
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $queryBerita = mysqli_query($con, "SELECT berita.*, kategori.nama as nama_kategori FROM berita JOIN kategori ON berita.id_kategori = kategori.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPC GMNI OKU | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
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
<div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><a href="index.php" class="no-decoration text-muted"><i class="bi bi-house-door"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
        <h2 class="text-center mb-4">Manajemen Berita</h2>

        <!-- Form Tambah Berita -->
        <form action="" method="POST" enctype="multipart/form-data" class="mb-5 p-4 shadow rounded bg-white">
            <h5>Tambah Berita</h5>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="mb-3">
                <label>Isi</label>
                <textarea class="form-control" name="isi" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Gambar Utama</label>
                <input type="file" class="form-control" name="gambar_utama" required>
            </div>
            <button type="submit" name="simpan_berita" class="btn btn-maroon">Simpan</button>
        </form>

        <!-- List Berita -->
        <h5>Daftar Berita</h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Terbit</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($data = mysqli_fetch_array($queryBerita)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['judul'] ?></td>
                        <td><?= $data['nama_kategori'] ?></td>
                        <td><?= date('d-m-Y', strtotime($data['tanggal_terbit'])) ?></td>
                        <td><img src="../asset/image/<?= $data['gambar_utama'] ?>" width="100"></td>
                        <td>
                            <button class="btn btn-maroon btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id'] ?>">Edit</button>
                            <a href="berita.php?hapus=<?= $data['id'] ?>" class="btn btn-grey btn-sm mb-2" onclick="return confirm('Yakin hapus berita ini?')">Hapus</a>
                        </td>
                    </tr>

                    <!-- Edit -->
                    <div class="modal fade" id="editModal<?= $data['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Berita</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                        <div class="mb-3">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Isi</label>
                                            <textarea class="form-control" name="isi" rows="5" required><?= htmlspecialchars($data['isi']) ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Kategori</label>
                                            <select name="id_kategori" class="form-select" required>
                                                <?php
                                                $kategoriResult = mysqli_query($con, "SELECT * FROM kategori");
                                                while ($kategori = mysqli_fetch_array($kategoriResult)) { ?>
                                                    <option value="<?= $kategori['id'] ?>" <?= ($kategori['id'] == $data['id_kategori']) ? 'selected' : '' ?>>
                                                        <?= $kategori['nama'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Gambar Baru</label>
                                            <input type="file" class="form-control" name="gambar_utama">
                                        </div>
                                        <!-- Tidak ada input tanggal_terbit disini -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-grey btn-sm" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-maroon btn-sm" name="update_berita">Simpan</button>
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
