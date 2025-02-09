<?php
// koneksi ke db
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    // ambil tiap data dalam form
    $nama = htmlspecialchars($data["nama"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $seri_kode = htmlspecialchars($data["seri_kode"]);
    // $rincian = htmlspecialchars($data["rincian"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO bouqet
                VALUES
                (null,'$nama','$kategori', '$harga', '$seri_kode', '$gambar'
                )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpFile = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
                </script>";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $exGambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaFile);
    $ektensiGambar = strtolower(end($ektensiGambar));
    // jika yang diupload bukan gambar
    if (!in_array($ektensiGambar, $exGambarValid)) {
        echo "<script>
                alert('Anda tidak mengupload file gambar')
                </script>";
        return false;
    }

    // cek ukuran gambar yang di upload
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar')
                </script>";
        return false;
    }

    // lolos pengecekan
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiGambar;

    move_uploaded_file($tmpFile, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM bouqet WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    // ambil tiap data dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $seri_kode = htmlspecialchars($data["seri_kode"]);
    // $rincian = htmlspecialchars($data["rincian"]);
    $gambarLama = $data["gambarLama"];

    // cek apakah user gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE bouqet SET
                nama = '$nama',
                kategori = '$kategori',
                harga = '$harga',
                seri_kode= '$seri_kode',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM bouqet
                WHERE 
                nama LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' OR
                seri_kode LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username tidak boleh kosong
    if (empty(trim($username))) {
        echo "<script>
            alert('username tidak boleh spasi saja');
        </script>";
        return false;
    }

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'
    ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar, mohon ulangi');
        </script>";

        return false;
    }

    // cek keberhasilan password
    if ($password !== $password2) {
        echo "<script>
        alert('password berbeda, mohon ulangi');
        </script>";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password);
    // die;

    // tambahkan user ke db
    mysqli_query($conn, "INSERT INTO users VALUES (null, '$username', '$email', '$password')");

    return (mysqli_affected_rows($conn));
}
