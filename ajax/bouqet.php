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
$bouqet =query($query);

?>

<table class="table table-warning table-striped-columns">

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