<?php

$kon= mysqli_connect("localhost","root","","db_perpus");

$sql= "SELECT* from peminjaman INNER JOIN anggota on
       peminjaman.id_anggota= anggota.id_anggota inner join
       petugas on peminjaman.id_petugas= petugas.id_petugas
       inner join detail_pinjam on peminjaman.id_pinjam= detail_pinjam.id_pinjam
       order by peminjaman.tgl_pinjam";

$res = mysqli_query($kon, $sql);

$pinjam = array();

while($data = mysqli_fetch_assoc($res)){
    $pinjam[] = $data;
}
include '../aset/header.php';
?>

<div class= "card">
<div class="card-header">
<h2 class="card-title"><i class="fas fa-edit"></i>data peminjaman</h2>
</div>
<div class="card-body">
<a href="form-pinjam.php">Tambah Data Peminjaman</a>
<table class="table table-striped">


<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nama peminjaman</th>
<th scope="col">Tanggal Pinjam</th>
<th scope="col">Tanggal jatuh tempo</th>
<th scope="col">Petugas</th>
<th scope="col">Status</th>
<th scope="col">Aksi</th>

</tr>
</thead>

<tbody>
<?php
$no =1;
foreach($pinjam as $p) {?>

<tr>
<th scope="row"><?=$no?></th>
<td><?=$p['nama']?></th>
<td><?=date('d F Y',strtotime($p['tgl_pinjam']))?></th>
<td><?=date('d F Y',strtotime($p['tgl_jatuh_tempo']))?></th>
<td><?=$p['nama_petugas']?></td>
<td>

<?php
if($p['status']=="dipinjam")
{
    echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
}

else
{
    echo '<h5><span class="badge badge-secondary">kembali</span></h5>';
}
?>
</td>
<td>

<a href="detail.php?id_pinjam=<?=$p['id_pinjam'];?>" class="badge badge-success
    ">Detail</a>
<a href="form-edit.php?id_pinjam=<?=$p['id_pinjam']?>" class="badge badge-warning
    ">Edit</a>
<a href="hapus.php?id_pinjam=<?=$p['id_pinjam']?>" class="badge badge-danger
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