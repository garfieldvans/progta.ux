
	<form action="views/publik/daftar/save.php" method="POST" ENCTYPE="MULTIPART/FORM-DATA" >
		<?php

include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar FROM tbl_pelanggan");
$data = mysqli_fetch_array($query);
$kodeplg = $data['kodeTerbesar'];

$urutan = (int) substr($kodeplg, 3, 3);

$urutan++;

$huruf = "PLG";
$idplg = $huruf . sprintf("%03s", $urutan);


?>
		<table class="table">
			<tr>
				<td></td><td hidden><input type="text" class="form-control" name="id_pelanggan" value="<?php echo $idplg; ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama</td><td><input type="text" name="nama" class="form-control" required></td>
			</tr>	
			<tr>
				<td>Jenis Kelamin</td><td><select class="form-control" name="jenis">
					<option disabled selected>Pilih</option>
					<option value="laki-Laki">Laki-Laki</option>
					<option value="perempuan">Perempuan</option>
				</select></td>
			</tr>
			<tr>
				<td>Alamat</td><td><input type="text" name="alamat" class="form-control" required></td>
			</tr>
			<tr>
				<td>Telepon</td><td><input type="text" name="telepon" class="form-control" required></td>
			</tr>
			<tr>
				<td>Foto</td><td><input type="file" name="foto" class="form-control"></td>
			</tr>
			<tr>
				<td>Username</td><td><input type="text" name="username" class="form-control" required></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" name="password" class="form-control" required></td>
			</tr>
			
		</table>
		<input type="submit" value="Simpan" class="btn btn-primary">
	</form>

	