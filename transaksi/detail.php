<?php

include '../aset/header.php';

$koneksi = mysqli_connect("localhost","root","","db_perpus");

include 'fungsi-transaksi.php';

$id_pinjam =$_GET['id_pinjam'];

$sql = "SELECT * FROM peminjaman INNER JOIN detail_pinjam ON 
        peminjaman.id_pinjam = detail_pinjam.id_pinjam INNER JOIN
         buku on buku.id_buku = detail_pinjam.id_buku WHERE 
        peminjaman.id_pinjam = '$id_pinjam'";

$res = mysqli_query($koneksi, $sql);
$detail = mysqli_fetch_assoc($res);
$tgl_kembali=$detail["tgl_kembali"];
if($tgl_kembali==null){
	$tgl_kembali=date("Y-m-d");
$denda=hitungDenda($koneksi,$id_pinjam,$tgl_kembali);
}else{
	$denda=hitungDenda($koneksi,$id_pinjam,$tgl_kembali);
}
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
            <div class="col-md-7">
               <h2>Detail peminjaman</h2>
               <hr class="bg-light">
                 <table class="table table-bordered">
                 
                <tr>
                    <td><strong>Judul</strong></td>
                    <td><?= $detail['judul']?></td>
                </tr>

                <tr>
                    <td><strong>Tanggal Pinjam</strong></td>
                    <td><?= date('d F Y', strtotime($detail['tgl_pinjam']))?></td>
                </tr>

                <tr>
                    <td><strong>Tanggal Jatuh Tempo</strong></td>
                    <td><?= date('d F Y', strtotime($detail['tgl_jatuh_tempo']))?></td>
                </tr>

                <tr>
                    <td><strong>Tanggal Kembali</strong></td>
                    <td>
                        <?php
                        if($detail['tgl_kembali']= NULL){
                            echo'-';
                        }
                        else{
                            echo date('d F Y', strtotime($detail['tgl_kembali']));  
                        }
                            
                        ?>                  
                   </td>
                </tr>

                <tr>
                <td><strong>Status</strong></td>
					<td><?=$detail['status']?></td>
				</tr>

				<?php  
				if($denda > 0){
				?>
				<tr>
                    <td class="table-danger" colspan="2">
                        <strong>Denda yang harus dibayar: </strong>Rp <?=$denda?>
                    </td>
                </tr>
                <?php
                }
                ?>

                <tr>
                    <td class="text-right" colspan="2">
                     <a href="index.php" class="btn btn-success"><i class="fas fa-angel-double-left"></i>Kembali</a>
                     <a class="btn btn-primary <?php if($detail['tgl_kembali'] !=NULL) {echo "disable";}?>"
                     href="form-kembali.php?id_pinjam=<?=$detail['id_pinjam'] ?>&id_buku=<?= $detail['id_buku']?>"
                     role="button">
                     Form Pengembalian
                     </a>
                    </td>
                </tr>
                 
                 </table>
            </div>
        </div>
    </div>
</body>
</html>



<?php

include '../aset/footer.php';

?>