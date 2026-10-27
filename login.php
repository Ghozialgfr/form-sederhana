<?php

require 'functions.php';

if(isset($_POST["login"])) {
    $nidn = $_POST["nidn"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM registrasi WHERE nidn = '$nidn'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $heshedpassword = $row["password"];

        if (password_verify($password, $heshedpassword)) {
        header("Location: profil.php?nidn=" . $nidn);
        exit;

    } else  {
        $errorMessage = "nidn atau password salah";

        }
    }
    
    else {
        $errorMessage = "nidn atau password tidak ditemukan";

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
    <h1>Halaman Login</h1>
    <?php if (isset($errorMessage) ) : ?>
        <p style="color: red; font-style: italic;">nidn/password salah</p>
        <?php endif; ?>

    <form action="" method="POST">
        <label for="nidn">Nidn</label>
        <input type="text" name="nidn" id="nidn" inputmode="numeric" required> 
        <br>
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit" name="login" value="login">Login</button>
        
    </form>
</body>
</html>