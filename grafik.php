<?php
include 'koneksi.php';

// Ambil data jumlah perawatan per bulan
$perawatan = mysqli_query($conn, "
    SELECT DATE_FORMAT(tanggal, '%Y-%m') AS bulan, COUNT(*) AS jumlah 
    FROM perawatan 
    GROUP BY bulan 
    ORDER BY bulan
");

// Ambil data jumlah perbaikan per bulan
$perbaikan = mysqli_query($conn, "
    SELECT DATE_FORMAT(tanggal_kerusakan, '%Y-%m') AS bulan, COUNT(*) AS jumlah 
    FROM perbaikan 
    GROUP BY bulan 
    ORDER BY bulan
");

$data_perawatan = [];
$data_perbaikan = [];
$labels = [];

while ($row = mysqli_fetch_assoc($perawatan)) {
    $labels[] = $row['bulan'];
    $data_perawatan[$row['bulan']] = $row['jumlah'];
}
while ($row = mysqli_fetch_assoc($perbaikan)) {
    $data_perbaikan[$row['bulan']] = $row['jumlah'];
}

$all_bulan = array_unique(array_merge(array_keys($data_perawatan), array_keys($data_perbaikan)));
sort($all_bulan);

$label_js = json_encode($all_bulan);
$perawatan_js = [];
$perbaikan_js = [];

foreach ($all_bulan as $bln) {
    $perawatan_js[] = $data_perawatan[$bln] ?? 0;
    $perbaikan_js[] = $data_perbaikan[$bln] ?? 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistik Perawatan & Perbaikan Mesin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .back-button {
            margin-top: 15px;
            margin-bottom: 35px;
        }
    </style>
</head>
<body class="container mt-5">
    <h3 class="mb-4 text-center">📊 Statistik Grafik Perawatan & Perbaikan Mesin</h3>

    <div class="card shadow p-4 mb-3">
        <canvas id="grafik" style="height:400px;"></canvas>
    </div>

    <div class="text-end back-button">
        <a href="dashboard.php" class="btn btn-secondary btn-lg">🏠 Kembali ke Dashboard</a>
    </div>

    <script>
        const ctx = document.getElementById('grafik');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= $label_js ?>,
                datasets: [
                    {
                        label: 'Perawatan',
                        data: <?= json_encode($perawatan_js) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)'
                    },
                    {
                        label: 'Perbaikan',
                        data: <?= json_encode($perbaikan_js) ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
