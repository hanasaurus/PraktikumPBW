<!DOCTYPE html>
<html>
<head>
    <title>Soal 4</title>
    <style>
        body {
            font-family:Arial;
            background:#ffd883;
            margin:0;
            text-align:center;
        }
        .box {
            background:white;
            width:350px;
            margin:40px auto;
            padding:20px;
            border-radius:8px;
        }
        h3 {
            color:#ff8c42;
        }
        input {
            padding:8px;
            width:80%;
            margin:5px;
            border-radius:5px;
        }
        button {
            padding:8px 12px;
            background:#ff8c42;
            color:white;
            border:none;
            border-radius:5px;
        }
    </style>
</head>
<body>

    <h3>Genap/Ganjil</h3>

    <form method="post">
        <input type="number" name="angka"><br>
        <button type="submit">Cek</button>
    </form>

    <?php
    if(isset($_POST['angka'])){
        echo "<br>";
        echo ($_POST['angka']%2 == 0) ? "Genap":"Ganjil";
    }
    ?>
</div>

</body>
</html>