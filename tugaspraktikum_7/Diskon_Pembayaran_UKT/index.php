<?php
$hasil = "";

if (isset($_POST['hitung'])) {

    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];

    $diskon = 0;

    if ($ukt >= 5000000) {
        $diskon = 10;

        if ($semester > 8) {
            $diskon = 15;
        }
    }

    $potongan = ($diskon / 100) * $ukt;
    $bayar = $ukt - $potongan;

    $hasil = "
    <div class='hasil-box'>
        <h3>Hasil Perhitungan</h3>
        NPM : $npm <br>
        NAMA : $nama <br>
        PRODI : $prodi <br>
        SEMESTER : $semester <br>
        BIAYA UKT : Rp. " . number_format($ukt, 0, ',', '.') . ",- <br>
        DISKON : $diskon % <br>
        <b>YANG HARUS DIBAYAR : Rp. " . number_format($bayar, 0, ',', '.') . "</b>
    </div>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Diskon Pembayaran UKT</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5e6; /* cream */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #e67e22; /* jingga */
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #e67e22; /* jingga */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #cf711f;
        }

        .hasil-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #ffe6cc; /* cream jingga */
            border-left: 5px solid #e67e22;
            border-radius: 5px;
        }

        .hasil-box h3 {
            margin-top: 0;
            color: #d35400;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Pembayaran UKT</h2>

    <form method="post">
        <label>NPM</label>
        <input type="text" name="npm">

        <label>Nama</label>
        <input type="text" name="nama">

        <label>Prodi</label>
        <input type="text" name="prodi">

        <label>Semester</label>
        <input type="number" name="semester">

        <label>Biaya UKT</label>
        <input type="number" name="ukt">

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if ($hasil != "") {
        echo $hasil;
    }
    ?>
</div>

</body>
</html>