<?php
    require 'functions.php';

    if(isset($_POST["submit"])) {
        // var_dump($_POST);
        // var_dump($_FILES);
        // die;

    if(tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil di input');
                document.location.href='index.php';
              </script>";
    } else {
        echo " Data gagal di input";
    }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihandb</title>
</head>
<body>
    <h1>Tambah Data Dosen</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nidn">NIDN: </label>
                <input type="number" name="nidn" id="nidn"> 
            </li>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email">
            </li>
             <li>
                <label for="prodi">Prodi: </label>
                <input type="text" name="prodi" id="prodi">
            </li>
            <li>
                <label for="foto">Foto: </label>
                <input type="file" name="foto" id="foto">
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>