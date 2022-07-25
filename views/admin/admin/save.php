<?php
$op = $_POST['op'];
$id_admin=$_POST['id_admin'];
$nama=$_POST['nama'];
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
		$query = mysqli_query($koneksi, "SELECT max(id_admin) as kodeTerbesar FROM tbl_admin");
$data = mysqli_fetch_array($query);
$kodeadm = $data['kodeTerbesar'];
$urutan = (int) substr($kodeadm, 3, 3);
$urutan++;
$huruf = "ADM";
$idadm = $huruf . sprintf("%03s", $urutan);

		$sql = mysqli_query($koneksi,"INSERT INTO tbl_admin
	(id_admin,nama,foto,username,password) 
VALUES ('$idadm','$nama','$nama_file_simpan','$username','$password')");
	}
	else{
		$sql = mysqli_query($koneksi,"UPDATE tbl_admin SET 
			nama='$nama',
			foto='$nama_file_simpan',
			username='$username',
			password='$password'
			WHERE id_admin='$id_admin'");
	}
	
	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=admin&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>