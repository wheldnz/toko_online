<?php
require 'functions.php';

$home = query("SELECT*FROM bouqet");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/index.css">
  <title>NAA BOUQET STORE</title>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #006778">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#home">NAA BOUQET</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#store">Store</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#map">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#medsos">Medsos</a>
          </li>
          <li>
            <button class="btn btn-outline-warning" type="submit"><a href="login.php" class="text-light">Login</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- jumbotron -->
  <section class="jumbotron" id="home">
    <div class="container">
      <div class="row mb-3 ms-auto text-light">
        <div class="row mt-5 justify-content-between fs-5">
          <div class="col-md-4">
            <h3 class="font-bold" style="color: #ffd124;">BOUQET STORE</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum maxime quasi aliquam consequatur nobis sit dolore</p>
            <a href="#store">
              <button class="btn btn-outline-warning explore mb-2" type="submit">Explore</button>
            </a>
          </div>

          <div class="col-md-4 text-center my-2">
            <img src="./img/bqt.jpg" alt="bouqet" weight="600" class="img-jumbotron">
          </div>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#006778" fill-opacity="1" d="M0,160L18.5,165.3C36.9,171,74,181,111,181.3C147.7,181,185,171,222,170.7C258.5,171,295,181,332,170.7C369.2,160,406,128,443,144C480,160,517,224,554,234.7C590.8,245,628,203,665,181.3C701.5,160,738,160,775,186.7C812.3,213,849,267,886,272C923.1,277,960,235,997,186.7C1033.8,139,1071,85,1108,69.3C1144.6,53,1182,75,1218,80C1255.4,85,1292,75,1329,58.7C1366.2,43,1403,21,1422,10.7L1440,0L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir jumbotron -->

  <!-- store -->
  <section id="store">
    <div class="container ms-auto">
      <div class="text-light text-center mb-4">
        <h4 style="color: #ffd124;">Store</h4>
      </div>
      <div class="search mb-3">
        <form class="d-flex" role="search" action="" method="post">
          <input class="form-control me-2" type="text" name="keyword" placeholder="Masukan keyword pencarian...." aria-label="Search" id="keyword" autocomplete="off">
          <button class="btn btn-outline-warning" type="submit" id="tombol-cari">Search</button>
        </form>
      </div>
      <div class="store row text-center" id="container">
        <?php foreach ($home as $h) : ?>
          <div class="col-lg-2 justify-content-between text-center mt-3">
            <div class="card border-warning" style="width: 10rem;">
              <img src="img/<?= $h["gambar"]; ?>" class="card-img-top" alt="..." width="90">
              <div class="card-body">
                <h6 class="card-title"><?= $h["nama"]; ?></h6>
                <p class="card-text text-end tw-bolder text-success"><?= $h["harga"]; ?></p>
                <a href="#" class="btn btn-danger">detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#0093ab" fill-opacity="1" d="M0,192L15,197.3C30,203,60,213,90,213.3C120,213,150,203,180,181.3C210,160,240,128,270,138.7C300,149,330,203,360,202.7C390,203,420,149,450,117.3C480,85,510,75,540,64C570,53,600,43,630,69.3C660,96,690,160,720,186.7C750,213,780,203,810,213.3C840,224,870,256,900,240C930,224,960,160,990,144C1020,128,1050,160,1080,165.3C1110,171,1140,149,1170,154.7C1200,160,1230,192,1260,192C1290,192,1320,160,1350,149.3C1380,139,1410,149,1425,154.7L1440,160L1440,320L1425,320C1410,320,1380,320,1350,320C1320,320,1290,320,1260,320C1230,320,1200,320,1170,320C1140,320,1110,320,1080,320C1050,320,1020,320,990,320C960,320,930,320,900,320C870,320,840,320,810,320C780,320,750,320,720,320C690,320,660,320,630,320C600,320,570,320,540,320C510,320,480,320,450,320C420,320,390,320,360,320C330,320,300,320,270,320C240,320,210,320,180,320C150,320,120,320,90,320C60,320,30,320,15,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir store -->

  <!-- map start -->
  <section id="map">
    <div class="container">
      <div class="offline p-3">
        <h4 class="text-center text-light " style="color: #ffd124;">Toko Offline</h4>
      </div>
      <div class="map py-2 ratio ratio-21x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6977647683843!2d112.72270571744384!3d-7.387725799999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e532d80c2be5%3A0xe795e1693fcd021b!2sNaa%20Bouquet!5e0!3m2!1sid!2sid!4v1657891507790!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#006778" fill-opacity="1" d="M0,224L21.8,224C43.6,224,87,224,131,224C174.5,224,218,224,262,229.3C305.5,235,349,245,393,240C436.4,235,480,213,524,224C567.3,235,611,277,655,293.3C698.2,309,742,299,785,288C829.1,277,873,267,916,234.7C960,203,1004,149,1047,128C1090.9,107,1135,117,1178,106.7C1221.8,96,1265,64,1309,85.3C1352.7,107,1396,181,1418,218.7L1440,256L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
    </svg>
  </section>
  <!-- map end -->

  <!-- medsos start -->
  <section id="medsos">
    <div class="container">
      <div class="medsos justify-content-around ms-auto p-1">
        <div class="row">
          <p class="text-warning">@All Galery From NAABOUQET <i class="bi bi-balloon-heart-fill text-danger"></i></p>
        </div>
        <div class="col">
          <h4 class="text-warning text-center">Media Sosial</h4>
          <div class="icon text-center">
            <a href="https://www.facebook.com/Ymafzqr" target="_blank"><i class="bi bi-facebook text-primary fs-4 m-3"></i></a>
            <a href="https://www.tokopedia.com/naabouquett" target="_blank"><i class="bi bi-bag-check-fill text-success fs-4 m-3"></i></a>
            <a href="https://www.instagram.com/naabouquet_/?igshid=YmMyMTA2M2Y%3D" target="_blank"><i class="bi bi-instagram text-danger fs-4 m-3"></i></a>
            <a href="#" target="_blank"><i class="bi bi-bag-heart fs-4 m-3" style="color: #fd7e14;"></i></a>
          </div>
        </div>
        <div class="col" style="text-decoration: none; color:#ffd124">
          <ul>
            <li>
              <a href="#home" style="text-decoration: none; color:#ffd124">Home</a>
            </li>
            <li>
              <a href="#store" style="text-decoration: none; color:#ffd124">Store</a>
            </li>
            <li>
              <a href="#map" style="text-decoration: none; color:#ffd124">Map</a>
            </li>
            <li>
              <a href="#medsos" style="text-decoration: none; color:#ffd124">Medsos</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- medsos end -->

  <!-- footer -->
  <footer id="footer" class="text-dark text-center p-1" style="color: #ffd124;">
    <p class="p-2">Create with <i class="bi bi-arrow-through-heart-fill text-danger"></i> by <a href="https://www.instagram.com/wheldnz/?hl=id " class="text-dark fw-bold" style="text-decoration: none;">M. Wildan</a></p>
  </footer>
  <!-- akhir footer -->
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
  <script src="js/home.js"></script>
</body>

</html>