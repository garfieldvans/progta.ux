<?php
	error_reporting(1);
	session_start();
	include "../../../koneksi.php";

?>
<div class="row">
	<div class="col-sm-12">
		<?php
			$page = $_GET['page'];
			$op = $_GET['op'];
			$q = $_GET['q'];
		?>
	<section class="konten">
		<div class="container">
			<div class="row"  >
				<?php  
					
					$sql=mysqli_query($koneksi,"Select * from tbl_produk where nama_produk or deskripsi LIKE'%$q%'");?>
				<?php
					if(!$tampil = mysqli_fetch_array($sql)){
						echo "<div class='alert alert-warning'>Pencarian '$q' Tidak Ditemukan </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";}
					else{
						echo "<div class='alert alert-warning'>Hasil Pencarian : $q </div>";
						while ($tampil = mysqli_fetch_assoc($sql)){?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="uploads/<?php echo $tampil['foto']; ?>" >
							<div class="caption">	
								<h3><?php echo $tampil['nama_produk']?></h3>
								<h5><strike> Rp.<?php $hasil = $tampil['harga_produk']*1.2; echo $hasil ?> </strike ></h5>
								<h4>Rp.<?php echo $tampil['harga_produk'];?></h4>
								<form method="POST"><button class="btn btn-primary" name="beli">Beli</button>
									<?php
										if(isset($_POST['beli'])){
											echo "<script>alert('Anda Harus Login Dulu ')</script>";
											echo "<script>location='?page=login'</script>";
									}?>
										<a href="?page=belanja&op=detail&id=<?php echo $tampil['id_produk'];?>" class="btn btn-default">Detail</a>
								</form>
							</div>
					</div>
				</div>	
				<?php }} ?>
			</div>
		</div>
	</section>
	</div>
</div>