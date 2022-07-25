<?php
	$id_produk = $_GET['id_produk'];
	$sql = mysqli_query($koneksi,"DELETE FROM tbl_produk WHERE id_produk ='$id_produk'");

	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=produk&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>