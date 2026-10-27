<?php

require 'functions.php';

$daftar_prodi = getprodi();

$dosen = query("SELECT * FROM dosen");

if (isset($_POST["cari"])) {
    $dosen = cariLanjut($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Ghozi Al Gifari -->
    <!-- 240102036 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihandb</title>
</head>
<body>
    <h1>Daftar Dosen</h1>
    <a href="tambah.php">Tambah Data Dosen</a>
    <br><br>

    <fieldset>
        <legend>Filter Pencarian</legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="nama">Nama Dosen</label></td>
                    <td>: <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan nama..."></td>
                </tr>
                <tr>
                    <br><br>
                    <td><label for="prodi">Program Studi</label></td>
                    <td>: 
                        <select name="prodi" id="prodi">
                            <option value="">-- Semua Program Studi --</option>
                            <?php foreach($daftar_prodi as $p) : ?>
                                <option value="<?= $p["prodi"]; ?>"><?= $p["prodi"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Rentang NIDN</label></td>
                    <td>: 
                        <input type="number" name="nidn_awal" placeholder="NIDN Awal"> s/d 
                        <input type="number" name="nidn_akhir" placeholder="NIDN Akhir">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="cari">Cari Data</button>
                        <a href="index.php"><button type="button">Reset</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Aksi</th>
            <th>Foto </th>
            <th>Nama </th>
            <th>NIDN </th>
            <th>Email </th>
            <th>Prodi </th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($dosen as $row):?>
        <tr>
            <td><?php echo $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda ingin menghapus data ini?')">hapus</a>
            </td>
            <td><img src="img/<?php echo $row["foto"]; ?>" width="50" > </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nidn"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["prodi"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>