<?php

$koneksi = mysqli_connect("localhost","root", "", "db_perpus");

include '../aset/header.php';

$query =mysqli_query($koneksi, "SELECT* from kategori");

?>

<!DOCTYPE html>
<head>
     <title>tambah data buku</title>
</head>
<body>

    <div class="container">
        <div class="row mt-4"> 
            <div class="col-md-9">    
            <center>
            <div class="card" style="width:100%;">  
                 <div class="card-header" style="width:100%;">  

            <h2><i class="fas fa-user-plus"></i>Tambah buku</h2>
    </div>
         <div class="card-body"> 

         <form action="tambah_proses.php" method="post">
    

         <table class="table">
            <tr>
                <td>Judul buku</td>
                <td><input type="text" name="judul"></td>
            </tr>
         

            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            
            
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang"></td>
            </tr>
         

            <tr>
                <td>Ringkasan</td>
                <td>
                    <textarea name="ringkasan">
                    
                    </textarea>
                
                </td>
            </tr>


            <tr>
                <td><img src="<?=$detail['cover']?>" style="width: 25%"></td>
                <td>Cover</td>
                <td><input type="file" name="cover"></td>
            </tr>
         

            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok"></td>
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
 </div>
     </center>  
</body>
</html>
<?php
include '../aset/footer.php';
?>