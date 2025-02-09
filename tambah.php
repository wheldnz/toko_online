<?php
session_start();

// cek sesion kalau tidak ada ditendang
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// cek apakah submit sudah di klik
if (isset($_POST["submit"])) {
    // var_dump($_POST);
    // var_dump($_FILES);
    // die;

    // cek keberhasilan data ditambahkan
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'dashbord.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'dashbord.php';
        </script>
        ";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Data</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #006778">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Tambah Data Bouqet</span>
        </div>
    </nav>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <div>
                    <label for="nama" class="col-form-label">Nama : </label>
                </div>
                <div>
                    <input type="text" name="nama" id="nama" required autocomplete="off" class="form-control">
                </div>
            </li>
            <li>
                <label for="kategori">kategori : </label>
                <input type="text" name="kategori" id="kategori" required autocomplete="off" class="form-control">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" required autocomplete="off" class="form-control">
            </li>
            <li>
                <label for="seri kode">Seri kode : </label>
                <input type="text" name="seri_kode" id="seri kode" required autocomplete="off" class="form-control">
            </li>
            <!-- <li>
                <label for="rincian">Rincian : </label>
                <input type="text" name="rincian" id="rincian" required autocomplete="off" class="form-control">
            </li> -->
            <li>
                <label for="gambar">gambar : </label>
                <input type="file" name="gambar" id="gambar" autocomplete="off" class="mt-2">
            </li>
            <li>
                <button class="btn btn-outline-success" type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>