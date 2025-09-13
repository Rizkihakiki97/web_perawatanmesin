<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Perbaikan Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3 class="mb-4">➕ Tambah Data Perbaikan Mesin</h3>

    <form method="post">
        <!-- Dropdown Mesin -->
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

        <!-- Tanggal Kerusakan -->
        <div class="mb-3">
            <label for="tanggal_kerusakan">Tanggal Kerusakan</label>
            <input type="date" name="tanggal_kerusakan" class="form-control" required>
        </div>

        <!-- Deskripsi Kerusakan -->
        <div class="mb-3">
            <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" required></textarea>
        </div>

        <!-- Tindakan Perbaikan -->
        <div class="mb-3">
            <label for="tindakan_perbaikan">Tindakan Perbaikan</label>
            <textarea name="tindakan_perbaikan" class="form-control" required></textarea>
        </div>

        <!-- Tanggal Perbaikan -->
        <div class="mb-3">
            <label for="tanggal_perbaikan">Tanggal Perbaikan</label>
            <input type="date" name="tanggal_perbaikan" class="form-control" required>
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
        </div>

        <!-- Tombol -->
        <button class="btn btn-success" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <!-- Proses Simpan -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
        $id_mesin            = $_POST['id_mesin'] ?? '';
        $tanggal_kerusakan   = $_POST['tanggal_kerusakan'] ?? '';
        $deskripsi_kerusakan = $_POST['deskripsi_kerusakan'] ?? '';
        $tindakan_perbaikan  = $_POST['tindakan_perbaikan'] ?? '';
        $tanggal_perbaikan   = $_POST['tanggal_perbaikan'] ?? '';
        $keterangan          = $_POST['keterangan'] ?? '';

        // Validasi input
        if ($id_mesin && $tanggal_kerusakan && $deskripsi_kerusakan && $tindakan_perbaikan && $tanggal_perbaikan && $keterangan) {
            // Cek mesin
            $cek = mysqli_query($conn, "SELECT id FROM mesin WHERE id = '$id_mesin'");
            if (mysqli_num_rows($cek) > 0) {
                // Simpan data
                $query = mysqli_query($conn, "INSERT INTO perbaikan 
                    (id_mesin, tanggal_kerusakan, deskripsi_kerusakan, tindakan_perbaikan, tanggal_perbaikan, keterangan) 
                    VALUES 
                    ('$id_mesin', '$tanggal_kerusakan', '$deskripsi_kerusakan', '$tindakan_perbaikan', '$tanggal_perbaikan', '$keterangan')");

                if ($query) {
                    echo "<script>alert('✅ Data berhasil disimpan'); window.location='index.php';</script>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>❌ Gagal menyimpan ke database.</div>";
                }
            } else {
                echo "<div class='alert alert-warning mt-3'>⚠️ ID Mesin tidak valid. Pilih dari dropdown.</div>";
            }
        } else {
            echo "<div class='alert alert-warning mt-3'>⚠️ Semua field wajib diisi.</div>";
        }
    }
    ?>
</body>
</html>
