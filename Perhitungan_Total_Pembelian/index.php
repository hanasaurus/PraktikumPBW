<?php

$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];

$jumlah = 2;

$total = $barang["harga"] * $jumlah;

$pajak = $total * 10 / 100;

$totalBayar = $total + $pajak;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Pembelian</title>
</head>
<body>

<h2>Perhitungan Total Pembelian</h2>

<p>Nama Barang: <?php echo $barang["nama"]; ?></p>
<p>Harga Satuan: Rp <?php echo number_format($barang["harga"],0,",","."); ?></p>
<p>Jumlah Beli: <?php echo $jumlah; ?></p>
<p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($total,0,",","."); ?></p>
<p>Pajak (10%): Rp <?php echo number_format($pajak,0,",","."); ?></p>
<p><b>Total Bayar: Rp <?php echo number_format($totalBayar,0,",","."); ?></b></p>

</body>
</html>