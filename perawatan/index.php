<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Perawatan Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3 class="mb-4">🧰 Data Perawatan Mesin</h3>
    <div class="mb-3 d-flex justify-content-between">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Perawatan</a>
        <a href="../dashboard.php" class="btn btn-secondary">🔙 Kembali ke Dashboard</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>ID Mesin</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM perawatan ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                    <td>$no</td>
                    <td>{$row['id_mesin']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['keterangan']}</td>
                    <td class='text-center'>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin hapus?')\" class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
