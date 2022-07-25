<?php
	$id_admin = $_GET['id_admin'];
	$sql = mysqli_query($koneksi,"DELETE FROM tbl_admin WHERE id_admin ='$id_admin'");

	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=admin&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>