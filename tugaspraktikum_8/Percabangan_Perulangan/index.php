<!DOCTYPE html>
<html>
<head>
    <title>Tugas Praktikum 8</title>
    <style>
        body {
            font-family: Arial;
            background-color: #ffd883;
            margin: 0;
        }
        .navbar {
            background-color: #ff8c42;
            padding: 10px 0;
        }
        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .navbar ul li {
            display: inline-block;
            margin: 0 12px;
        }
        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            margin: auto;
            text-align: center;
        }
        .nama {
            color: #ff8c42;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="navbar">
    <?php include "menu.php"; ?>
</div>

<div class="container">
    <div class="card">
        <?php
        if(isset($_GET['hal'])){
            if($_GET['hal'] == "1"){
                include "soal1.php";
            } elseif($_GET['hal'] == "2"){
                include "soal2.php";
            } elseif($_GET['hal'] == "3"){
                include "soal3.php";
            } elseif($_GET['hal'] == "4"){
                include "soal4.php";
            } else {
                echo "Halaman tidak ada";
            }
        } else {
            echo "<h3 class='nama'>Nama: Hanna Fadillah Septiana</h3>
                  <h3 class='nama'>NPM: 2410631170072</h3>";
        }
        ?>
    </div>
</div>

</body>
</html>