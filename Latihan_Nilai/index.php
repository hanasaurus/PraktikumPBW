<!DOCTYPE html>
<html>
<head>
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <h2>Input Nilai Mahasiswa</h2>

<form method="post">
    Nama: <input type="text" name="nama"><br><br>
    Nilai: <input type="number" name="nilai"><br><br>
    <input type="submit" name="ok" value="Cek">
</form>

<?php
if (isset($_POST['ok'])) {
    $n = $_POST['nama'];
    $a = $_POST['nilai'];

    if ($a >= 85) $h = "A";
    elseif ($a >= 75) $h = "B";
    elseif ($a >= 65) $h = "C";
    elseif ($a >= 50) $h = "D";
    elseif ($a >= 0) $h = "E";
    else $h = "Tidak valid";

    echo "<br>Nama: $n";
    echo "<br>Nilai: $a";
    echo "<br>Predikat: $h";
}
?>

</body>
</html>
