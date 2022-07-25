<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="progta";
$koneksi=mysqli_connect($host,$user,$password);
mysqli_select_db($koneksi,$db);
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
				<?php  
				$poin=$_GET['total'];
				$poinku=$poin*1000;
				$tukar=$poinku-30000;	
				if($poin>=200){
				$sql=mysqli_query($koneksi,"Select * from tbl_produk where harga_produk<='$tukar'");?>
				<?php while ($tampil = mysqli_fetch_assoc($sql)) {?>
				<div class="col-md-3">
				<div class="thumbnail">
						<img src="../../uploads/<?php echo $tampil['foto']; ?>" >
						<div class="caption">
								
								<i><h3><?php echo $tampil['nama_produk']?></h3></i>
								<b><h5><?php echo $tampil['harga_produk']/1000;echo"-"; echo ($tampil['harga_produk']/1000)+30;    ?> Poin</h5></b>
								<a href="?page=point&op=beli&id=<?php echo $tampil['id_produk'];?>&poin=<?php echo $poin ;?>" class="btn btn-primary ">Beli</a>
								<a href="?page=point&op=detail&id=<?php echo $tampil['id_produk'];?>&total=<?php echo $poin; ?>" class="btn btn-default">Detail</a>
							</div>
							</div>
				</div>	
				
				<?php }} else{?>
				
				
			<div  style='text-align:center'>
				<?php 
					 echo "<h1><b><i>Maaf</i></b></h1>";
					  echo "<h2><b><i>Poin Anda Belum Cukup </i></b></h2>";
					   echo "<h2><b><i> Untuk Di Tukar</i></b></h2>";
					   echo "<br><br><br><br><br><br><br>
				 <a href='?page=point'  class='btn btn-primary '>Kembali</a>";}
				 ?> 
				</div>
				</div>
				
				</section>
	</body>
</html>