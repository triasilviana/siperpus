<?php 
$koneksi=mysqli_connect("localhost","root","","db_perpus");

include '../aset/header.php';

include 'fungsi-transaksi.php';
$id_pinjam = $_GET['id_pinjam'];

$pinjam = ambilPeminjaman($koneksi, $id_pinjam);

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
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      <h3>Edit Peminjaman</h3>
                    </div>
                <div class="card-body">
                <form method="post" action="proses-edit.php">

                <div class="form-group">
                    <label for="anggota">Nama Anggota</label>
                    <input type="text" value="<?=$id_pinjam['nama'] ?>"
                                 class="form-control" disabled>  
                </div>

                <div class="form-group">
                    <label for="datepicker">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" value="<?=$id_pinjam['tgl_pinjam'] ?>"
                                 class="form-control">  
                </div>

                <?php
                if($id_pinjam['status']=="Kembali")
                { ?>

                <div class="form-group">
                    <label for="datepicker">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" value="<?=$id_pinjam['tgl_kembali'] ?>"
                                 class="form-control">  
                </div>

                <?php    
                }?>

                <div class="form-group">
                <input type="hidden" name="id_pinjam" value="<?=$id_pinjam ["id_pinjam"]?>">  
                <button type="submit" name="btnPinjam" class="btn btn-primary">Simpan</button> 
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

include '../aset/footer.php';

?>