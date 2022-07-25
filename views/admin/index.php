<?php
	error_reporting(1);
	include "../../conf/cek.php";
	include "../../conf/db.php";
	date_default_timezone_set("Asia/Jakarta");
	$username=$_SESSION['ses_username'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Selamat Datang Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="../../assets/bootstrap/css/style.css" rel="stylesheet">
		<script language="JavaScript" src="../../assets/bootstrap/js/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="top">
			<?php   
			$sql = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE username='$username'");
			while ($tampil = mysqli_fetch_assoc($sql)) {
				$foto=$tampil['foto'];
				$nama=$tampil['nama'];}
			?>
				<div class="row">
					<div class="col-sm-12">
						<div class="brand-2">
							<span class="h5"><i><b>Monjali Petshop</b></i><div style='text-align:right'><i>Hi, <?php echo $nama; ?></i></div></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="nav nav-pills nav-stacked">
					<div  style='text-align:center'><img src="../../uploads/<?php echo $foto ?>" width="100px"height="100px" class='img-circle'><?php echo '</br>',$nama,'</br>';?><br></div>
						<li class="<?php if($_GET['page']==""){echo "active";} ?>"><a href="index.php">Home</a></li>
						<li class="<?php if($_GET['page']=="admin"){echo "active";} ?>"><a href="?page=admin">Data Admin</a></li>
						<li class="<?php if($_GET['page']=="produk"){echo "active";} ?>"><a href="?page=produk"> Data Produk </a></li>
						<li class="<?php if($_GET['page']=="pelanggan"){echo "active";} ?>"><a href="?page=pelanggan">Data Pelanggan</a></li>
						<li class="<?php if($_GET['page']=="kota"){echo "active";} ?>"><a href="?page=kota">Data Kota</a></li>
						<li class="<?php if($_GET['page']=="ongkir"){echo "active";} ?>"><a href="?page=ongkir">Data Ongkir</a></li>
						<li class="<?php if($_GET['page']=="pembelian"){echo "active";} ?>"><a href="?page=pembelian">Data Pemesanan</a></li>
						<li class="<?php if($_GET['page']=="logout"){echo "active";} ?>"><a href="?page=logout">Logout</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="panel panel-success">
						<div class="panel-heading"><?php echo $_GET['page'];?></div>
						<div class="panel-body">
							<?php
								switch ($_GET['page']){
									case 'admin': include"admin/index.php"; break;
									case 'produk': include"produk/index.php"; break;
									case 'pelanggan': include"pelanggan/index.php"; break;
									case 'kota': include"kota/index.php"; break;
									case 'ongkir': include"ongkir/index.php"; break;
									case 'pembelian': include"pembelian/index.php"; break;
									case 'pengaturan': include"pengaturan/index.php"; break;
									case 'logout': include"../../views/logout.php"; break;
									default: include"home/index.php"; 	break;
								}
							?>
						</div>
					</div>
				</div>
			</div>
				<div class="row">
				<div class="col-sm-12">
			<div class="boottom">
					<b>LOVE YOUR PETS</b>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>
