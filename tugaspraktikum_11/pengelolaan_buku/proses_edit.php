<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id      = $_POST['id'];
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun   = $_POST['tahun'];
    $harga   = $_POST['harga'];
    $stok    = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE buku SET Judul=?, Penulis=?, Tahun_Terbit=?, Harga=?, Stok=? WHERE ID=?");
    $stmt->bind_param("ssidii", $judul, $penulis, $tahun, $harga, $stok, $id);
    if ($stmt->execute()) { header("location:index.php"); }
    $stmt->close();
}
$conn->close();
?>