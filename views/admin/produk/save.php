<?php
$op = $_POST['op'];
$id_produk=$_POST['id_produk'];
$kategori=$_POST['kategori'];
$stok=$_POST['stok'];
$deskripsi=$_POST['deskripsi'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];

		$file_name=$_FILES['foto']['name'];
		$nama_file_simpan=$file_name;
		
		$size=$_FILES['foto']['size'];
		
		$file_type=$_FILES['foto']['type'];
		
		$source=$_FILES['foto']['tmp_name'];
		
		$direktori="../../uploads/";
		
		$file_name=$direktori.$file_name;
		
		move_uploaded_file($source,$file_name);
	
	if(empty($op)){
		$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM tbl_produk");
$data = mysqli_fetch_array($query);
$kodepr = $data['kodeTerbesar'];

$urutan = (int) substr($kodepr, 3, 3);

$urutan++;

$huruf = "PR";
$idpr = $huruf . sprintf("%03s", $urutan);

		$sql = mysqli_query($koneksi,"INSERT INTO tbl_produk
	(id_produk,nama_produk,kategori,stok,deskripsi,harga_produk,foto) 
VALUES ('$idpr','$nama','$kategori','$stok','$deskripsi','$harga','$nama_file_simpan')");
	}
	else{
		$sql = mysqli_query($koneksi,"UPDATE tbl_produk SET 
			nama_produk='$nama',
			kategori='$kategori',
			stok='$stok',
			deskripsi='$deskripsi',
			harga_produk='$harga',
			foto='$nama_file_simpan'
			WHERE id_produk='$id_produk'");
	}
	
	if($sql){
		echo "<center class='teks'>loading...</center>";
		print"<html><head><meta http-equiv='refresh' content='0.1;URL=?page=produk&op=view'></meta></head></html>";
	}
	else{
		echo"gagal";
	}
?>