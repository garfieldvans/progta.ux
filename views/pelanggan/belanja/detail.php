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
			<div class="col-md-8">
				<form method="GET" >
					<input type="hidden" name="page" value="belanja">
                	<input type="hidden" name="op" value="list">
                	<input type="text" name="q" value="<?php  error_reporting(0);echo $_GET['q']; ?>" class="form-control col-lg-8" placeholder="Cari Nama Produk "  ><br>
                </form>
                <ul id="iconizr" style="float:right">
				</ul>
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
								<?php } ?>
							</select>
						</div>
					</div>
				</form>	<div class="alert alert-warning"><b>PRODUK</b></div>
				<div class="row"  >
					<?php $sql=mysqli_query($koneksi, "Select * from tbl_produk where id_produk='$id_produk'");?>
					<?php while ($tampil = mysqli_fetch_assoc($sql)) {?>
						<div class="col-sm-4">
							<div class="thumbnail">
								<img src="../../uploads/<?php echo $tampil['foto']; ?>" >
								<div class="caption">
									<h4><b><?php echo $tampil['nama_produk']?></b></h4>
										<h4><b>Rp.<?php echo $tampil['harga_produk'];?></b></h4>
									<?php  $kategori=$tampil['kategori'];?>
								</div><?php  echo $tampil['deskripsi']; ?><br><b>Stok Produk:<?php  echo $tampil['stok']; ?></b>
							</div>
						</div>	
					<?php } ?>
					<?php $sql=mysqli_query($koneksi, "select nama_pelanggan,foto,komentar from tbl_pelanggan inner join tbl_komentar where tbl_pelanggan.id_pelanggan=tbl_komentar.id_pelanggan and tbl_komentar.id_produk='$id_produk'");?>
					

					<?php if(!$sql){
						echo "Komentar Masih Kosong";
					}else{
						echo"<h3 class='panel-title' style='text-align:left'><b>Komentar Produk</b></h3><br>"; while ($tampil = mysqli_fetch_assoc($sql)) {?>

							<div class="col-sm-5">
								<div class="caption">
									<h6><img src="../../uploads/<?php echo $tampil['foto']; ?>"  width="25px" height="25px" class='img-circle'><?php echo " <B> ",$tampil['nama_pelanggan']," : </B>",$tampil['komentar'];?></h6>
								</div>
							</div>	<?php }}?>
						<form  method="POST" class="">
								<table>
									<th>Komentari <input type='text' name='komentar' class="form-control"> </th>
									<?php
									if(empty($op)){
										$query = mysqli_query($koneksi, "SELECT max(id_komentar) as kodeTerbesar FROM tbl_komentar");
										$data = mysqli_fetch_array($query);
										$kodekm = $data['kodeTerbesar'];
										$urutan = (int) substr($kodekm, 3, 3);
										$urutan++;
										$huruf = "CMT";
										$idkm = $huruf . sprintf("%03s", $urutan);} ?>

									<th><br><button  name='kirim' class="btn btn-primary"> Kirim </button></th>
								</table>
							</form>

							<?php 
							$komentar=$_POST['komentar'];
							if(isset($_POST['kirim'])){
								$user=$_SESSION['ses_username'];
								$sql=mysqli_query($koneksi,"Select * from tbl_pelanggan where username='$user'");
								while ($tamp = mysqli_fetch_assoc($sql)) {
									$id_pelanggan=$tamp['id_pelanggan'];}
									$sql = mysqli_query($koneksi, "INSERT INTO tbl_komentar
										(id_komentar,id_pelanggan,id_produk,komentar) 
										VALUES ('$idkm','$id_pelanggan','$id_produk','$komentar')");
									echo "<script>alert('Komentar anda telah di kirim')</script>";
									echo "<script>location='?page=belanja&op=detail&id=$id_produk'</script>";
								}  ?>
			</div>
		</section>
		<p><a href="?page=belanja" class="btn btn-default btn-sm">Kembali</a></p>

		<section class="konten">
				<h1><B>Produk Terkait</B></h1>
					<div class="row"  >
						<?php $sql=mysqli_query($koneksi,"Select * from tbl_produk where kategori='$kategori' ");
							while ($tampil = mysqli_fetch_assoc($sql)) {?>
								<div class="col-md-3">
									<div class="thumbnail">
										<img src="../../uploads/<?php echo $tampil['foto']; ?>" >
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
			
	</section>
	</body>
</html>