<h2><i><b>Detail Pembelian </b></i></h2>
<?php
include "../koneksi.php";
$id=$_GET['id'];
$sql=mysqli_query($koneksi,"select * from tbl_pembeli join tbl_pelanggan on tbl_pembeli.id_pelanggan=tbl_pelanggan.id_pelanggan where id_pembelian='$id'");
				while( $tampil = mysqli_fetch_assoc($sql)) {
					$total=$tampil['total_pembelian'];
?><div class="alert alert-info">
<strong>Username : <?php echo $tampil['nama_pelanggan']; ?></strong><i>
<p>Alamat : <?php echo $tampil['alamat']; ?></p>
<p>Telepon : <?php echo $tampil['telepon']; ?></p>
<p>Tanggal Pembelian : <?php echo $tampil['tanggal_pembelian']; ?></p></i>
<p>Total Pembelian : Rp <?php echo number_format($total);} ?></p>
</div><br><br>

<section class="konten">
	<table class="table tabel-bordered" >
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub Total</th>
		</tr>
		</thead>
		<tbody>
		<?php $nomor=1;?>
		<?php $sql=mysqli_query($koneksi,"select * from tbl_produk join tbl_pembeli on tbl_pembeli.id_produk=tbl_produk.id_produk where tbl_pembeli.id_pembelian='$id'");
		while ($tam = mysqli_fetch_assoc($sql)){ 
		?>
		<tr>
			<td><?php echo $nomor;  ?></td>
			<td><?php echo $tam['nama_produk'];  ?></td>
			<td>Rp.<?php echo number_format($tam['harga_produk']);  ?></td>
			<td><?php echo $tam['jumlah'];  ?></td>
			<td>Rp.<?php echo $tam['harga_produk']*$tam['jumlah'] ;  ?></td>
			</tr>
		<?php $nomor++  ?>
		<?php }  ?>
		</tbody>
	</table>
	</section>
