<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM buku WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}
if (!$data) header("location:index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <style>
        body { background: #FFF9F0; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #fff; padding: 30px; border-radius: 12px; width: 350px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; background: #FF8C42; color: #fff; border: none; padding: 12px; border-radius: 6px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
<div class="card">
    <h3 style="color: #E2711D;">Edit Data Buku</h3>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['ID'] ?>">
        <input type="text" name="judul" value="<?= htmlspecialchars($data['Judul']) ?>" required>
        <input type="text" name="penulis" value="<?= htmlspecialchars($data['Penulis']) ?>" required>
        <input type="number" name="tahun" value="<?= $data['Tahun_Terbit'] ?>">
        <input type="number" name="harga" value="<?= (int)$data['Harga'] ?>">
        <input type="number" name="stok" value="<?= $data['Stok'] ?>">
        <button type="submit" name="submit">Simpan Perubahan</button>
        <a href="index.php" style="display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none;">Batal</a>
    </form>
</div>
</body>
</html>