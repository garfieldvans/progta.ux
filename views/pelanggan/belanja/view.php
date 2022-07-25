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
			<div class="col-md-8">
				<form method="GET" >
                	<input type="hidden" name="page" value="belanja">
                	<input type="hidden" name="op" value="list">
                	<input type="text" name="q" value="<?php  error_reporting(0);echo $_GET['q']; ?>" class="form-control col-lg-8" placeholder="Cari Nama Produk "  ><br>
                </form>
                <ul id="iconizr" style="float:right"></ul>
            </div>
            <form method="POST" action="?page=belanja">
            	<div class="row">
            		<div class="col-md-3">
            			<select class="form-control" name="kategori" onchange="this.form.submit();">
            				<option disabled selected>Kategori</option>
            				<?php 
            				$sql=mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
            				while ($data=mysqli_fetch_array($sql)) {
            					?>
            					<option value="<?=$data['kategori']?>"><?=$data['kategori']?></option> 
		<?php
		}
		?>
		</select>
		
		</div>
		</div>
	</form>	
		
		
				<h1><B><?php  $kategori=$_POST['kategori'];
				if(!$kategori){ echo "Produk";}
				else{echo $kategori;}
				?></B></h1>
				<div class="row"  >
				<?php  $kategori=$_POST['kategori'];
				if(!$kategori){
				$sql=mysqli_query($koneksi, "Select * from tbl_produk  ");}
				else{
				$sql=mysqli_query($koneksi, "Select * from tbl_produk where kategori='$kategori' and stok>5");}?>
				<?php while ($tampil = mysqli_fetch_assoc($sql)) {?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="../../uploads/<?php echo $tampil['foto']; ?>" >
						<div class="caption">
							<h4><?php echo $tampil['nama_produk']?></h4>
							<h4>Rp.<?php echo $tampil['harga_produk'];?></h4>
							<a href="?page=belanja&op=beli&id=<?php echo $tampil['id_produk'];?>" class="btn btn-primary">Beli</a>
							<a href="?page=belanja&op=detail&id=<?php echo $tampil['id_produk'];?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>	
				<?php } ?>
				</div>
				</section>
	</body>
</html>