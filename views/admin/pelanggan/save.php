<?php
$op = $_POST['op'];
$id_pelanggan=$_POST['id_pelanggan'];
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
		
		$direktori="../../uploads/";
		
		$file_name=$direktori.$file_name;
		
		move_uploaded_file($source,$file_name);

	if(empty($op)){
		$query = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar FROM tbl_pelanggan");
$data = mysqli_fetch_array($query);
$kodepr = $data['kodeTerbesar'];
$urutan = (int) substr($kodepr, 3, 3);
$urutan++;
$huruf = "PLG";
$idplg = $huruf . sprintf("%03s", $urutan);

		$sql = mysqli_query($koneksi,"INSERT INTO tbl_pelanggan
	(id_pelanggan,nama_pelanggan,jenis_kelamin,alamat,telepon,foto,username,password) 
VALUES ('$idplg','$nama','$jenis','$alamat','$telepon','$nama_file_simpan','$username','$password')");
	}
	else{
		$sql = mysqli_query($koneksi,"UPDATE tbl_pelanggan SET 
			nama_pelanggan='$nama',
			jenis_kelamin='$jenis',
			alamat='$alamat',
			telepon='$telepon',
			foto='$nama_file_simpan',
			username='$username',
			password='$password'
			WHERE id_pelanggan='$id_pelanggan'");
	}
	
	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=pelanggan&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>