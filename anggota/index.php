<?php

$kon= mysqli_connect("localhost","root","","db_perpus");

$sql= "SELECT* from anggota ORDER BY nama";

$res = mysqli_query($kon, $sql);

$anggota= [];

while($data = mysqli_fetch_assoc($res)){
    $anggota[] = $data;
}
include '../aset/header.php';
?>

<div class= "card">
<div class="card-header">
<h2 class="card-title"><i class="fas fa-edit"></i>Data Anggota</h2>
</div>
<div class="card-body">
<a href="tambah.php">Tambah Data Anggota</a>
<table class="table table-striped">


<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nama</th>
<th scope="col">Kelas</th>
<th scope="col">aksi</th>

</tr>
</thead>

<tbody>
<?php
$no =1;
foreach($anggota as $a) {?>

<tr>
<td scope="row"><?=$no?></td>
<td><?=$a['nama']?></td>
<td><?=$a['kelas']?></td>

<td>

<a href="detail-anggota.php?id_anggota=<?=$a['id_anggota'];?>" class="badge badge-success
    ">Detail</a>
    <a href="edit-anggota.php?id_anggota=<?=$a['id_anggota'];?>" class="badge badge-warning
    ">Edit</a>
    <a href="hapus-anggota.php?id_anggota=<?=$a['id_anggota'];?>" class="badge badge-danger
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