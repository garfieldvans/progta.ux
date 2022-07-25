<?php
	error_reporting(1);
	session_start();
	include "../../../koneksi.php";

?>
<section class="konten">
<div class="container">
<div class="col-md-9">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000"  >
	<div class="carousel-inner">
		<?php
		    $n=0;
			 @$kategori=$_POST['kategori'];
				if(!$kategori){
				$query="Select * from tbl_produk";
				$sql=mysqli_query(@$koneksi, $query);}
				else{
				$sql=mysqli_query($koneksi,"Select * from tbl_produk where kategori='$kategori' and stok>5");}?>
			<?php while ($tampil = mysqli_fetch_assoc($sql)) {
				$n++;
				?>
					<div class="item <?php if($n==1){echo "active";} ?>" >
						<img height="150px" width="150px"  data-src="First slide" src="uploads/<?php echo $tampil['foto']; ?>">
						<div class="carousel-caption">
				            <h4><b>NEW ITEMS !!!</b></h4>
				            <h2><?php echo $tampil['nama_produk']; ?></h2>
				          </div>
					</div>
				<?php
			}
		?>
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
</div><div  style='text-align:center'>
<h2><i><b>Monjali Petshop</b></i></h2>
<h4><i>Belanja Aman & Cepat </i></h4>
</div>
</div>
</section>
<?php
session_start();
$koneksi=mysqli_connect("localhost","root","","progta");
if(mysqli_connect_error()){
	echo"koneksi Gagal".mysqli_connect_error();
	
}
?>
<html>
	<head>
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/bootstrap/css/style.css" rel="stylesheet">
	<script language="JavaScript" src="assets/bootstrap/js/jquery.min.js"></script>
	</head>
	<body>
		<section class="konten">
			<div class="container">
				<h1><i><b><p class="text-left"><span class="label label-info"><?php  @$kategori=$_POST['kategori'];
				if(!$kategori){ echo "Produk ";}
				else{echo $kategori;}?></span></p></b></i></h1>
				<div class="row"  >
				
				<?php  @$kategori=$_POST['kategori'];
				if(!$kategori){
				$sql=mysqli_query($koneksi,"Select * from tbl_produk  ");}
				else{
				$sql=mysqli_query($konten,"Select * from tbl_produk where kategori='$kategori' and stok>5");}?>
				<?php while ($tampil = mysqli_fetch_assoc($sql)) {?>
				<div class="col-md-3">
				<div class="thumbnail">
						<img src="uploads/<?php echo $tampil['foto']; ?>" >
						<div class="caption">
								
								<h4><?php echo $tampil['nama_produk']?></h4>
								<h5><strike> Rp.<?php $hasil = $tampil['harga_produk']*1.2; echo $hasil ?> </strike ></h5>
								<h4>Rp.<?php echo $tampil['harga_produk'];?></h4>
								<form method="POST"><button class="btn btn-primary" name="beli">Beli</button><?php
	if(isset($_POST['beli'])){
		
		echo "<script>alert('Anda Harus Login Dulu ')</script>";
		echo "<script>location='?page=login'</script>";
	}?>
								<a href="?page=belanja&op=detail&id=<?php echo $tampil['id_produk'];?>" class="btn btn-default">Detail</a></form>
							</div>
							</div>
				</div>	
				<?php } ?>
				
				
				
			
				
				</div>
				</div>
				</section>
	</body>
</html>