<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM bouqet
            WHERE 
        nama LIKE '%$keyword%' OR
        kategori LIKE '%$keyword%' OR
        harga LIKE '%$keyword%' OR
        seri_kode LIKE '%$keyword%'
";
$home =query($query);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <title>NAA BOUQET STORE</title>
  </head>
  <body>
      <div class="store row" id="container">
          <?php foreach($home as $h) : ?>
              <div class="col-md-2 justify-content-between p-2">
                <div class="card border-warning" style="width: 10rem;">
                    <img src="img/<?= $h["gambar"]; ?>" class="card-img-top" alt="..." width="90">
                      <div class="card-body">
                          <h6 class="card-title"><?= $h["nama"]; ?></h6>
                          <p class="card-text text-end"><?= $h["harga"]; ?></p>
                          <a href="#" class="btn btn-danger">detail</a>
                      </div>
                </div>
              </div>
          <?php endforeach; ?>
      </div>
  </body>
</html>