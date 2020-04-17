<?php

$koneksi = mysqli_connect("localhost","root","","db_perpus");
$id = $_GET["id_anggota"];
$query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota=$id");


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