<?php
include '../koneksi.php';
	$id_kota = $_GET['id_kota'];
	$sql = mysqli_query($koneksi,"DELETE FROM tbl_kota WHERE id_kota ='$id_kota'");

	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=kota&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>