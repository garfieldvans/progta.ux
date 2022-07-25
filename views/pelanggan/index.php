<?php
	error_reporting(1);
	include "../../conf/cek.php";
	include "../../conf/db.php";
	date_default_timezone_set("Asia/Jakarta");
	$username=$_SESSION['ses_username'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Selamat Datang Pelanggan Kami </title>
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
			$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE username='$username'");
			while ($tampil = mysqli_fetch_assoc($sql)) {
				$foto=$tampil['foto'];
				$nama=$tampil['nama_pelanggan'];
			}
			?>
				<div class="row">
					<div class="col-sm-12">
						<div class="brand-2">
							<span class="h5"><i><b>Monjali Pesthop</b></i><div style='text-align:right'><i> Hi, <?php echo $nama;?></i></div></span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-2">
					<ul class="nav nav-pills nav-stacked">
						<div  style='text-align:center'><img src="../../uploads/<?php echo $foto ?>" width="100px"height="100px" class='img-circle'><?php echo '</br>',$nama,'</br>';?><br></div>
						<li class="<?php if($_GET['page']==""){echo "active";} ?>"><a href="index.php">Home</a></li>
						<li class="<?php if($_GET['page']=="belanja"){echo "active";} ?>"><a href="?page=belanja">Belanja</a></li>
						<li class="<?php if($_GET['page']=="point"){echo "active";} ?>"><a href="?page=point">Cek Point</a></li>
						<li class="<?php if($_GET['page']=="keranjang"){echo "active";} ?>"><a href="?page=keranjang">Keranjang</a></li>
						<li class="<?php if($_GET['page']=="riwayat"){echo "active";} ?>"><a href="?page=riwayat">Riwayat Belanja</a></li>
						<li class="<?php if($_GET['page']=="logout"){echo "active";} ?>"><a href="?page=logout">Logout</a></li>
					</ul>
				</div>
				<div class="col-sm-10">
					<div class="panel panel-success">
						<div class="panel-heading"> <?php echo $_GET['page'];?></div><br>
		

						
						
						<div class="panel-body">
						

							<?php
								switch ($_GET['page']){
									case 'belanja': include"belanja/index.php"; break;
									case 'point': include"point/index.php"; break;
									case 'keranjang': include"keranjang/index.php"; break;
									case 'riwayat': include"riwayat/index.php"; break;
									case 'setakun': include"setakun/index.php"; break;
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
