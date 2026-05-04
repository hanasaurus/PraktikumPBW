<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';

$id = $_GET['id'];
$stmt_get = $conn->prepare("SELECT * FROM koleksi_film WHERE id = ?");
$stmt_get->bind_param("i", $id);
$stmt_get->execute();
$data = $stmt_get->get_result()->fetch_assoc();
$stmt_get->close(); 

if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE koleksi_film SET judul=?, sutradara=?, genre=?, tahun_rilis=?, rating=? WHERE id=?");
    $stmt->bind_param("sssid i", $_POST['judul'], $_POST['sutradara'], $_POST['genre'], $_POST['tahun'], $_POST['rating'], $id);
    $pesan = $stmt->execute() ? "Film berhasil diperbarui!" : "Gagal memperbarui.";
    
    $stmt->close(); 
    $conn->close();
    header("Location: index.php?pesan=" . urlencode($pesan)); 
    exit();
}
?>