<!DOCTYPE html>
<html>
<head>
    <title>Soal 3</title>
    <style>
        body {
            font-family: Arial;
            background: #ffd883;
            margin: 0;
        }
        h3 {
            color: #ff8c42;
            margin-bottom: 15px;
        }
        form {
            margin-top: 10px;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 6px 0;
            border-radius: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button {
            margin-top: 10px;
            padding: 8px 15px;
            background: #ff8c42;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .hasil {
            margin-top: 15px;
            line-height: 1.6;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <h3>Daftar Hewan</h3>

    <form method="post">
        <input type="text" name="h1">
        <input type="text" name="h2">
        <input type="text" name="h3">
        <input type="text" name="h4">
        <input type="text" name="h5">
        <button type="submit">Tampilkan</button>
    </form>

    <div class="hasil">
    <?php
    if(isset($_POST['h1'])){
        echo "";

        $hewan = [
            $_POST['h1'],
            $_POST['h2'],
            $_POST['h3'],
            $_POST['h4'],
            $_POST['h5']
        ];

        foreach($hewan as $h){
            echo $h . "<br>";
        }
    }
    ?>
    </div>
</div>

</body>
</html>