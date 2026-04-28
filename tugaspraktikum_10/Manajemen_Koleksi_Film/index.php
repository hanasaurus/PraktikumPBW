<?php
include 'koneksi.php';
$limit = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halaman - 1) * $limit;
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$search_param = "%$cari%";

$stmt_total = $conn->prepare("SELECT COUNT(*) FROM koleksi_film WHERE judul LIKE ?");
$stmt_total->bind_param("s", $search_param);
$stmt_total->execute();
$stmt_total->bind_result($total_data);
$stmt_total->fetch();
$stmt_total->close();

$total_halaman = ceil($total_data / $limit);
$stmt = $conn->prepare("SELECT * FROM koleksi_film WHERE judul LIKE ? ORDER BY id DESC LIMIT ? OFFSET ?");
$stmt->bind_param("sii", $search_param, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Movie Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --cream: #FDF5E6; --orange: #FF8C00; --orange-dark: #E67E22; --soft-cream: #FFFDD0; }
        body { background-color: var(--cream); color: #4A4A4A; }
        .header-box { background-color: var(--orange); color: white; padding: 2rem; border-bottom: 5px solid var(--orange-dark); margin-bottom: 2rem; }
        .card { border-radius: 15px; border: none; }
        .table thead { background-color: var(--orange); color: white; }
        .btn-orange { background-color: var(--orange); color: white; font-weight: bold; border: none; }
        .btn-orange:hover { background-color: var(--orange-dark); color: white; }
        .btn-cream { background-color: var(--soft-cream); color: var(--orange); border: 2px solid var(--orange); font-weight: bold; }
        .btn-cream:hover { background-color: var(--orange); color: white; }
        .badge-genre { background-color: var(--orange); color: white; }
    </style>
</head>
<body>
<div class="header-box text-center shadow">
    <h2 class="fw-bold">MOVIE COLLECTION</h2>
</div>
<div class="container">
    <?php if(isset($_GET['pesan'])): ?>
        <div class="alert alert-warning alert-dismissible fade show shadow-sm border-0"><?= htmlspecialchars($_GET['pesan']) ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>
    <div class="card shadow-sm p-4 mb-5">
        <div class="row g-3 mb-4">
            <div class="col-md-6"><a href="tambah.php" class="btn btn-orange px-4 shadow-sm">+ TAMBAH FILM</a></div>
            <div class="col-md-6">
                <form method="GET" class="d-flex">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari..." value="<?= htmlspecialchars($cari) ?>" style="border: 2px solid var(--orange);">
                    <button type="submit" class="btn btn-cream px-4">CARI</button>
                </form>
            </div>
        </div>
        <table class="table table-hover">
            <thead><tr class="text-center"><th>No</th><th>Judul</th><th>Sutradara</th><th>Genre</th><th>Tahun</th><th>Rating</th><th>Aksi</th></tr></thead>
            <tbody>
                <?php $no = $offset + 1; while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="fw-bold"><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['sutradara']) ?></td>
                    <td class="text-center"><span class="badge badge-genre rounded-pill"><?= htmlspecialchars($row['genre']) ?></span></td>
                    <td class="text-center"><?= $row['tahun_rilis'] ?></td>
                    <td class="text-center text-warning fw-bold">⭐ <?= $row['rating'] ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>