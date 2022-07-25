<?php
include '../koneksi.php';
$op = $_POST['op'];
$id_ongkir=$_POST['id_ongkir'];
$nama=$_POST['nama'];
$tarif=$_POST['tarif'];
	if(empty($op)){
		$query = mysqli_query($koneksi, "SELECT max(id_ongkir) as kodeTerbesar FROM tbl_ongkir");
$data = mysqli_fetch_array($query);
$kodeokr = $data['kodeTerbesar'];
$urutan = (int) substr($kodeokr, 3, 3);
$urutan++;
$huruf = "OKR";
$idokr = $huruf . sprintf("%03s", $urutan);
		$sql = mysqli_query($koneksi,"INSERT INTO tbl_ongkir
	(id_ongkir,id_kota,tarif) 
VALUES ('$idokr','$nama','$tarif')");
	}
	else{
		$sql = mysqli_query($koneksi,"UPDATE tbl_ongkir SET 
			id_kota='$nama',
			tarif='$tarif'
			WHERE id_ongkir='$id_ongkir'");
	}
	
	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=ongkir&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>