<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_perpus");

if(isset($_POST['simpan']))
{
    $id =$_POST['id_buku'];
    $judul = $_POST['judul'];
    $penerbit= $_POST['penerbit'];
    $pengarang= $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok= $_POST['stok'];
    $kategori= $_POST['id_kategori'];


$query =mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penerbit ='$penerbit', pengarang ='$pengarang',
    ringkasan='$ringkasan', cover='$cover', stok=$stok,id_kategori=$kategori WHERE id_buku =$id");





if($query>0)
{
    echo
    "
    <script>
    alert('data berhasil di edit horeee!');
    document.location.href ='buku/index.php';
    </script>
    ";
}
else
{
    echo
    "
    <script>
    alert('data berhasil di edit horeee!');
    document.location.href ='index.php';
    </script>
    ";
}

}

?>
