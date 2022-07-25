<?php
	session_start();
	include "conf/db.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	$sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
	$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE username='$username' AND password='$password'");
	$cek1 = mysqli_num_rows($sql1);
	$cek2 = mysqli_num_rows($sql2);
	if($cek1!=0){
		$cek_id = mysqli_fetch_array($sql1);
		$_SESSION["ses_id"]=$cek_id["id_admin"];
		$_SESSION["ses_username"]=$username;
		$_SESSION["ses_password"]=$password;
		
		echo "<center class='teks'><img src='assets/images/load.gif' width='500px' height='50px'/></center>";
		print"<html><head><meta http-equiv='refresh' content='0.8;URL=views/admin/index.php'></meta></head></html>";
	}elseif ($cek2!=0) {
		$cek_id = mysqli_fetch_array($sql2);
		$_SESSION["ses_id"]=$cek_id["id_pelanggan"];
		$_SESSION["ses_username"]=$username;
		$_SESSION["ses_password"]=$password;
		echo "<center class='teks'><img src='assets/images/load.gif' width='500px' height='50px'/></center>";
		print"<html><head><meta http-equiv='refresh' content='0.8;URL=views/pelanggan/index.php'></meta></head></html>";
	}
	else{
		?>
			<script type="text/javascript">alert("password salah");</script>
		<?php
		echo "<center class='teks'>Mohon Tunggu....</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=login'></meta></head></html>";
	}
?>