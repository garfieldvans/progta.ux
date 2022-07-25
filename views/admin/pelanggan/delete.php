<?php
	$id_pelanggan = $_GET['id_pelanggan'];
	$sql = mysqli_query($koneksi,"DELETE FROM tbl_pelanggan WHERE id_pelanggan ='$id_pelanggan'");

	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=pelanggan&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>