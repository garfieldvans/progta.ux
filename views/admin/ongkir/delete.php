<?php
	$id_ongkir = $_GET['id_ongkir'];
	$sql = mysqli_query("DELETE FROM tbl_ongkir WHERE id_ongkir ='$id_ongkir'");

	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=ongkir&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>