<?php  
$koneksi = mysqli_connect("localhost","root","","db_perpus");
include '../aset/header.php';

$id = $_GET['id_anggota'];

$sql = "SELECT * FROM anggota WHERE id_anggota=$id";
$res = mysqli_query($koneksi, $sql);
$detail = mysqli_fetch_assoc($res);
// var_dump($detail);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Anggota</title>
</head>
<body>
<div class="container">
	<div class="row mt-4">
		<div class="col-md-7">
			<h2>Detail Anggota</h2>
			<hr class="bg-ligth">
			<table class="table table-bordered">
				<tr>
					<td><strong>Nama Lengkap</strong></td>
					<td><?=$detail['nama'];?></td>
				</tr>
				<tr>
					<td><strong>kelas</strong></td>
					<td><?=$detail['kelas']?></td>
				</tr>
				<tr>
					<td><strong>Nomor Telepon</strong></td>
					<td><?=$detail['telp']?></td>
				</tr>
				<tr>
					<td><strong>Username</strong></td>
					<td><?=$detail['username']?></td>
				</tr>
				<tr>
					<td><strong>Password</strong></td>
					<td><?=$detail['password']?></td>
				</tr>


                <tr>
					<td><strong>Level</strong></td>
					<td><?=$detail['id_level']?></td>
				</tr>

				<tr>
					<td class="text-rigth" colspan="2">
						<a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>

					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<?php  
include '../aset/footer.php';
?>