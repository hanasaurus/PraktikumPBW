<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO koleksi_film (judul, sutradara, genre, tahun_rilis, rating) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdi", $_POST['judul'], $_POST['sutradara'], $_POST['genre'], $_POST['tahun'], $_POST['rating']);
    $pesan = $stmt->execute() ? "Berhasil ditambah" : "Gagal ditambah";
    header("Location: index.php?pesan=" . urlencode($pesan)); exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #FDF5E6; }
        .card { border-radius: 15px; border-top: 8px solid #FF8C00; }
        .btn-orange { background-color: #FF8C00; color: white; font-weight: bold; }
    </style>
</head>
<body class="p-5">
    <div class="card shadow mx-auto p-4" style="max-width: 500px;">
        <h4 class="text-center mb-4 fw-bold" style="color: #FF8C00;">TAMBAH FILM</h4>
        <form method="POST">
            <div class="mb-3"><label>Judul</label><input type="text" name="judul" class="form-control" required></div>
            <div class="mb-3"><label>Sutradara</label><input type="text" name="sutradara" class="form-control" required></div>
            <div class="mb-3"><label>Genre</label><input type="text" name="genre" class="form-control" required></div>
            <div class="row"><div class="col-6"><label>Tahun</label><input type="number" name="tahun" class="form-control" required></div><div class="col-6"><label>Rating</label><input type="number" step="0.1" name="rating" class="form-control" required></div></div>
            <button type="submit" class="btn btn-orange w-100 mt-4">SIMPAN DATA</button>
            <a href="index.php" class="btn btn-light w-100 mt-2 border">Batal</a>
        </form>
    </div>
</body>
</html>