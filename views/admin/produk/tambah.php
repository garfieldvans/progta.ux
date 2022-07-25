	<?php
	$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM tbl_produk");
$data = mysqli_fetch_array($query);
$kodepr = $data['kodeTerbesar'];

$urutan = (int) substr($kodepr, 3, 3);

$urutan++;

$huruf = "PR";
$idpr = $huruf . sprintf("%03s", $urutan);


?>

	<form action="?page=produk&op=save" method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<input type="hidden" name="op" value="<?php echo $op ?>">
		<table class="table">

			<tr>
				<td>Id Produk</td><td><input type="text" class="form-control" name="id_produk" value="<?php echo $id_produk ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Produk</td><td><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"></td>
			</tr>	
			<tr>
				<td>Kategori</td><td>
					
					 <select name="kategori" class="form-control">
					  <option disabled selected> Pilih </option>
					 <?php 
					  $sql=mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
					  while ($data=mysqli_fetch_array($sql)) {
					 ?>
					   <option value="<?=$data['kategori']?>"><?=$data['kategori']?></option> 
					 <?php
					  }
					 ?>
					  </select>

				</td>
			</tr>
			<tr>
				<td>Stok</td><td><input type="text" name="stok" class="form-control" value="<?php echo $stok; ?>"></td>
			</tr>
			<tr>
				<td>Deskripsi</td><td><input type="text" name="deskripsi" class="form-control" style='height:200px' value="<?php echo $deskripsi; ?>"></td>
			</tr>
			<tr>
				<td>Harga Produk</td><td><input type="text" name="harga" class="form-control" value="<?php echo $harga; ?>"></td>
			</tr>		
			<tr>
				<td>Foto</td><td><input type="file" name="foto" class="form-control" value="<?php echo $foto; ?>"></td>
			</tr>
		</table>
		<input type="submit" value="Simpan" class="btn">
	</form>