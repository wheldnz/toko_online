<?php
session_start();

// cek sesion kalau tidak ada ditendang
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}

require 'functions.php';
$id = $_GET["id"];
if(hapus($id)> 0){
    echo"
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'dashbord.php';
    </script>
    ";
} else {
    echo"
        <script>
            alert('data gagal dihapus');
            document.location.href = 'dashbord.php';
        </script>
        ";
}
?>