<?php
	error_reporting(0);
	session_start();
	$host="localhost";
$user="root";
$password="";
$db="progta";
$koneksi=mysqli_connect($host,$user,$password);
mysqli_select_db($koneksi,$db);

?>
<div class="row">
	<div class="col-sm-12">
		<?php
			$page = $_GET['page'];
			$op = $_GET['op'];
			$cari = $_GET['q'];
		?>
	
				<?php 
 if(isset($_GET['q'])){
		$cari = $_GET['q'];
		$data = mysqli_query($koneksi,"select * from tbl_produk where nama_produk or deskripsi like '%".$cari."%'");				
	}else{
		$data = mysqli_query($koneksi,"select * from tbl_produk");		
	}

	while($tampil = mysqli_fetch_array($data)){ ?>
						<section class="konten">
						<div class="col-md-8">
				<form method="GET" >
                	<input type="hidden" name="page" value="belanja">
                	<input type="hidden" name="op" value="list">
                  <input type="text" name="q" value="<?php  error_reporting(0);echo $_GET['q']; ?>" class="form-control col-lg-8" placeholder="Cari Nama Produk "  ><br>
                </form>
				<ul id="iconizr" style="float:right">
				</ul>
				
				
</div>
						<form method="POST" action="?page=belanja">
						<div class="row">
		<div class="col-md-3">
		<select class="form-control" name="kategori" onchange="this.form.submit();">
		<option disabled selected>Kategori</option>
		<?php 
		$sql=mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
		while ($d=mysqli_fetch_array($sql)) {
		?>
		<option value="<?=$d['kategori']?>"><?=$d['kategori']?></option> 
		<?php
		}
		?>
		</select>
		
		</div>
		</div>
	</form>
						<?php echo "<div class='alert alert-warning'>Hasil Pencarian : $cari</div>";?>
						<div class="row"  >
						<?php  while ($tampil = mysqli_fetch_assoc($data)){?>
				
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="../../uploads/<?php echo $tampil['foto']; ?>" >
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
	</section>
	</div>
</div>