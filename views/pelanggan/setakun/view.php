<div class="container" style="margin-top: -20px;">
	<h4>Pengaturan Akun</h4>
</div>
<form class="form-horizontal" role="form" method="POST">
	<?php 
	session_start();
	include '../koneksi.php';
	$username=$_SESSION['ses_username'];
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE username='$username'");
	while ($tampil = mysqli_fetch_assoc($sql)) {
		$id=$tampil['id_pelanggan'];
		$foto=$tampil['foto'];
		$nama=$tampil['nama_pelanggan'];
		$alamat=$tampil['alamat'];
	}
	?>
	<div class="form-group" align="center">
		<img align="center" src="../../uploads/<?php echo $foto; ?>" width='250' height='240' class='img-circle'>
	</div><br>
	<div class="form-group form-horizontal">
		<div class="form-group">
			<label class="col-lg-2 control-label">Nama Pelanggan</label>
			<div class="col-lg-5">
				<input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan" value="<?php echo $nama ?>">
			</div>
		</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Alamat</label>
		<div class="col-lg-5">
			<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat ?>">
		</div>
	</div>
</form>