<?php
	error_reporting(0);
	session_start();
	include "conf/db.php";

?>
<table  class="table table-bordered">
	<tr>
		<th>No</th>
		<th>ID Order</th>
		<th>Tanggal Pembelian</th>
		<th>Status Pembelian</th>
		<th>Total Pembelian</th>
		<th>Opsi</th>	
	</tr>

<?php
	$no=1;
		$user=$_SESSION['ses_username'];
		$sql=mysqli_query($koneksi,"Select * from tbl_pelanggan where username='$user'");
		while($tamp= mysqli_fetch_assoc($sql)){
		 $id_pelanggan=$tamp['id_pelanggan'];
		 $nama=$tamp['nama_pelanggan'];

		 }
		echo "<h3><i>Data Belanja <b> $nama</b></i></h3>";
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pembeli where id_pelanggan='$id_pelanggan'");
	while ($tampil = mysqli_fetch_array($sql)) {
		$id_pembelian=$tampil['id_pembelian'];
		?>
			<tr>
				<td>
					<?php echo $no; ?>
				</td>
				<td>
					<?php echo $tampil['id_pembelian']; ?>
				</td>
				<td>
					<?php echo $tampil['tanggal_pembelian']; ?>
				</td>
				<td>
					<?php echo $tampil['status_pembelian']; ?>
				</td>
				<td>Rp.
					<?php echo number_format($tampil['total_pembelian']); ?>
				</td>
				<td>
					<a href="?page=riwayat&op=nota&id=<?php echo $id_pembelian ?>" class="btn btn-primary btn-xs">Nota</a>
					<?php if($tampil['status_pembelian']=="Pending"){?>
					<a href="?page=riwayat&op=pembayaran&id=<?php echo $id_pembelian ?>" class="btn btn-success btn-xs">Pembayaran</a>
					<?php }?>
				</td>
			</tr>
		<?php $no++;
	}
?>
</table>