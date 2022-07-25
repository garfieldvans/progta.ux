<?php 
include '../koneksi.php';
 ?>

<form action="cari.php" method="GET">
 <input type="text" name="cari">
 <input type="submit" value="cari">

 </form>
 <?php 
 if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
}
 ?>
 <table>
 	<tr>
 		<th>nama</th>
 		<th>foto</th>
 	</tr>

 <?php 
 if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($koneksi,"select * from tbl_produk where nama_produk or deskripsi like '%".$cari."%'");				
	}else{
		$data = mysqli_query($koneksi,"select * from tbl_produk");		
	}

	while($d = mysqli_fetch_array($data)){ ?>
		<tr>
			<td><?php echo $d['nama_produk']; ?></td>
			<td><img width="50" src="../../uploads/<?php echo $d['foto']; ?>"></td>
		</tr>

	<?php } ?>
 </table>
