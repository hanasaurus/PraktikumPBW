<?php 
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body { background-color: #FFF9F0; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(255, 140, 66, 0.1); width: 400px; }
        h3 { color: #FF8C42; margin-top: 0; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #666; font-size: 0.9em; }
        input { width: 100%; padding: 10px; border: 2px solid #FFE0C2; border-radius: 8px; box-sizing: border-box; outline: none; }
        button { width: 100%; background: #FF8C42; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #FF8C42; text-decoration: none; font-size: 0.85em; }
    </style>
</head>
<body>
<div class="form-card">
    <h3>Tambah Buku</h3>
    <form action="proses_tambah.php" method="POST">
        <div class="input-group"><label>Judul Buku</label><input type="text" name="judul" required></div>
        <div class="input-group"><label>Penulis</label><input type="text" name="penulis" required></div>
        <div style="display: flex; gap: 10px;">
            <div class="input-group"><label>Tahun</label><input type="number" name="tahun"></div>
            <div class="input-group"><label>Stok</label><input type="number" name="stok"></div>
        </div>
        <div class="input-group"><label>Harga (Rp)</label><input type="number" step="0.01" name="harga"></div>
        <button type="submit">Simpan Data</button>
        <a href="index.php" class="back-link">← Kembali ke Daftar</a>
    </form>
</div>
</body>
</html>