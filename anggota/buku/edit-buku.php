<?php

$koneksi= mysqli_connect("localhost", "root", "", "db_perpus");

include '../aset/header.php';

$id_buku = $_GET['id_buku'];

$sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = $id_buku");

$buku = mysqli_fetch_assoc($sql);

$query = mysqli_query($koneksi, "SELECT * FROM kategori");

?>


<!DOCTYPE html>
<head>
    <title>Ubah Buku</title>
</head>
<body>
<div class="container">
    <div class="row mt-4"> 
        <div class="col-md-9"> 
            <div class="card" style="width:100%;"> 
                <div class="card-header" style="width:100%;"> 
                    <h2><i class="fas fa-user-plus"></i>Edit Buku</h2>
                </div> 
                <div class="card-body"> 
                <form action="edit-proses.php" method="post">


                <table class="table">
            <tr>
                <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku'];?>">
                <td>Judul buku</td>
                <td><input type="text" name="judul" value="<?php echo $buku['judul'];?>" required></td>
            </tr>
         

            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit" value="<?php echo $buku['penerbit'];?>"required></td>
            </tr>
            
            
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang" value="<?php echo $buku['pengarang'];?>" required></td>
            </tr>
         

            <tr>
                <td>Ringkasan</td>
                <td>
                    <textarea name="ringkasan">
                        <?php echo $buku['ringkasan'];?>    
                    </textarea>
                
                </td>
            </tr>


            <tr>
                <td>Cover</td>
                <td><input type="file" name="cover" value="<?php echo $buku['cover'];?>" required>
                     <img src="<?php echo $buku['cover'];?>" style="width: 25%">
                </td>
            </tr>
         

            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" value="<?php echo $buku['stok'];?>" required></td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td>

                    <select  style="width: 200px" name="id_kategori">

                   <option value="">-- Pilih Kategori --</option>

                   <?php
                        while ($kategori = mysqli_fetch_assoc($query)):
                   ?>

                   <option value="<?php echo $kategori['id_kategori']; ?>
                   "><?php echo $kategori['kategori']; ?></option>

                   <?php
                        endwhile;
                    ?>
                    
                    </select>
                
                </td>
            </tr>

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