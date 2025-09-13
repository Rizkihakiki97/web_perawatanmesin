<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Perbaikan Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>🛠️ Data Perbaikan Mesin</h3>
    <div class="d-flex justify-content-between mb-3">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Perbaikan</a>
        <a href="../dashboard.php" class="btn btn-secondary">🏠 Kembali ke Dashboard</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>ID Mesin</th>
                <th>Tanggal Kerusakan</th>
                <th>Deskripsi Kerusakan</th>
                <th>Tindakan Perbaikan</th>
                <th>Tanggal Perbaikan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM perbaikan ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['id_mesin'] ?></td>
                <td><?= $row['tanggal_kerusakan'] ?></td>
                <td><?= $row['deskripsi_kerusakan'] ?></td>
                <td><?= $row['tindakan_perbaikan'] ?></td>
                <td><?= $row['tanggal_perbaikan'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td class="text-center">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning mb-1">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
