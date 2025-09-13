<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Aplikasi Perawatan Mesin</title>
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Aplikasi Mesin</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </nav>

    <div class="container mt-5">
        <h2>Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Data Mesin</h5>
                        <p><a href="mesin/index.php" class="btn btn-light">Lihat</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Perawatan</h5>
                        <p><a href="perawatan/index.php" class="btn btn-light">Lihat</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Perbaikan</h5>
                        <p><a href="perbaikan/index.php" class="btn btn-light">Lihat</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Floating Button Lanjut ke Statistik Grafik -->
    <a href="grafik.php" class="btn btn-info btn-lg rounded-circle shadow"
    style="position: fixed; bottom: 20px; right: 20px; z-index: 999;">
        📊
    </a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
