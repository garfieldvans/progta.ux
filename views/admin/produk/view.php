<?php
	error_reporting(0);
	session_start();
	include "../../conf/db.php";

?>
<a href="?page=produk&op=add" class="btn btn-primary">Tambah</a>
<div class="table-responsive">
<table  class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Id Produk</th>
		<th>Nama Produk</th>
		<th>Kategori</th>
		<th>Stok</th>
		<th>Deskripsi</th>
		<th>Harga</th>
		<th>Foto</th>
		<th>Aksi</th>
	</tr>
<?php
	$sql_count = mysqli_query($koneksi, "SELECT count(*) as b FROM tbl_produk");
	$b = mysqli_fetch_array($sql_count);
 	$tot_pg = $b['b'];
	$limit = 15;                                
    $pg = $_GET['pg'];
    if($pg) {
        $start = ($pg - 1) * $limit;          
    }
    else{
        $start = 0;     
    }
    if ($pg == 0) {
    	$pg = 1;
    }
    $prepg = $pg - 1;                      
    $next = $pg + 1;                      
    $lastpg = ceil($tot_pg/$limit);     
    $lpm1 = $lastpg - 1;                  

    $pagination = "";
    if($lastpg > 1)
    {   
        $pagination .= "<ul class='pager'>";
        if ($pg > 1) 
            $pagination.= "<li><a href='?page=produk&pg=$prepg'>Kembali</a></li>";
        else
            $pagination.= "<span class='disabled'>Kembali</span>"; 
        if ($pg < $lastpg) 
            $pagination.= "<li><a href='?page=produk&pg=$next'>Lanjut</a></li>";
        else
            $pagination.= "<span class='disabled'>Lanjut</span>";
        $pagination.= "</ul>";       
    }

    $n=0;
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_produk LIMIT $start , $limit");
	while ($tampil = mysqli_fetch_array($sql)) {
		$n++;
		?>
			<tr>
				<td>
					<?php echo $n; ?>
				</td>
				<td>
					<?php echo $tampil['id_produk']; ?>
				</td>
				<td>
					<?php echo $tampil['nama_produk']; ?>
				</td>
				<td>
					<?php echo $tampil['kategori']; ?>
				</td>
				<td>
					<?php echo $tampil['stok']; ?>
				</td>
				<td>
					<?php echo $tampil['deskripsi']; ?>
				</td>
				<td>
					<?php echo $tampil['harga_produk']; ?>
				</td>
				
				<td>
					<img width="50" src="../../uploads/<?php echo $tampil['foto']; ?>">
				</td>
				<td>
					<a href="?page=produk&op=edit&id_produk=<?php echo $tampil['id_produk']; ?>"class="btn btn-primary">Edit Produk</a> 
					<a href="javascript:if(confirm('Anda Yakin Ingin Menghapus  ??')){document.location='?page=produk&op=delete&id_produk=<?php echo $tampil['id_produk']; ?>';}"class="btn btn-primary">Hapus Produk</a>
			
				</td>
				
			</tr>
		<?php
	}
?>
</table> 
</div>
<?php echo $pagination; ?>