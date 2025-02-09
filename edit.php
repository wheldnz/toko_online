<?php
session_start();

// cek sesion kalau tidak ada ditendang
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}

require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil id
$id= $_GET["id"];

// query data bouqet berdasarkan id
$bqt= query("SELECT * FROM bouqet WHERE id = $id")[0];

// cek apakah submit sudah di klik
if(isset($_POST["submit"])){
    // cek keberhasilan data diedit
    if(edit($_POST) > 0){
        echo"
        <script>
            alert('data berhasil diedit');
            document.location.href = 'dashbord.php';
        </script>
        ";
    } else {
        echo"
        <script>
            alert('data gagal diedit');
            document.location.href = 'dashbord.php';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>edit data bouqet</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #006778">
  <div class="container">
    <span class="navbar-brand mb-0 h1">Edit Data Bouqet</span>
  </div>
</nav>

    <form action="" method="post" enctype="multipart/form-data" class="form">
        <input type="hidden" name="id" value="<?= $bqt["id"]?>">
        <input type="hidden" name="gambarLama" value="<?= $bqt["gambar"]?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" class="form-control" id="nama" required value="<?= $bqt["nama"]?>">
            </li>
            <li>
                <label for="kategori">kategori : </label>
                <input type="text" name="kategori" class="form-control" id="kategori" required value="<?= $bqt["kategori"]?>">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" class="form-control" id="harga" required value="<?= $bqt["harga"]?>">
            </li>
            <li>
                <label for="seri kode">Seri kode : </label>
                <input type="text" name="seri_kode" class="form-control" id="seri kode" required value="<?= $bqt["seri_kode"]?>">
            </li>
            <li>
                <label for="rincian">Rincian : </label>
                <input type="text" name="Rincian" class="form-control" id="rincian" required value="<?= $bqt["rincian"]?>">
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <img src="img/<?= $bqt['gambar']; ?>" width="60"> <br>
                <input type="file" name="gambar" id="gambar" class="mb-2">
                </li>
                <button class="btn btn-outline-success" type="submit" name="submit">Edit data</button>
            </ul>
    </form>
</body>
</html>