<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        //pemeriksaan session
        if (!isset($_SESSION['login']))
        {
            //jika sudah login
            //menampilkan isi session
            echo "<h1>Selamat Datang ". $_SESSION['login'].
            "</h1>";
            echo "<h2>Halaman ini hanya bisa diakses jika
            Anda sudah login</h2>";
            echo "<h2>Klik <a href='logout.php'>di
            sini(logout.php)</a> untuk LOGOUT</h2>";
        } 
        else
        {
            //session belum ada artinya belum login
            die ("Anda belum login! Anda tidak berhak masuk ke halaman ini.Silahkan login <a href='loginsession.php'>di sini</a>");
        }
    ?>
</body>
</html>