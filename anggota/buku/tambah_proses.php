<?php

$koneksi = mysqli_connect("localhost","root","","db_perpus");

if(isset($_POST['simpan'])){

    $judul=$_POST['judul'];
    $penerbit=$_POST['penerbit'];
    $pengarang=$_POST['pengarang'];
    $ringkasan=$_POST['ringkasan'];
    $cover=$_POST['cover'];
    $stok=$_POST['stok'];
    $id_kategori=$_POST['id_kategori'];

    $query = mysqli_query($koneksi, "INSERT INTO buku(judul, penerbit, pengarang, ringkasan, cover,stok,id_kategori)
        VALUES ('$judul','$penerbit', '$pengarang', '$ringkasan', '$cover', '$stok', '$id_kategori')");
        
if($query>0){
    echo "
        <script>
            alert('Data Berhasil Ditemukan');
            document.location.href='index.php';
        </script>
    ";
}

}

?>
