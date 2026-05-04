<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if ($password == $user['password']) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            $stmt->close();
            $conn->close();
            header("Location: index.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Movie Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --cream: #FDF5E6; --orange: #FF8C00; --orange-dark: #E67E22; }
        body { background-color: var(--cream); height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 15px; border: none; border-top: 8px solid var(--orange); width: 100%; max-width: 400px; margin: auto; }
        .btn-orange { background-color: var(--orange); color: white; font-weight: bold; border: none; }
        .btn-orange:hover { background-color: var(--orange-dark); color: white; }
    </style>
</head>
<body>
<div class="container">
    <div class="card shadow p-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: var(--orange);">ADMIN LOGIN</h3>
            <p class="text-muted small">Movie Library System</p>
        </div>
        <?php if(isset($error)): ?>
            <div class="alert alert-danger py-2 shadow-sm border-0 text-center"><small><?= $error ?></small></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-orange w-100 py-2 shadow-sm">MASUK SEKARANG</button>
        </form>
    </div>
</div>
</body>
</html>