<?php
include "koneksi.php";

$idplg=$_POST['id_pelanggan'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];
$username=$_POST['username'];
$password=$_POST['password'];
$file_name=$_FILES['foto']['name'];
		$nama_file_simpan=$file_name;
		
		$size=$_FILES['foto']['size'];
		
		$file_type=$_FILES['foto']['type'];
		
		$source=$_FILES['foto']['tmp_name'];
		
		$direktori="../../../uploads/";
		
		$file_name=$direktori.$file_name;
		
		move_uploaded_file($source,$file_name);


	
		

		$sql = mysqli_query($koneksi,"INSERT INTO tbl_pelanggan
	(id_pelanggan,nama_pelanggan,jenis_kelamin,alamat,telepon,foto,username,password) 
VALUES ('$idplg','$nama','$jenis','$alamat','$telepon','$nama_file_simpan','$username','$password')");
	
	if(!$sql){
		echo"Data tidak boleh kosong";
	}
	else{
		
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=../../../index.php?page=daftar'></meta></head></html>";
  	}
?>