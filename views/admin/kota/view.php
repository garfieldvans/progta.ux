<?php
	error_reporting(0);
	session_start();
	include "conf/db.php";

?>
<a href="?page=kota&op=add" class="btn btn-primary">Tambah</a>
<div class="table-responsive">
<table  class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Id Kota</th>
		<th>Nama Kota</th> 
		<th>Aksi</th>
	</tr>
<?php
	$sql_count = mysqli_query($koneksi,"SELECT count(*) as b FROM tbl_kota");
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
            $pagination.= "<li><a href='?page=kota&pg=$prepg'>Kembali</a></li>";
        else
            $pagination.= "<span class='disabled'>Kembali</span>"; 
        if ($pg < $lastpg) 
            $pagination.= "<li><a href='?page=kota&pg=$next'>Lanjut</a></li>";
        else
            $pagination.= "<span class='disabled'>Lanjut</span>";
        $pagination.= "</ul>";       
    }

    $n=0;
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_kota LIMIT $start , $limit");
	while ($tampil = mysqli_fetch_assoc($sql)) {
		$n++;
		?>
			<tr>
				<td>
					<?php echo $n; ?>
				</td>
				<td>
					<?php echo $tampil['id_kota']; ?>
				</td>
				<td>
					<?php echo $tampil['kota']; ?>
				</td> 
				<td>
					<a href="?page=kota&op=edit&id_kota=<?php echo $tampil['id_kota']; ?>"class="btn btn-primary">Edit Kota</a> 
					<a href="javascript:if(confirm('Anda Yakin Ingin Menghapus  ??')){document.location='?page=kota&op=delete&id_kota=<?php echo $tampil['id_kota']; ?>';}"class="btn btn-primary">Hapus Kota</a>
			
				</td>
				
			</tr>
		<?php
	}
?>
</table> 
</div>
<?php echo $pagination; ?>