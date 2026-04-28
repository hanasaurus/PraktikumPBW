<!DOCTYPE html>
<html>
<head>
    <title>Soal 1</title>
    <style>
        body {
            font-family: Arial;
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
        .hasil {
            margin-top:10px;
            font-weight:bold;
        }
    </style>
</head>
<body>

    <h3>Jenis Kendaraan</h3>

    <form method="post">
        <input type="number" name="roda"><br>
        <button type="submit">Cek</button>
    </form>

    <div class="hasil">
    <?php
    if(isset($_POST['roda'])){
        switch($_POST['roda']){
            case 2: echo "Motor"; break;
            case 3: echo "Bajaj"; break;
            case 4: echo "Mobil"; break;
            case 6: echo "Truk"; break;
            default: echo "Tidak diketahui";
        }
    }
    ?>
    </div>
</div>

</body>
</html>