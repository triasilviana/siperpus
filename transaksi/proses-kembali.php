<?php

$koneksi = mysqli_connect("localhost","root","","db_perpus");

include 'fungsi-transaksi.php';

if(isset($_POST['simpan']))
{
    $id_pinjam =$_POST['id_pinjam'];
    $id_buku =$_POST['id_buku'];
    $tgl_kembali =$_POST['tgl_kembali'];


    $sql ="UPDATE detail_pinjam SET tgl_kembali ='$tgl_kembali',
            status = 'Kembali' WHERE id_pinjam = $id_pinjam";
    $res =mysqli_query($koneksi, $sql);
    $count = mysqli_affected_rows($koneksi);

    $stok_update = ambilStok($koneksi, $id_buku) + 1;

	if ($count == 1) {
		updateStok($koneksi, $id_buku, $stok_update);
		$denda = hitungDenda($koneksi, $id_pinjam, $tgl_kembali);

		$sql = "UPDATE peminjaman SET denda=$denda WHERE id_pinjam=$id_pinjam";
		$res = mysqli_query($koneksi, $sql);

        header("Location: detail.php?id_pinjam=$id_pinjam");     
        
        if($queryc > 0){
            echo
            "
            <script>
            alert('Buku Berhasil Dikembalikan');
            document.location.href='http://localhost/siperpus/transaksi/detail.php?id_pinjam=$idpinjam';
            </script>
            ";
        }
}
}
else
{
    header("Location: index.php");
}
?>