<?php

$koneksi = mysqli_connect("localhost","root","","db_perpus");

include '../aset/header.php';

$id=$_GET['id_anggota'];

$sql = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = $id");

?>


<!DOCTYPE html>
<head>
    <title>Edit Daftar Anggota</title>
</head>
<body>
<div class="container">
    <div class="row mt-4"> 
        <div class="col-md-9"> 
            <div class="card" style="width:100%;"> 
                <div class="card-header" style="width:100%;"> 
                    <h2><i class="fas fa-user-plus"></i>Edit Anggota</h2>
                </div> 
                <div class="card-body"> 
                <form action="proses-edit.php" method="post">
                <table class="table">
                <?php
                while ($anggota = mysqli_fetch_assoc($sql)):
                    ?>
            <tr>
                <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota'];?>">
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama" value="<?php echo $anggota['nama'];?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas" value="<?php echo $anggota['kelas'];?>"required></td>
            </tr>     
            <tr>
                <td>Nomor telepon</td>
                <td><input type="number" name="telp" value="<?php echo $anggota['telp'];?>"></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username" value="<?php echo $anggota['username'];?>" required></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="text" name="password" value="<?php echo $anggota['password'];?>" required></td>
            </tr>
            <?php
                endwhile;
                ?>
            <tr>
                <th></th>
                <th><input type="submit" class="btn btn-primary" name="simpan"
                value="simpan"></th>
            </tr>
            </table>
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