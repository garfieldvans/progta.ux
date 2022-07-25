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
	<table class="table tabel-bordered " >
	<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub Harga</th>
		</tr>
		</thead>
		<tbody>
		<?php $nomor=1;?>
		<?php $totalbelanja=0; ?>
		<?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah){ ?>
		<?php $sql=mysqli_query($koneksi,"Select * from tbl_produk where id_produk ='$id_produk'");
		while ($tam = mysqli_fetch_assoc($sql)){ 
		$subharga=$tam['harga_produk']*$jumlah;
		?>
		
		<tr>
			<td><?php echo $nomor;  ?></td>
			<td><?php echo $tam['nama_produk'];  ?></td>
			<td>Rp.<?php echo number_format($tam['harga_produk']);  ?></td>
			<td><?php echo $jumlah;  ?></td>
			<td>Rp.<?php echo number_format($subharga);  ?></td>
			</tr>
		<?php $nomor++  ?>
		<?php $totalbelanja+=$subharga?>
		<?php } }  ?>
		</tbody>
		<tfoot>
		<tr>
		<td colspan="4">Total Belanja</td>
		<td>Rp.<?php echo  number_format($totalbelanja)?></td>
		</tr>
		</tfoot>
	</table>
	<form method="POST">
		<div class="row">
		<div class="col-md-4"><input type="text" readonly value="<?php 
		
		$user=$_SESSION['ses_username'];
		$sql=mysqli_query($koneksi,"Select * from tbl_pelanggan where username='$user'");
		while ($tamp = mysqli_fetch_assoc($sql)) {
		 $id_pelanggan=$tamp['id_pelanggan'];
		 $nama=$tamp['nama_pelanggan'];
		 }
		
		echo $nama ?>"class="form-control"></div>
		<div class="col-md-4"><input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap"></div>
		<div class="col-md-4"><input type="text" name="kdpos" class="form-control" placeholder="Kode Pos"></div>
		
		<div class="col-md-4"><br>
		<select class="form-control" name="id_ongkir">
		<option disabled selected>Pilih Ongkos Kirim</option>
		<?php
		$sql=mysqli_query($koneksi,"Select * from tbl_ongkir, tbl_kota where tbl_ongkir.id_kota = tbl_kota.id_kota");?>
		<?php while ($tamp = mysqli_fetch_assoc($sql)) {?>
		<option value="<?php echo $tamp['id_ongkir'];?>">
		<?php echo $tamp['kota'];?>--Rp.
		<?php echo number_format($tamp['tarif']);?>
		</option>
		<?php }?>
		</select>
		</div>
		</div>
		<br>	
		<button class="btn btn-primary" name="checkout">Checkout</button>
	</form>
	<?php
	if(isset($_POST['checkout'])){
		$query = mysqli_query($koneksi, "SELECT max(id_pembelian) as kodeTerbesar FROM tbl_pembeli");
$data = mysqli_fetch_array($query);
$kodeord = $data['kodeTerbesar'];
$urutan = (int) substr($kodeord, 3, 3);
$urutan++;
$huruf = "ORD";
$idord = $huruf . sprintf("%03s", $urutan);
	
	$id_ongkir=$_POST['id_ongkir'];
	$alamat=$_POST['alamat'];
	$kdpos=$_POST['kdpos'];
	$tanggal_pembelian=date("Y-m-d");
	
	$sql=mysqli_query($koneksi,"Select * from tbl_ongkir where id_ongkir='$id_ongkir'");
	 while ($di = mysqli_fetch_assoc($sql)) {
		 $tarif=$di['tarif'];}
		 if($tarif==0){
			echo "<script>alert('Isikan Ongkir Anda  ')</script>"; 
		 }
		 else{
	$totalpembelian=$totalbelanja+$tarif;
	
	$sql = mysqli_query($koneksi,"INSERT INTO tbl_pembeli
	(id_pembelian,id_pelanggan,alamat,kd_pos,id_ongkir,id_produk,jumlah,tanggal_pembelian,total_pembelian) 
VALUES ('$idord','$id_pelanggan','$alamat','$kdpos','$id_ongkir','$id_produk','$jumlah','$tanggal_pembelian','$totalpembelian')");

			
			//$id_pembelian_barusan=mysqli_insert_id();
			//foreach($_SESSION['keranjang'] as $id_produk => $jumlah){
			//	$sql = mysqli_query($koneksi,"INSERT INTO tbl_pembeli
			//	(id_pembelian,id_produk,jumlah) 
			//	VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
				
				$sql= mysqli_query($koneksi," UPDATE tbl_produk set stok=stok-'$jumlah' where id_produk='$id_produk'");
			
		echo "<script>alert('Terimakasih  telah melakukan pembelian ,Lakukan Pembayaran agar pesanan anda dikirim .. ')</script>";
		echo "<script>location='?page=riwayat&op=riwayat'</script>";
		 unset($_SESSION['keranjang']);
		 }

	}
	?>
	</section>
	
	</body>
</html>
 