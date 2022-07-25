<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="progta";
$koneksi=mysqli_connect($host,$user,$password);
mysqli_select_db($koneksi,$db);
$id_produk=$_GET['id'];
?>
<html>
	<head>
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/bootstrap/css/style.css" rel="stylesheet">
	<script language="JavaScript" src="assets/bootstrap/js/jquery.min.js"></script>
	</head>
	<body>
		<section class="konten">
	<div class="alert alert-warning">PRODUK</div>
				<div class="row"  >
				
				<?php $sql=mysqli_query($koneksi,"Select * from tbl_produk where id_produk='$id_produk'");?>
				<?php while ($tampil = mysqli_fetch_assoc($sql)) {?>
				<div class="col-md-5">
				<div class="thumbnail">
						<img src="../../uploads/<?php echo $tampil['foto']; ?>" >
						<div class="caption">
								
								<h3><?php echo $tampil['nama_produk']?></h3>
								<h5><strike> Rp.<?php $hasil = $tampil['harga_produk']*1.2; echo $hasil ?> </strike ></h5>
								<h4>Rp.<?php echo $tampil['harga_produk'];?></h4>
								<?php  $kategori=$tampil['kategori'];?>
							</div><?php  echo $tampil['deskripsi']; ?><br><b>Stok Produk:<?php  echo $tampil['stok']; ?></b>
							</div>
				</div>	
				<?php } ?>
				<?php $sql=mysqli_query($koneksi,"select nama_pelanggan,foto,komentar from tbl_pelanggan inner join tbl_komentar where tbl_pelanggan.id_pelanggan=tbl_komentar.id_pelanggan and tbl_komentar.id_produk='$id_produk'");?>
					
					<?php if(!$sql){
						echo "Komentar Kosong";
					}else{

					echo"<b><h3 class='panel-title' style='text-align:left'>Komentar Produk</h3></b><br>"; while ($tampil = mysqli_fetch_assoc($sql)) {?>
					<div class="col-md-5">
								<div class="caption">	
									<h6><img src="../../uploads/<?php echo $tampil['foto']; ?>"  width="40px" height="40px" class='img-circle'><?php echo " <B> ",$tampil['nama_pelanggan']," : </B>",$tampil['komentar'];?></h6>
								</div>
							
					</div>	<?php }}?>
					<form  method="POST">
					<table>
					<td>Komentari <input type='text' name='komentar'> </td>
					<td> <button  name='kirim' class="btn btn-default btn-xs"> Kirim </button></td>
					</table>
					</form>
					<?php $komentar=$_POST['komentar'];
	if(isset($_POST['kirim'])){
	$user=$_SESSION['ses_username'];
	$sql=mysqli_query("Select * from tbl_pelanggan where username='$user'");
	 while ($tamp = mysqli_fetch_assoc($sql)) {
		 $id_pelanggan=$tamp['id_pelanggan'];}
		 $sql = mysqli_query("INSERT INTO tbl_komentar
	(id_pelanggan,id_produk,komentar) 
VALUES ('$id_pelanggan','$id_produk','$komentar')");
echo "<script>alert('Komentar anda telah di kirim')</script>";
	echo "<script>location='?page=belanja&op=detail&id=$id_produk'</script>";
	
	}
	?>
					
				</div>
				</section><?php $poin=$_GET['total'];?>
				<p><a href="?page=point&op=belanja&total=<?php  echo $poin; ?>" class="btn btn-default btn-sm">Kembali</a></p>
	</body>
</html>