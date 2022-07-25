<?php
include '../koneksi.php';
	$id_admin = $_GET['id_admin'];
	$nama="";
	$foto="";
	$username="";
	$password="";
	
	if(!empty($id_admin)){
		$op="edit";
		$sql = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE id_admin='$id_admin'");
		while ($tampil = mysqli_fetch_array($sql)) {
			$id_admin = $tampil['id_admin'];
			$nama = $tampil['nama'];
			$foto=$tampil['foto'];
			$username=$tampil['username'];
			$password=$tampil['password'];
		}
	}
?>
	<form action="?page=admin&op=save" method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<input type="hidden" name="op" value="<?php echo $op ?>">
		<table class="table">
			<tr>
				<td>Id Admin</td><td><input type="text" class="form-control" name="id_admin" value="<?php echo $id_admin ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Admin</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>Foto</td><td><input type="file" name="foto" class="form-control" value="<?php echo $foto; ?>"></td>
			</tr>
			<tr>
				<td>Username</td><td><input type="text" name="username" class="form-control" value="<?php echo $username; ?>"></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" name="password" class="form-control" value="<?php echo $password; ?>"></td>
			</tr>
			
		</table>
		<input type="submit" value="Simpan" class="btn">
	</form>

