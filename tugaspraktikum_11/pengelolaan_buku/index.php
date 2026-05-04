<?php 
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Perpustakaan</title>
    <style>
        :root { --p-orange: #FF8C42; --d-orange: #E2711D; --bg-cream: #FFF9F0; --txt: #432818; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg-cream); color: var(--txt); padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid var(--p-orange); margin-bottom: 20px; }
        h2 { color: var(--d-orange); margin: 0; padding-bottom: 5px; }
        .btn { display: inline-block; background: var(--p-orange); color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; font-weight: bold; }
        .logout { color: #d9534f; text-decoration: none; font-weight: bold; border: 1px solid; padding: 5px 15px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: var(--p-orange); color: white; padding: 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        tr:hover { background: #FFF3E0; }
        .edit { color: #E2711D; text-decoration: none; border: 1px solid; padding: 3px 8px; border-radius: 4px; }
        .hapus { color: #d9534f; text-decoration: none; border: 1px solid; padding: 3px 8px; border-radius: 4px; margin-left: 5px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Pengelolaan Buku</h2>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <br>
    <a href="tambah.php" class="btn">+ Tambah Buku</a>
    <table>
        <thead>
            <tr><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM buku";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td><strong>" . htmlspecialchars($row['Judul']) . "</strong></td>
                    <td>" . htmlspecialchars($row['Penulis']) . "</td>
                    <td>{$row['Tahun_Terbit']}</td>
                    <td>Rp " . number_format($row['Harga'], 0, ',', '.') . "</td>
                    <td>{$row['Stok']}</td>
                    <td>
                        <a href='edit.php?id={$row['ID']}' class='edit'>Edit</a>
                        <a href='hapus.php?id={$row['ID']}' class='hapus' onclick='return confirm(\"Hapus?\")'>Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>