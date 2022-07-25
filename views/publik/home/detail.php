<div class="alert alert-warning">PRODUK</div>
<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="progta";
$koneksi=mysqli_connect($host,$user,$password);
mysqli_select_db($koneksi, $db);
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
				<div class="row"  >
					<?php $sql=mysqli_query($koneksi, "Select * from tbl_produk where id_produk='$id_produk'");?>
					<?php while ($tampil = mysqli_fetch_assoc($sql)) {?>
					<div class="col-md-5">
						<div class="thumbnail">
							<img src="uploads/<?php echo $tampil['foto']; ?>" >
								<div class="caption">	
									<h3><?php echo $tampil['nama_produk']?></h3>
									<h5><strike> Rp.<?php $hasil = $tampil['harga_produk']*1.2; echo $hasil ?> </strike ></h5>
									<h4>Rp.<?php echo $tampil['harga_produk'];?></h4>
								<?php  $kategori=$tampil['kategori'];?>
								</div><?php  echo $tampil['deskripsi']; ?><br><b>Stok Produk:<?php  echo $tampil['stok']; ?></b>
							</div>
					</div>	<?php }?>
					
					<?php $sql=mysqli_query($koneksi,"select nama_pelanggan,foto,komentar from tbl_pelanggan inner join tbl_komentar where tbl_pelanggan.id_pelanggan=tbl_komentar.id_pelanggan and tbl_komentar.id_produk='$id_produk'");?>
					
					<?php echo"<b><h3 class='panel-title' style='text-align:left'>Komentar Produk</h3></b><br>"; while ($tampil = mysqli_fetch_assoc($sql)) {?>
					<div class="col-md-5">
								<div class="caption">	
									<h6><img src="uploads/<?php echo $tampil['foto']; ?>"  width="40px" height="40px" class='img-circle'><?php echo " <B> ",$tampil['nama_pelanggan']," : </B>",$tampil['komentar'];?></h6>
								</div>
							
					</div>	<?php }?>
				</div>	
			</section>
<p><a href="?page=home" class="btn btn-default btn-sm">Kembali</a></p>
	<section class="konten">
			<div class="container">
				<h1><B>Produk Terkait</B></h1>
					<div class="row"  >
						<?php $sql=mysqli_query($koneksi,"Select * from tbl_produk where kategori='$kategori' ");
							while ($tampil = mysqli_fetch_assoc($sql)) {?>
								<div class="col-md-3">
									<div class="thumbnail">
										<img src="uploads/<?php echo $tampil['foto']; ?>" >
											<div class="caption">
												<h3><?php echo $tampil['nama_produk']?></h3>
												<h5><strike> Rp.<?php $hasil = $tampil['harga_produk']*1.2; echo $hasil ?> </strike ></h5>
												<h4>Rp.<?php echo $tampil['harga_produk'];?></h4>
												<form method="POST"><button class="btn btn-primary" name="beli">Beli</button>
												<?php if(isset($_POST['beli'])){
													echo "<script>alert('Anda Harus Login Dulu ')</script>";
													echo "<script>location='?page=login'</script>";
												}?>
												<a href="?page=belanja&op=detail&id=<?php echo $tampil['id_produk'];?>" class="btn btn-default">Detail</a></form>
											</div>
									</div>
								</div><?php } ?>
					</div>
			</div>
	</section>