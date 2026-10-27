<?php

require 'functions.php';

if (!isset($_GET["nidn"])) {
    header("Location: login.php");
    exit;
}

$nidn = $_GET["nidn"];

$result = mysqli_query($conn, "SELECT * FROM dosen WHERE nidn = '$nidn'");

if (mysqli_num_rows($result) === 1) {
    $profil = mysqli_fetch_assoc($result);
} else {
    echo "Data dosen tidak ditemukan.";
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen</title>
    <style>
    
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5; 
            display: flex;
            padding-top: 20px;
        }

        .wa-profile-container {
            width: 100%;
            max-width: 300px;
            background-color: #f0f2f5;
        }

        .wa-header {
            background-color: #ffffff;
            text-align: center;
            padding: 10px 10px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .wa-header img {
            width: 200px;
            height: 350px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .wa-header h2 {
            color: #111b21;
            font-size: 24px;
            font-weight: 400;
        }

        .wa-info-section {
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            margin-bottom: 10px;
        }

        .wa-info-item {
            padding: 15px 20px 15px 20px;
            border-bottom: 1px solid #f2f2f2;
        }

        .wa-info-item:last-child {
            border-bottom: none;
        }

        .wa-label {
            display: block;
            color: #008069; 
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .wa-value {
            display: block;
            color: #111b21;
            font-size: 17px;
        }

        .wa-actions {
            background-color: #ffffff;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            display: block;
            text-align: center;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-ubah {
            background-color: #008069;
            color: white;
        }

        .btn-ubah:hover {
            background-color: #016b58;
        }

        .btn-logout {
            background-color: #ffffff;
            color: #ea0038;
            border: 1px solid #ea0038;
        }

        .btn-logout:hover {
            background-color: #ea0038;
            color: white;
        }
    </style>
</head>
<body>
    <div class="wa-profile-container">
        
        <div class="wa-header">
        
            <h1>Profil Dosen</h1>
            <br>
            <img src="img/<?= $profil["foto"]; ?>" alt="Foto Profil">
            <h2>Nama Dosen: <?= $profil["nama"]; ?></h2>

        </div>

        <div class="wa-info-section">
            <div class="wa-info-item">
                <span class="wa-label">NIDN</span>
                <span class="wa-value"><?= $profil["nidn"]; ?></span>
            </div>

            <div class="wa-info-item">
                <span class="wa-label">Email</span>
                <span class="wa-value"><?= $profil["email"]; ?></span>
            </div>

            <div class="wa-info-item">
                <span class="wa-label">Program Studi</span>
                <span class="wa-value"><?= $profil["prodi"]; ?></span>
            </div>
        </div>

        <div class="wa-actions">
            <a href="ubah.php?id=<?= $profil["id"]; ?>" class="btn btn-ubah">Ubah Data Profil</a>
            <a href="login.php" class="btn btn-logout">Keluar (Logout)</a>
        </div>

    </div>

</body>
</html>