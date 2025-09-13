<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>➕ Tambah Mesin</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama Mesin</label>
            <input type="text" name="nama_mesin" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_mesin'];
        $lokasi = $_POST['lokasi'];
        $ket = $_POST['keterangan'];
        mysqli_query($conn, "INSERT INTO mesin (nama_mesin, lokasi, keterangan) VALUES ('$nama', '$lokasi', '$ket')");
        echo "<script>location='index.php';</script>";
    }
    ?>
</body>
</html>
