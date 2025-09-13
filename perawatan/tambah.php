<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Perawatan Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>➕ Tambah Data Perawatan</h3>
    <form method="post">
        <!-- LANGKAH 2: DROPDOWN MESIN -->
        <div class="mb-3">
            <label for="id_mesin">Nama Mesin</label>
            <select name="id_mesin" class="form-control" required>
                <option value="">-- Pilih Mesin --</option>
                <?php
                $mesin = mysqli_query($conn, "SELECT * FROM mesin");
                while ($m = mysqli_fetch_array($mesin)) {
                    echo "<option value='{$m['id']}'>{$m['nama_mesin']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <!-- LANGKAH 3: VALIDASI ID MESIN -->
    <?php
if (isset($_POST['simpan'])) {
    $id_mesin = isset($_POST['id_mesin']) ? $_POST['id_mesin'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';

    // Cek apakah ID mesin valid
    $cek = mysqli_query($conn, "SELECT id FROM mesin WHERE id = '$id_mesin'");
    if (mysqli_num_rows($cek) > 0) {
        mysqli_query($conn, "INSERT INTO perawatan (id_mesin, tanggal, keterangan) VALUES ('$id_mesin', '$tanggal', '$keterangan')");
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>❌ ID Mesin tidak valid. Pilih dari dropdown!</div>";
    }
}
?>

</body>
</html>
