<?php
	$id_kota = $_GET['id_kota'];
	$nama="";

	if(!empty($id_kota)){
		$op="edit";
		$sql = mysqli_query($koneksi,"SELECT * FROM tbl_kota WHERE id_kota='$id_kota'");
		while ($tampil = mysqli_fetch_array($sql)) {
			$id_kota = $tampil['id_kota'];
			$nama = $tampil['kota']; 
		}
	}
?>
	<form action="?page=kota&op=save" method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<input type="hidden" name="op" value="<?php echo $op ?>">
		<table class="table">
			<tr>
				<td>Id Kota</td><td><input type="text" class="form-control" name="id_kota" value="<?php echo $id_kota ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Kota</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"></td>
			</tr>	
			
		</table>
		<input type="submit" value="Simpan" class="btn">
	</form>

	