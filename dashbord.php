<?php 
session_start();

// cek sesion kalau tidak ada ditendang
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}

require 'functions.php';
$bouqet = query("SELECT*FROM bouqet");

// tombol cari di klik
if(isset($_POST["cari"])){
    $bouqet = cari($_POST["keyword"]);
}

// menampilkan data paling awal/akhir
// ORDER BY id DESC/ASC

//ambil data dari tabel bouqet
// $result = mysqli_query($conn, "SELECT * FROM bouqet");

// cek error
// var_dump($result);

// ambil data (fetch) bouqet dari object result
// mengembalikan array int
// $bqt = mysqli_fetch_row($result);
// var_dump($bqt[3]);

// mengembalikan array numerik/key
// while($bqt = mysqli_fetch_assoc($result)){
//     var_dump($bqt);
// } // palek ini yang terbaik  

// mengembalikan array int dan numerik
// $bqt = mysqli_fetch_array($result);
// var_dump($bqt["nama"]atau[2]);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | NAA BOUQET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #006778">
  <div class="container">
    <span class="navbar-brand mb-0 h1">NAA BOUQET</span>
  </div>
  <div style="margin-right: 10px;">
    <button class="btn btn-outline-warning" type="submit" ><a href="logout.php" style="text-decoration: none; color:aliceblue;">Logout</a></button>
    <button class="btn btn-outline-dark" type="submit" ><a href="tambah.php" style="text-decoration: none; color:aliceblue;">Add bouqet</a></button>
  </div>
</nav>
<br>

    <h2 class="judul" style="text-align: center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; color:#006778;">Daftar Bouqet</h2>

    <form action="" method="post" style="float:right;" class="mb-2">
        <input type="text" name="keyword" size="30" placeholder="masukan keyword pencarian...." autocomplete="off" id="keyword" >
        <button type="submit" name="cari" id="tombol-cari">cari!</button>
    </form>
    
    <div id="container" class="mt-3">
    <table  class="table table-warning table-striped-columns">

        <tr>
            <th>No.</th>
            <th>aksi</th>
            <th>gambar</th>
            <th>nama</th>
            <th>kategori</th>
            <th>harga</th>
            <th>seri kode</th>
        </tr>
    <?php $i = 1; ?>
    <?php foreach($bouqet as $row) : ?>
        <tr>
            <th><?= $i; ?></th>
            <th><button class="btn btn-outline-success" type="submit" ><a href="edit.php?id=<?= $row["id"]; ?>" style="text-decoration: none; color:black;">edit</a></button> | <button class="btn btn-outline-danger" type="submit" ><a href="hapus.php?id=<?= $row["id"]; ?>" style="text-decoration: none; color:black;">delete</a></button>
            </th>
            <th><img src="img/<?= $row["gambar"] ?>" width="90"></th>
            <th><?= $row["nama"]; ?></th>
            <th><?= $row["kategori"]; ?></th>
            <th><?= $row["harga"]; ?></th>
            <th><?= $row["seri_kode"]; ?></th>
        </tr>
    <?php $i++;?>
    <?php endforeach; ?>
    </table>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>