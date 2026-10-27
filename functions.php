<?php

$conn = mysqli_connect("localhost","root","","latihandb");

function upload() {
    $filename = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('uplod gambar terlebih dahulu');
              </script>";
        return false;
    }

    $fileExtensionValid = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $filename);
    $fileExtension = strtolower(end($fileExtension));
    
    if (!in_array($fileExtension, $fileExtensionValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }


    if ($filesize > 1000000) { 
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;

    // var_dump($newFileName); die;

    move_uploaded_file($tmpName, 'img/' . $newFileName);
    return $newFileName;
}

function query($query){
    global $conn; 
    $result = mysqli_query ($conn, $query); 
    $rows = []; 
    while($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;  
    }
    return $rows; 
}

function tambah($data) {
    global $conn;

    $nama = $data["nama"];
    $nidn = $data["nidn"];
    $email = $data["email"];
    $prodi = $data["prodi"];

    $foto = upload();

    if(!$foto) {
        echo "uplod gagal";
        return false;
    }

    $query = "INSERT INTO dosen (nama, nidn, email, prodi, foto) VALUES ('$nama', '$nidn', '$email', '$prodi', '$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $nidn = $data["nidn"];
    $email = $data["email"];
    $prodi = $data["prodi"];
    $fotoLama = $data["fotoLama"]; 

    if ($_FILES['foto']['error'] === 4) {
    
        $foto = $fotoLama;

    } else {
        $foto = upload();
        
        if (!$foto) {
            return false;
        }

        if (file_exists('img/' . $fotoLama)) {
            unlink('img/' . $fotoLama);
        }
    }

    $query = "UPDATE dosen SET 
                nama = '$nama', 
                nidn = '$nidn', 
                email = '$email', 
                prodi = '$prodi', 
                foto = '$foto' 
              WHERE id= $id ";
              
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM dosen WHERE id= $id");
    return mysqli_affected_rows($conn);
}


function cari($data) {
    $nama = $data["nama"];
    $prodi = $data["prodi"];
    $nidn = $data["nidn"];

    $query = "SELECT * FROM dosen 
              WHERE 
              nama LIKE '%$nama%' AND 
              prodi LIKE '%$prodi%' AND 
              nidn LIKE '%$nidn%'
            ";
            
    return query($query);
}


function getprodi() {
    return query("SELECT DISTINCT prodi FROM dosen ORDER BY prodi ASC");
}

function carilanjut($data) {
    $nama = $data["nama"];
    $prodi = $data["prodi"];
    $nidn_awal = $data["nidn_awal"];
    $nidn_akhir = $data["nidn_akhir"];

    $sql = "SELECT * FROM dosen WHERE 1=1"; // Kondisi awal untuk memudahkan penambahan kondisi selanjutnya

    if (!empty($nama)) {
        $sql .= " AND nama LIKE '%$nama%'";
    }

    if (!empty($prodi)) {
        $sql .= " AND prodi = '$prodi'";
    }

    if (!empty($nidn_awal) && !empty($nidn_akhir)) {
        $sql .= " AND nidn BETWEEN $nidn_awal AND $nidn_akhir";
    }else if (!empty($nidn_awal)) {
        $sql .= " AND nidn >= $nidn_awal";
    } else if (!empty($nidn_akhir)) {
        $sql .= " AND nidn <= $nidn_akhir";
    }

    return query($sql);
}

function registrasi($data) {

    global $conn;

    $nidn = strtolower(stripslashes($data["nidn"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string ($conn, $data["password2"]);

    $cek_dosen = mysqli_query($conn, "SELECT nidn FROM dosen WHERE nidn = '$nidn'");


    if (mysqli_num_rows($cek_dosen) === 0) {

        echo "<script>
        alert('regis gagal, nidn tidak terdaftar di tabel dosen!');
        </script>";
        return false;

    }

    $result = mysqli_query($conn, "SELECT nidn FROM registrasi WHERE nidn= '$nidn'");

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('NIDN sudah terdaftar! Silakan langsung login.');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
            alert('konfitmasi password tidak sesuai');
            </script>";
            return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO registrasi (nidn, password) VALUES ('$nidn', '$password')");

    if(mysqli_affected_rows($conn) <= 0) {
        echo "<script>
        alert ('Registrasi gagal!');
        </script>";
        return false;
    }

    return mysqli_affected_rows($conn);


}
    

?>