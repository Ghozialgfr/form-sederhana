<?php
    require 'functions.php';

    $id = $_GET["id"];

    $dsn = query("SELECT * FROM dosen WHERE id= $id")[0];

    if(isset($_POST["submit"])) {

      if(ubah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil di ubah');
        document.location.href = 'index.php';
        </script>";
      } else {
        echo "<script>
        alert('Data gagal di ubah');
        document.location.href = 'index.php';
        </script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ubah Data Dosen</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?= $dsn["id"]; ?>">
        <input type="hidden" name="fotoLama" value="<?= $dsn["foto"]; ?>">
        <ul>
            <li>
                <label for="nidn">NIDN: </label>
                <input type="number" name="nidn" id="nidn" value="<?= $dsn["nidn"]; ?>"> 
            </li>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" value="<?= $dsn["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $dsn["email"]; ?>">
            </li>
             <li>
                <label for="prodi">Prodi: </label>
                <input type="text" name="prodi" id="prodi" value="<?= $dsn["prodi"]; ?>">
            </li>
            <li>
                <label for="foto">Foto: </label> <br>
                <img src="img/<?= $dsn["foto"]; ?>" width="60" style="margin-bottom: 10px;"> <br>
                <input type="file" name="foto" id="foto">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>
</body>
</html>