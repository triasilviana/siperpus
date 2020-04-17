<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_perpus");

if(isset($_POST['simpan']))
{
    $id =$_POST['id_anggota'];
    $nama = $_POST['nama'];
    $kelas= $_POST['kelas'];
    $telp= $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

$query =mysqli_query($koneksi, "UPDATE anggota SET nama='$nama', kelas ='$kelas', telp='$telp',
    username='$username', password='$password' WHERE id_anggota =$id");


if($query>0)
{
    echo
    "
    <script>
    alert('data berhasil di edit horeee!');
    document.location.href ='index.php';
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