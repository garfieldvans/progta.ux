<?php
	error_reporting(0);
	session_start();
	include "../koneksi.php";

?>
<table  class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Id Pelanggan</th>
		<th>Tanggal Pembelian</th>
		<th>Status Pembelian</th>
		<th>Total Pembelian</th>
		<th colspan='3'>Opsi</th>	
	</tr>

<?php

	$no=1;
		echo "<h3><i>Data Pembelian </i></h3>";
	$sql = mysqli_query($koneksi, "SELECT * from tbl_pembeli");
	while ($tampil = mysqli_fetch_array($sql)) {
		$id_pembelian=$tampil['id_pembelian'];
		?>
			<tr>
				<td>
					<?php echo $no; ?>
				</td>
				<td>
					<?php echo $tampil['id_pelanggan']; ?>
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
					<a href="?page=pembelian&op=nota&id=<?php echo $id_pembelian ?>" class="btn btn-primary btn-xs">Detail</a>
				</td>
				<td>
					<?php if($tampil['status_pembelian']=="Sudah Dibayar" OR $tampil['status_pembelian']=="Batal" OR $tampil['status_pembelian']=="Barang Sedang Dikirim"){?>
					<a href="?page=pembelian&op=pembayaran&id=<?php echo $id_pembelian ?>" class="btn btn-success btn-xs">Proses</a>
					<?php }?>
				</td>
				<td>
					<?php if($tampil['status_pembelian']=="Batal" OR $tampil['status_pembelian']=="Barang Sedang Dikirim"){?>
					<a href="?page=pembelian&op=hapus&id=<?php echo $id_pembelian ?>" class="btn btn-danger btn-xs">Hapus</a>
					<?php }?>
				</td>
			</tr>
		<?php $no++;
	}
?>
</table>