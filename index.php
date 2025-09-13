<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi ke database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "❌ Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Aplikasi Perawatan Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
        }
        .login-box {
            margin: 100px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container col-md-4">
    <div class="login-box">
        <h4 class="text-center mb-4">🔐 Login Perawatan Mesin</h4>

        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

        <form method="post">
            <div class="mb-3">
                <label>👤 Username</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>🔑 Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
                <button name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p class="text-center mt-3 text-muted" style="font-size: 13px;">&copy; <?= date('Y') ?> Aplikasi Perawatan Mesin</p>
    </div>
</div>

</body>
</html>
