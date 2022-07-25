<?php
	error_reporting(0);
	session_start();
	include "conf/db.php";

?>
<?php
	$pass_lama = $_POST['pass_lama'];
	$pass_baru = $_POST['pass_baru'];
	$ulang_pass_baru = $_POST['ulang_pass_baru'];

	$cek_user = $_SESSION["ses_username"];
	$cek_pass = $_SESSION["ses_password"];
	$cek_lev = $_SESSION["ses_level"];
	
	/*if(empty($op)){
		$sql = mysql_query("INSERT INTO tbl_dosen (id_dosen, nama_dosen) VALUES ('$id_dosen','$nama_dosen')");
	}
	else{
		$sql = mysql_query("UPDATE tbl_dosen SET nama_dosen='$nama_dosen' WHERE id_dosen='$id_dosen'");
	}*/


	if($pass_lama=="" || $pass_baru=="" || $ulang_pass_baru==""){
		$_SESSION["salah"]="<div class='alert alert-dismissable alert-danger'>
		  <button type='button' class='close' data-dismiss='alert'>×</button>
		  <strong>Isian Tidak Boleh Kosong</strong> 
		</div>";
	}
	else if($cek_pass!=$pass_lama){
		$_SESSION["salah"]="<div class='alert alert-dismissable alert-danger'>
		  <button type='button' class='close' data-dismiss='alert'>×</button>
		  <strong>password lama salah</strong> 
		</div>";
	}
	else if($pass_baru!=$ulang_pass_baru){
		$_SESSION["salah"]="<div class='alert alert-dismissable alert-danger'>
		  <button type='button' class='close' data-dismiss='alert'>×</button>
		  <strong>password baru tidak sama</strong> 
		</div>";
	}
	else{
		$sql = mysqli_query($koneksi,"UPDATE tbl_pelanggan SET password='$ulang_pass_baru' WHERE username='$cek_user'");
		$_SESSION["ses_password"]=$password;
		$_SESSION["salah"]="<div class='alert alert-dismissable alert-danger'>
		  <button type='button' class='close' data-dismiss='alert'>×</button>
		  <strong>Ganti Password Berhasil</strong> 
		</div>";
	}
	echo "<center class='teks'>loading...</center>";
	print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=gantipass'></meta></head></html>";
?>