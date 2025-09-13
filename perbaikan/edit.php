<?php
include '../koneksi.php'; 
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM perbaikan WHERE id='$id'");
$data = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Perbaikan Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3 class="mb-4">✏️ Edit Data Perbaikan Mesin</h3>

    <form method="post">
        <!-- Dropdown Mesin -->
        <div class="mb-3">
            <label for="id_mesin">Nama Mesin</label>
            <select name="id_mesin" class="form-control" required>
                <option value="">-- Pilih Mesin --</option>
                <?php
                $mesin = mysqli_query($conn, "SELECT * FROM mesin");
                while ($m = mysqli_fetch_array($mesin)) {
                    $selected = ($m['id'] == $data['id_mesin']) ? 'selected' : '';
                    echo "<option value='{$m['id']}' $selected>{$m['nama_mesin']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Tanggal Kerusakan -->
        <div class="mb-3">
            <label>Tanggal Kerusakan</label>
            <input type="date" name="tanggal_kerusakan" class="form-control" value="<?= $data['tanggal_kerusakan'] ?>" required>
        </div>

        <!-- Deskripsi Kerusakan -->
        <div class="mb-3">
            <label>Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" required><?= $data['deskripsi_kerusakan'] ?></textarea>
        </div>

        <!-- Tindakan Perbaikan -->
        <div class="mb-3">
            <label>Tindakan Perbaikan</label>
            <textarea name="tindakan_perbaikan" class="form-control" required><?= $data['tindakan_perbaikan'] ?></textarea>
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required><?= $data['keterangan'] ?></textarea>
        </div>

        <button class="btn btn-warning" name="update">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $id_mesin           = $_POST['id_mesin'];
        $tanggal_kerusakan  = $_POST['tanggal_kerusakan'];
        $deskripsi_kerusakan = $_POST['deskripsi_kerusakan'];
        $tindakan_perbaikan = $_POST['tindakan_perbaikan'];
        $tanggal_perbaikan = $_POST['tanggal_perbaikan'];
        $keterangan         = $_POST['keterangan'];

        mysqli_query($conn, "UPDATE perbaikan SET 
            id_mesin='$id_mesin', 
            tanggal_kerusakan='$tanggal_kerusakan', 
            deskripsi_kerusakan='$deskripsi_kerusakan', 
            tindakan_perbaikan='$tindakan_perbaikan', 
            tanggal_perbaikan='$anggal_perbaikan', 
            keterangan='$keterangan' 
            WHERE id='$id'");

        echo "<script>alert('Data berhasil diupdate!'); location='index.php';</script>";
    }
    ?>
</body>
</html>
