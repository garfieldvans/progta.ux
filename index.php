<?php
	error_reporting(0);
	session_start();
	include "conf/db.php";

?>			
<!DOCTYPE html>
<html>
	<head>
		<title>Monjali Petshop</title>
		<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="assets/bootstrap/css/style.css" rel="stylesheet">
		<script language="JavaScript" src="assets/bootstrap/js/jquery.min.js"></script>
		<script src="assets/jquery-ui/js/jquery-1.10.2.js"></script>
		<script src="assets/jquery-ui/1103/jquery-ui.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body >
        <div class="navbar navbar-inverse navbar-static-top">
			<div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
				</div>
		 </div>
<div class="navbar-collapse collapse navbar-inverse-collapse">
<div class="container"><div class=""><h1 align="center"><B></B></h1></div>
			<div class="col-md-9">
				<form method="GET" >
                	<input type="hidden" name="page" value="home">
                	<input type="hidden" name="op" value="list">
                  <input type="text" name="q" value="<?php  error_reporting(0);echo $_GET['q']; ?>" class="form-control col-lg-8" placeholder="Cari Nama Produk "  ><br>
                </form>
				<ul id="iconizr" style="float:right">
				</ul>
</div><form method="POST" action="?page=home">
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
    <ul class="nav navbar-nav  navbar-right">
    <li class="<?php if($_GET['page']=="home"){echo "active";} ?>"><a href="?page=home">Home</a></li>    
	<li class="<?php if($_GET['page']=="daftar"){echo "active";} ?>"><a href="?page=daftar">Daftar</a></li>	
	<li class="<?php if($_GET['page']=="login"){echo "active";} ?>"><a href="?page=login">Login</a></li>
                </ul><br>
		
              </div>				
            </div>
        </div>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<?php
						switch ($_GET['page']){
							case 'login': include"views/publik/login/index.php"; break;
							case 'daftar': include"views/publik/daftar/index.php"; break;
							case 'login_proses': include"views/login_proses.php"; break;
							default: include"views/publik/home/index.php"; 	break;}
					?>
				</div>
			</div>
			</div>
		<div class="bottom">
	</body>
    </html>

