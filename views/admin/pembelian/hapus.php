<?php
	$id_pembelian = $_GET['id'];
	$sql = mysqli_query($koneksi,"DELETE FROM tbl_pembeli WHERE id_pembelian ='$id_pembelian'");

	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=pembelian'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>