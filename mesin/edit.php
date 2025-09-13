<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM mesin WHERE id='$id'");
$data = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>✏️ Edit Mesin</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama Mesin</label>
            <input type="text" name="nama_mesin" class="form-control" value="<?= $data['nama_mesin'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required><?= $data['keterangan'] ?></textarea>
        </div>
        <button class="btn btn-warning" name="update">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_mesin'];
        $lokasi = $_POST['lokasi'];
        $ket = $_POST['keterangan'];
        mysqli_query($conn, "UPDATE mesin SET nama_mesin='$nama', lokasi='$lokasi', keterangan='$ket' WHERE id='$id'");
        echo "<script>location='index.php';</script>";
    }
    ?>
</body>
</html>
