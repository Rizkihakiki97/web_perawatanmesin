<?php
include '../koneksi.php'; 
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM perawatan WHERE id='$id'");
$data = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Perawatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>✏️ Edit Jadwal Perawatan</h3>
    <form method="post">
        <div class="mb-3">
            <label>ID Mesin</label>
            <input type="text" name="id_mesin" class="form-control" value="<?= $data['id_mesin'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= $data['deskripsi'] ?></textarea>
        </div>
        <button class="btn btn-warning" name="update">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if(isset($_POST['update'])){
        $id_mesin = $_POST['id_mesin'];
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];
        mysqli_query($conn, "UPDATE perawatan SET id_mesin='$id_mesin', tanggal='$tanggal', deskripsi='$deskripsi' WHERE id='$id'");
        echo "<script>location='index.php';</script>";
    }
    ?>
</body>
</html>
