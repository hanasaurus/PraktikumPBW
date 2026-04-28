<?php
include 'koneksi.php';
$stmt = $conn->prepare("DELETE FROM koleksi_film WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$pesan = $stmt->execute() ? "Dihapus" : "Gagal hapus";
header("Location: index.php?pesan=" . urlencode($pesan));
?>