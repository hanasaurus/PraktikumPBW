<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM koleksi_film WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $pesan = $stmt->execute() ? "Film dihapus" : "Gagal hapus";
    
    $stmt->close();
    $conn->close();
    header("Location: index.php?pesan=" . urlencode($pesan));
    exit();
}
?>