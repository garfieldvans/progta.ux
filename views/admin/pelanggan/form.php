<?php
	$id_pelanggan = $_GET['id_pelanggan'];
	$nama="";
	$harga="";
	$jenis="";
	$alamat="";
	$telepon="";
	$foto="";
	$username="";
	$password="";
	
	if(!empty($id_pelanggan)){
		$op="edit";
		$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id_pelanggan'");
		while ($tampil = mysqli_fetch_array($sql)) {
			$id_pelanggan = $tampil['id_pelanggan'];
			$nama = $tampil['nama_pelanggan'];
			$jenis = $tampil['jenis_kelamin'];
			$alamat=$tampil['alamat'];
			$telepon=$tampil['telepon'];
			$foto=$tampil['foto'];
			$username=$tampil['username'];
			$password=$tampil['password'];
		}
	}
?>
	<form action="?page=pelanggan&op=save" method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<input type="hidden" name="op" value="<?php echo $op ?>">
		<table class="table">
			<tr>
				<td>Id Pelanggan</td><td><input type="text" class="form-control" name="id_pelanggan" value="<?php echo $id_pelanggan ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"></td>
			</tr>	
			<tr>
				<td>Jenis Kelamin</td><td><input type="text" name="jenis" class="form-control" value="<?php echo $jenis; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td><td><input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td><td><input type="text" name="telepon" class="form-control" value="<?php echo $telepon; ?>"></td>
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

	