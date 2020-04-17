<?php

$koneksi = mysqli_connect("localhost","root","","db_perpus");
$id_buku = $_GET["id_buku"];
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku=$id_buku");


if($query>0)
{
    echo
    "
    <script>
        alert('data berhasil dihapus yeayy!');
        document.location.href='index.php';
    </script>
    ";
}
?>