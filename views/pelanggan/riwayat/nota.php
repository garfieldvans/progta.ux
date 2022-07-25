<?php
	error_reporting(0);
	session_start();
	include "../koneksi.php";

?>
<h2><i><b>Detail Pembelian </b></i></h2>
<?php
$id=$_GET['id'];
$sql=mysqli_query($koneksi,"select * from tbl_pembeli join tbl_pelanggan on tbl_pembeli.id_pelanggan=tbl_pelanggan.id_pelanggan where id_pembelian='$id'");
				while( $tampil = mysqli_fetch_assoc($sql)) {
					$total=$tampil['total_pembelian'];
?>
<div class="alert alert-success">
<strong>Nama Pelanggan: <?php echo $tampil['nama_pelanggan']; ?></strong><i><br>
<strong>Alamat Pengiriman: <?php echo $tampil['alamat']; ?></strong><br>
<strong>NO.Telepon: <?php echo $tampil['telepon']; ?></strong><br>
<strong>Tanggal Pembelian: <?php echo $tampil['tanggal_pembelian']; ?></strong></i><br>
<strong>Rp <?php echo number_format($total);} ?></strong>
</div>

<section class="konten">
	<table class="table tabel-bordered " >
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub Total</th>
			<th>Ongkos Kirim</th>
		</tr>
		</thead>
		<tbody>
		<?php $nomor=1;?>
		<?php $sql=mysqli_query($koneksi,"select * from tbl_produk join tbl_pembeli join tbl_ongkir on tbl_pembeli.id_produk=tbl_produk.id_produk and tbl_pembeli.id_ongkir=tbl_ongkir.id_ongkir where tbl_pembeli.id_pembelian='$id'");
		while ($tam = mysqli_fetch_assoc($sql)){ 
		?>
		<tr>
			<td><?php echo $nomor;  ?></td>
			<td><?php echo $tam['nama_produk'];  ?></td>
			<td>Rp.<?php echo number_format($tam['harga_produk']);  ?></td>
			<td><?php echo $tam['jumlah'];  ?></td>
			<td>Rp.<?php echo $tam['harga_produk']*$tam['jumlah'] ;  ?></td>
			<td>Rp.<?php echo $tam['tarif'];  ?></td>
			</tr>
		<?php $nomor++  ?>
		<?php }  ?>
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-7">
			<div class="alert alert-warning">
				<p>
					Silahkan Melakukan Pembayaran <b> Rp.<?php echo number_format($total);?>..	</b>
					<b> <a href="?page=riwayat" class="btn btn-primary">Periksa Pembayaran</a><br>
							</b>
				</p>
			</div>
		</div>
	</div>
	</section>
