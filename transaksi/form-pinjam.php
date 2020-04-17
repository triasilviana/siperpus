<?php

$koneksi = mysqli_connect("localhost", "root","","db_perpus");
include 'fungsi-transaksi.php';

$buku = ambilBuku($koneksi);
$anggota = ambilAnggota($koneksi);
$petugas = mysqli_query($koneksi,"SELECT * FROM petugas");

include '../aset/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<div class="container">
    <div class ="row mt-4">
      <div class ="col-md-8">
        <div class="card">
          <div class="card-header">
           <h3>Form Tambah Peminjaman</h3>
             </div>
            <div class="card-body">
          <form method="post" action="proses-pinjam.php">
        <div class="form-group">
      <label for="anggota">Nama Anggota</label>
    <select name="id_anggota" class="form-control">
  <?php
       foreach ($anggota as $a) { ?>

      <option value="<?=$a['id_anggota']?>"><?=$a['nama']?></option>
         <?php }
         ?>

        </select>

      </div>

<div class="form-group">
  <label for="buku">Judul Buku</label>
    <select name="id_buku" class="form-control">
      <?php
      foreach ($buku as $b) { ?>
        <option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>

        <?php }
        ?>
     </select>

</div>

<div class="form-group">
  <label for="datepicter">Tanggal Pinjam</label>
     <input type="date" name="tgl_pinjam" class="form-control" require>
        </div>


<div class="form-group">
     <label for="buku">Petugas</label>
     <select name="id_petugas" class="form-control">
     <?php
      while ($p = mysqli_fetch_assoc($petugas)):?>
             <option value="<?= $p['id_petugas'] ?>"><?= $p['nama_petugas'] ?></option>
         <?php
       endwhile;
        ?>
    </select>
</div>        
        
        
        
<div class="form-group">

<button type="submit" name="btnPinjam" class="btn btn-primary
               mt-auto">Simpan</button>
            </div>
          </form>
        </div> 
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php

include'../aset/footer.php';

?>