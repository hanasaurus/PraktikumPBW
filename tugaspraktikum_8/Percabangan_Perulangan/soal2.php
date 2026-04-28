<!DOCTYPE html>
<html>
<head>
    <title>Soal 2</title>
    <style>
        body {
            font-family:
            Arial;
            background:#ffd883;
            margin:0;
            text-align:center;
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

    <h3>Bilangan Genap</h3>

    <form method="post">
        <input type="number" name="awal"><br>
        <input type="number" name="akhir"><br>
        <button type="submit">Tampilkan</button>
    </form>

    <?php
    if(isset($_POST['awal']) && isset($_POST['akhir'])){
        echo "<br>";
        for($i=$_POST['awal']; $i<=$_POST['akhir']; $i++){
            if($i % 2 == 0){
                echo $i . " ";
            }
        }
    }
    ?>
</div>

</body>
</html>