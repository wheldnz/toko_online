<?php
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
        alert('Admin baru berhasil ditambahkan');
        </script>";
  } else {
    echo mysqli_error($conn);
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


  <title>sign up</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="global-container">

    <div class="card-admin">
      <div class="container">
        <h1>Registrasi Admin</h1>
      </div>
      <div class="card-form">



        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" name="username" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" name="email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password2" id="exampleInputPassword1" autocomplete="off" required>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="submit" name="register">Sign up</button>
          </div>
        </form>
        <div>
          <p><a href="login.php" style="float: left; color:chartreuse; margin: 5px; text-align:center;">return to Login Admin!</a></p>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>