<?php
include "../koneksi.php";
$op = $_POST['op'];
$id_kota=$_POST['id_kota'];
$nama=$_POST['nama']; 



	if(empty($op)){
		$query = mysqli_query($koneksi, "SELECT max(id_kota) as kodeTerbesar FROM tbl_kota");
$data = mysqli_fetch_array($query);
$kodekt = $data['kodeTerbesar'];
$urutan = (int) substr($kodekt, 3, 3);
$urutan++;
$huruf = "KOT";
$idkt = $huruf . sprintf("%03s", $urutan);
		$sql = mysqli_query($koneksi,"INSERT INTO tbl_kota
	(id_kota, kota) 
VALUES ('$idkt','$nama')");
	}
	else{
		$sql = mysqli_query($koneksi,"UPDATE tbl_kota SET 
			kota='$nama'
			WHERE id_kota='$id_kota'");
	}

	
	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=kota&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	} 
?>