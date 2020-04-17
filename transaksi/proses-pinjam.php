<?php

$koneksi = mysqli_connect("localhost","root","","db_Perpus");

include 'fungsi-transaksi.php';

session_start();

if(Isset($_POST['btnPinjam']))
{
    $id_anggota=$_POST['id_anggota'];
    $id_buku=$_POST['id_buku'];
    $tgl_pinjam=$_POST['tgl_pinjam'];
    $tgl_jatuh_tempo=date('Y-m-d', strtotime($tgl_pinjam. '+7 days'));
    $id_petugas=$_POST['id_petugas'];

$sql = "INSERT INTO peminjaman VALUES('','$id_anggota', '$tgl_pinjam', '$tgl_jatuh_tempo', '$id_petugas')";
$stok= ambilStok($koneksi,$id_buku); //ambil data stok buku

if(cekPinjam($koneksi,$id_anggota)&& $stok >0)
{
    $res= mysqli_query($koneksi,$sql);
    $querp= mysqli_query($koneksi, "SELECT id_pinjam FROM peminjaman
    WHERE tgl_pinjam ='$tgl_pinjam' AND id_anggota='$id_anggota' AND
    tgl_jatuh_tempo ='$tgl_jatuh_tempo' AND id_petugas='$id_petugas'");
    
    $wd=mysqli_fetch_assoc($querp);
    $idp=$wd["id_pinjam"];
    $sql1 = mysqli_query($koneksi, "INSERT INTO detail_pinjam(id_pinjam,id_buku)
            VALUES ('$idp', '$id_buku')");
    
    $count= mysqli_affected_rows($koneksi);

    $stok_update = $stok -1 ;
   
		if($sql1 == 1){
			updateStok($kon, $id_buku, $stok_update);
			header("Location:index.php");
		}

	}
	if(cekPinjam($kon, $id_anggota)==true){
		updateStok($kon, $id_buku, $stok_update);
		header("Location:index.php");
	}
}else{
	header("Location:form-pinjam.php");
}
?>
