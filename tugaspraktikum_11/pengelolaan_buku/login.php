<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Perpustakaan</title>
    <style>
        body { background: #FFF9F0; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(255, 140, 66, 0.1); width: 320px; }
        h3 { color: #FF8C42; text-align: center; margin-top: 0; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 2px solid #FFE0C2; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; background: #FF8C42; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .error { color: #d9534f; text-align: center; font-size: 0.8em; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="login-card">
    <h3>Admin Login</h3>
    <?php if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal") echo "<p class='error'>Username atau Password Salah!</p>"; ?>
    <form action="proses_login.php" method="POST">
        <input type="text" name="user" placeholder="Username" required>
        <input type="password" name="pass" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>
</div>
</body>
</html>