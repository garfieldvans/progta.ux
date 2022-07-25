<?php
	error_reporting(0);
	session_start();
	include "conf/db.php";

?>
<a href="?page=pelanggan&op=add" class="btn btn-primary">Tambah</a>
<div class="table-responsive">
<table  class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Id Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Foto</th>
		<th>Username</th>
		<th>Password</th>
		<th>Aksi</th>
	</tr>
<?php
	$sql_count = mysqli_query($koneksi, "SELECT count(*) as b FROM tbl_pelanggan");
	$b = mysqli_fetch_array($sql_count);
 	$tot_pg = $b['b'];
	$limit = 10;                                
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
            $pagination.= "<li><a href='?page=pelanggan&pg=$prepg'>Kembali</a></li>";
        else
            $pagination.= "<span class='disabled'>Kembali</span>"; 
        if ($pg < $lastpg) 
            $pagination.= "<li><a href='?page=pelanggan&pg=$next'>Lanjut</a></li>";
        else
            $pagination.= "<span class='disabled'>Lanjut</span>";
        $pagination.= "</ul>";       
    }

    $n=0;
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan LIMIT $start , $limit");
	while ($tampil = mysqli_fetch_array($sql)) {
		$n++;
		?>
			<tr>
				<td>
					<?php echo $n; ?>
				</td>
				<td>
					<?php echo $tampil['id_pelanggan']; ?>
				</td>
				<td>
					<?php echo $tampil['nama_pelanggan']; ?>
				</td>
				<td>
					<?php echo $tampil['jenis_kelamin']; ?>
				</td>
				<td>
					<?php echo $tampil['alamat']; ?>
				</td>
				<td>
					<?php echo $tampil['telepon']; ?>
				</td>
				<td>
					<img width="50" src="../../uploads/<?php echo $tampil['foto']; ?>">
				</td>
				<td>
					<?php echo $tampil['username']; ?>
				</td>
				<td>
					<?php echo $tampil['password']; ?>
				</td>
				<td>
					<a href="?page=pelanggan&op=edit&id_pelanggan=<?php echo $tampil['id_pelanggan']; ?>"class="btn btn-primary">Edit</a> 
					<a href="javascript:if(confirm('Anda Yakin Ingin Menghapus  ??')){document.location='?page=pelanggan&op=delete&id_pelanggan=<?php echo $tampil['id_pelanggan']; ?>';}"class="btn btn-primary">Hapus</a>
			
				</td>
				
			</tr>
		<?php
	}
?>
</table> 
</div>
<?php echo $pagination; ?>