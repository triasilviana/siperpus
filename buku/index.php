<?php

$koneksi= mysqli_connect("localhost","root","","db_perpus");

$sql= "SELECT* from buku ORDER BY judul";

$res = mysqli_query($koneksi, $sql);

$buku= [];

while($data = mysqli_fetch_assoc($res)){
    $buku[] = $data;
}
include '../aset/header.php';
?>

<div class= "card">
<div class="card-header">
<h2 class="card-title"><i class="fas fa-edit"></i>data peminjaman</h2>
</div>
<div class="card-body">
<a href="tambah_buku.php">Tambah Data Buku</a>
<table class="table table-striped">


<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Judul</th>
<th scope="col">Pengarang</th>
<th scope="col">stok</th>
<th scope="col">aksi</th>

</tr>
</thead>

<tbody>
<?php
$no =1;
foreach($buku as $b) {?>

<tr>
<th scope="row"><?=$no?></th>
<td><?=$b['judul']?></th>
<td><?=$b['pengarang']?></td>
<td><?=$b['stok']?></td>
<td>

<a href="detail_buku.php?id_buku=<?=$b['id_buku'];?>" class="badge badge-success
    ">Detail</a>
    <a href="edit-buku.php?id_buku=<?=$b['id_buku'];?>" class="badge badge-warning
    ">Edit</a>
    <a href="hapus-buku.php?id_buku=<?=$b['id_buku'];?>" class="badge badge-danger
    ">Hapus</a>
</td>


</tr>

<?php
$no++;

}
?>
</tbody>

</table>

</div>

</div>

<?php
include '../aset/footer.php';
?>