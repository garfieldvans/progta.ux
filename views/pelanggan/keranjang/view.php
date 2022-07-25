<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="progta";
$koneksi=mysqli_connect($host,$user,$password);
mysqli_select_db($koneksi,$db);

if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
	echo "<script>alert('Keranjang Kosong Silahkan Belanja Dulu ')</script>";
	echo "<script>location='?page=belanja'</script>";
	
}
?>
		
<html>
	<head>
	</head>
<body>
	<section class="konten">
	<h1>Keranjang Belanja</h1>
	<hr>
	<table class="table tabel-bordered">
	<thead>
		<tr border="1">
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub Harga</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
		<?php $nomor=1;?>
		<?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah){ ?>
		<?php $sql=mysqli_query($koneksi,"Select * from tbl_produk where id_produk ='$id_produk'");
		while ($tam = mysqli_fetch_assoc($sql)){ 
		$subharga=$tam['harga_produk']*$jumlah;
		?>
		
		<tr>
			<td><?php echo $nomor;  ?></td>
			<td><?php echo $tam['nama_produk'];  ?></td>
			<td>Rp.<?php echo number_format($tam['harga_produk']);  ?></td>
			<td> <a href="?page=keranjang&op=kurang&id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs"> - <?php echo $jumlah;?><a href="?page=keranjang&op=tambah&id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs"> + </button></td>
			<td>Rp.<?php echo number_format($subharga);  ?></td>
			<td><a href="?page=keranjang&op=hapus&id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</td>
			</tr>
		<?php $nomor++  ?>
		<?php } }  ?>
		</tbody>
	</table>
	<a href="?page=belanja" class="btn btn-default">Lanjutkan Belanja</a>
	<a href="?page=keranjang&op=checkout" class="btn btn-primary">Checkout</a>
	
	</section>
	</body>
</html>
 