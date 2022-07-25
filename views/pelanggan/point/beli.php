<?php
	error_reporting(0);
	session_start();
	include "conf/db.php";

?>
<html>
	<head>
	</head>
<body>
	<section class="konten">
	<h2><b><i>Penukaran Poin</i></b></h2>
	<hr>
	<table class="table tabel-bordered " >
		<tbody>
		<?php
		$id_produk=$_GET['id'];
		$poin=$_GET['poin'];
		$jumlah=1;
		?><h2><i>
		<?php $sql=mysqli_query($koneksi,"Select * from tbl_produk where id_produk ='$id_produk'");
		while ($tam = mysqli_fetch_assoc($sql)){ 
			$harga_produk=$tam['harga_produk'];
			echo $tam['nama_produk'];  
			 echo $jumlah;  ?>
			<img src="../../uploads/<?php echo $tam['foto']; ?>"  width="200px" height="200px">
		<?php }   ?></i></h1>
		</tbody>
	</table>
	<form method="POST">
		<div class="row">
		<div class="col-md-4"><input type="text" readonly value="<?php 
		
		$user=$_SESSION['ses_username'];
		$sql=mysqli_query("Select * from tbl_pelanggan where username='$user'");
		while ($tamp = mysqli_fetch_assoc($sql)) {
		 $id_pelanggan=$tamp['id_pelanggan'];
		 $nama=$tamp['nama_pelanggan'];
		 }
		
		echo $nama ?>"class="form-control"></div>
		
		<div class="col-md-4">
		<select class="form-control" name="id_ongkir">
		<option>Pilih Ongkos Kirim</option>
		<?php
		$sql=mysqli_query("Select * from tbl_ongkir");?>
		<?php while ($tamp = mysqli_fetch_assoc($sql)) {?>
		<option value="<?php echo $tamp['id_ongkir'];?>">
		<?php echo $tamp['nama_kota'];?>----Rp.
		<?php echo number_format($tamp['tarif']);?>
		</option>
		<?php }?>
		</select>
		</div>
		</div>
		<br>
		
		
		<button class="btn btn-primary" name="tukar">Tukarkan</button>
	</form>
	<?php
	if(isset($_POST['tukar'])){
	$id_ongkir=$_POST['id_ongkir'];
	$tanggal_pembelian=date("Y-m-d");
	
	$sql=mysqli_query("Select * from tbl_ongkir where id_ongkir='$id_ongkir'");
	 while ($di = mysqli_fetch_assoc($sql)) {
		 $tarif=$di['tarif'];}
		 if($tarif==0){
			echo "<script>alert('Isikan Ongkir Anda  ')</script>"; 
		 }
		 else{
		 $total_pembelian=$harga_produk+$tarif;
	$tukar_poin=$total_pembelian/1000;
	$sql = mysqli_query("INSERT INTO tbl_pembeli
	(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian) 
VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");
	$id_pembelian_barusan=mysql_insert_id();
	 $sql = mysqli_query("INSERT INTO tbl_pembayaran
	(id_pembelian,nama,bank,jumlah,tanggal,bukti) 
VALUES ('$id_pembelian_barusan','$nama','Dengan Poin','$total_pembelian','$tanggal_pembelian','Dengan Poin')");
	 $sql=mysqli_query("INSERT INTO tbl_pembelian_produk(id_pembelian,id_produk,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','1')");
	 $sql=mysqli_query("UPDATE tbl_poin SET jumlah_poin=jumlah_poin-'$tukar_poin' where id_pelanggan='$id_pelanggan'");
	 $sql=mysqli_query("UPDATE tbl_pembeli SET status_pembelian='Sudah Dibayar' where id_pembelian='$id_pembelian_barusan'");
	 $sql= mysqli_query(" UPDATE tbl_produk set stok=stok-1 where id_produk='$id_produk'");
	 $sql=mysqli_query("Select * from tbl_poin where id_pelanggan='$id_pelanggan'");
	 while ($di = mysqli_fetch_assoc($sql)) {
			$sisapoin=$di['jumlah_poin'];
	 }
	echo "<script>alert('Terimakasih Poin Anda telah Ditukar Sisa Poin Anda Saat ini $sisapoin ')</script>";
	echo "<script>location='?page=point'</script>";
	}}
	?>
	</section>
	
	</body>
</html>
 