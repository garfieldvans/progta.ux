<?php
	error_reporting(1);
	session_start();
	include "../koneksi.php";

?>
<html>
	<head>
	</head>
	<body>
		<style type="text/css">
  label > input{ 
          visibility: hidden; 
          position: absolute; 
        }
        label > input + img{
          border:2px solid transparent;
        }
        label > input:checked + img{ 
          border:2px solid #f00;
          width: 60px;
        }
 </style>
	<?php 
	$id_pembelian=$_GET['id']; 
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pembeli where id_pembelian='$id_pembelian'");
	while ($tampil = mysqli_fetch_array($sql)) {
		$total_pembelian=$tampil['total_pembelian'];
		$user=$tampil['id_pelanggan'];
	}
	if($total_pembelian>=1350000){
				$poin=30;
			}
			elseif($total_pembelian>=1000000){
				$poin=25;
			}
			elseif($total_pembelian>=750000){
				$poin=20;
			}
			elseif($total_pembelian>=500000){
				$poin=15;
			}
			elseif($total_pembelian>=250000){
				$poin=10;
			}
			elseif($total_pembelian>=150000){
				$poin=5;
			}
		 else{
			 $poin=1;
		 }
	?>
	<h3><b>Konfirmasi Pembayaran</b></h3>
	<p><i>Kirim Bukti pembayaran anda di sini</i></p>
	<div class='alert alert-info'><i>Anda Harus Membayar : Rp <?php echo number_format($total_pembelian);?></i></div>
	<form  method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<table class="table">
			<tr>
				<td><b>Nama</b></td><td><input type="text" class="form-control" name="namapeny" required></td>
			</tr>
			<tr>
				<td><b>Email</b></td><td><input type="E-mail" name="email" class="form-control" required></td>
			</tr>	
			<tr>
				<td><b>Jumlah</b></td><td><input type="text" name="jumlah" class="form-control" value="<?php echo  $total_pembelian ?>" readonly></td>
			</tr>
			<tr>
				<td><b>Poin</b></td><td><input type="text" name="poin" class="form-control" value="<?php echo  $poin ?>" readonly></td>
			</tr>
			</table>
			<div>
			<h4><b>Pilih Metode Pembayaran</b></h4><br><br>
			<div class="form-group" >
				<label style="width: 200px;">
				<input type="radio" name="metode" value="Go-Pay" >
				<img src="../../uploads/payment/gopay.jpg" style="width: 150px;" >
			</label>
			<label style="width: 200px;">
				<input type="radio" name="metode" value="Link-Aja">
				<img src="../../uploads/payment/link.png" style="width: 150px;">
			</label>
				<label style="width: 200px;">
				<input type="radio" name="metode" value="Link-Aja" >
				<img src="../../uploads/payment/dana.jpg" style="width: 150px;">
				</label>
				<label style="width: 200px;">
				<input type="radio" name="metode" value="OVO">
				<img src="../../uploads/payment/ovo.png" style="width: 150px;">
			</label>
			</div>
			

			</div>
		
		<button class='btn btn-primary' name='kirim'>Kirim</button>
	</form>
	<style type="text/css"></style>
	
	<?php
	if(isset($_POST['kirim'])){

		$query = mysqli_query($koneksi, "SELECT max(id_pembayaran) as kodeTerbesar FROM tbl_pembayaran");
		$data = mysqli_fetch_array($query);
		$kodebyr = $data['kodeTerbesar'];
		$urutan = (int) substr($kodebyr, 3, 3);
		$urutan++;
		$huruf = "BYR";
		$idbayar = $huruf . sprintf("%03s", $urutan);

		$nama=$_POST['namapeny'];
		$email=$_POST['email'];
		$jumlah=$_POST['jumlah'];
		$tanggal=date("Y-m-d");
		$metode=$_POST['metode'];



		
		$sql = mysqli_query($koneksi,"INSERT INTO tbl_pembayaran
	(id_pembayaran,id_pembelian,poin,nama,email,metode,jumlah,tanggal) 
VALUES ('$idbayar','$id_pembelian','$poin','$nama','$email','$metode','$jumlah','$tanggal')");

		$sql=mysqli_query($koneksi,"UPDATE tbl_pembeli SET status_pembelian='Sudah Dibayar' where id_pembelian='$id_pembelian'");


		$query=mysqli_query($koneksi,"UPDATE tbl_pelanggan SET poin=poin+'$poin' where id_pelanggan='$user'");
	
	echo "<script>alert('Terimakasih Sudah Melakukan Pembayaran')</script>";
	echo "<script>location='?page=riwayat'</script>";
		}
	?>
	</body>
</html>