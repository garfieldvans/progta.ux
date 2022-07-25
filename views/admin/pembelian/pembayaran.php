
<?php
include '../koneksi.php';
$id_pembelian=$_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran WHERE id_pembelian='$id_pembelian'");
			while ($tampil = mysqli_fetch_assoc($sql)) {
?>
<div class='row'>
	<div class='col-md-8'>
		<table class="table table-bordered">
			<tr>
				<td><b>Nama </b></td>
				<td><?php echo $tampil['nama']?></td>
			</tr>
			<tr>
				<td><b>Bayar Pakai </b></td><td><?php echo $tampil['metode']?></td>
			</tr>
			<tr>
				<td><b>Jumlah </b> </td><td><?php echo 'Rp.'. $tampil['jumlah']?></td>
			</tr>
			<tr>
				<td><b>Tanggal </b> </td><td><?php echo $tampil['tanggal']?></td>
			</tr>
		</table>
	</div>
		</div>

<?php }?>

<form method='POST'><h3><b><i>Konfirmasi</i></b></h3>
	<h5><b>Proses</b></h5>
		<select class="form-control" name="konf">
		<option value="Barang Sedang Dikirim">Barang Sedang Dikirim</option>
		<option value="Batal">Batal</option>
		</option>
		</select><br>
		<h5><b>Masukan Nomor Resi</b></h5>
		<input type="text" name="resi" class="form-control"><br>
		<button name='kirim'  class='btn btn-primary'>Kirim</button>
		</form>
		
		
		
	<?php	if(isset($_POST['kirim'])){
		
		$konf=$_POST['konf'];
		$resi=$_POST['resi'];
		$sql=mysqli_query($koneksi,"UPDATE tbl_pembeli SET 
			status_pembelian='$konf',
			no_resi='$resi'
			where id_pembelian='$id_pembelian'");
		
		
		echo "<script>location='?page=pembelian'</script>";
	}
		?>
	