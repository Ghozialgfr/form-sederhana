<?php
require 'functions.php';

if (isset($_POST["tbl_register"])) {
    if(registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                window.location.href = 'login.php';
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
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nidn">Nidn</label>
                <input type="text" name="nidn" id="nidn" inputmode="numeric" required> 
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="tbl_register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>