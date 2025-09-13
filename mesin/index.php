<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3 class="mb-4">🛠️ Data Mesin</h3>

    <div class="mb-3 d-flex justify-content-between">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Mesin</a>
        <a href="../dashboard.php" class="btn btn-secondary">🏠 Kembali ke Dashboard</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Mesin</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM mesin");
            while($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_mesin'] ?></td>
                <td><?= $row['lokasi'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td class="text-center">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
