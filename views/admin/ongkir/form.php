<?php
include '../koneksi.php';
	$id_ongkir = $_GET['id_ongkir']; 
	$nama=$_GET['id_kota'];
	$tarif="";
	if(!empty($id_ongkir)){
		$op="edit";
		$sql = mysqli_query($koneksi,"SELECT * FROM tbl_ongkir WHERE id_ongkir='$id_ongkir'");
		while ($tampil = mysqli_fetch_array($sql)) {
			$id_ongkir = $tampil['id_ongkir'];
			$nama = $tampil['id_kota'];
			$tarif=$tampil['tarif'];
		}
	} 
?>
	<form action="?page=ongkir&op=save" method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<input type="hidden" name="op" value="<?php echo $op ?>">
		<table class="table">
			<tr>
				<td>Id Ongkir</td><td><input type="text" class="form-control" name="id_ongkir" value="<?php echo $id_ongkir ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Kota</td><td>
					<select class="form-control" name="nama">
						<option disabled selected>Pilih Kota</option>
						<?php 
						include '../koneksi.php';
						$sql=mysqli_query($koneksi,"SELECT * FROM tbl_kota");
						while ($data=mysqli_fetch_array($sql)) {
						?>
						<option value="<?=$data['id_kota']?>"><?=$data['kota']?></option> 
						<?php
						}
						?>
						</select>
					</td>
			</tr>	
			<tr>
				<td>Tarif</td><td><input type="text" name="tarif" class="form-control" value="<?php echo $tarif; ?>"></td>
			</tr>
		</table>
		<input type="submit" value="Simpan" class="btn">
	</form>

	