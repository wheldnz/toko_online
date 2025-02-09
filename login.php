<?php
session_start();
require 'functions.php';

// cek cookie ketika sudah keluar browser
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION["login"] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: dashbord.php");
  exit;
}



if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;

      // cek remember me
      if (isset($_POST["remember"])) {
        // buat cookie
        setcookie('id', $row["id"], time() + 60);
        setcookie('key', hash('sha256', $row["username"]), time() + 60);
      }

      header("Location: dashbord.php");
      exit;
    }
  }
  $error = true;
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


  <title>Login Admin!</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="global-container">

    <div class="card-admin">
      <div class="container">
        <h1>Admin Panel</h1>
      </div>
      <div class="card-form">

        <!-- sandi atau user salah -->
        <?php if (isset($error)) : ?>
          <p style="color: red; font-style: italic;">username atau sandi salah</p>
        <?php endif; ?>

        <!-- form login admin -->
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" name="username" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="off" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="submit" name="login">Login</button>
          </div>
        </form>

        <a href="registrasi.php" style="float: left; color:chartreuse; margin: 5px; text-align:center;">Create an account?</a>
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