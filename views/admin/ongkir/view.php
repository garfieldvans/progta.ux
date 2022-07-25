<?php
	error_reporting(0);
	session_start();
	include "../koneksi.php";

?>
<a href="?page=ongkir&op=add" class="btn btn-primary">Tambah</a>
<div class="table-responsive">
<table  class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Id Ongkir</th>
		<th>Nama Kota</th>
		<th>Trif</th>
		<th>Aksi</th>
	</tr>
<?php
	$sql_count = mysqli_query($koneksi,"SELECT count(*) as b FROM tbl_ongkir");
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
            $pagination.= "<li><a href='?page=ongkir&pg=$prepg'>Kembali</a></li>";
        else
            $pagination.= "<span class='disabled'>Kembali</span>"; 
        if ($pg < $lastpg) 
            $pagination.= "<li><a href='?page=ongkir&pg=$next'>Lanjut</a></li>";
        else
            $pagination.= "<span class='disabled'>Lanjut</span>";
        $pagination.= "</ul>";       
    }

    $n=0;
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_ongkir,tbl_kota where tbl_ongkir.id_kota=tbl_kota.id_kota LIMIT $start , $limit");
	while ($tampil = mysqli_fetch_assoc($sql)) {
		$n++;
		?>
			<tr>
				<td>
					<?php echo $n; ?>
				</td>
				<td>
					<?php echo $tampil['id_ongkir']; ?>
				</td>
				<td>
					<?php echo $tampil['kota']; ?>
				</td>
				<td>
					<?php echo $tampil['tarif']; ?>
				</td>
				<td>
					<a href="?page=ongkir&op=edit&id_ongkir=<?php echo $tampil['id_ongkir']; ?>"class="btn btn-primary">Edit ongkir</a> 
					<a href="javascript:if(confirm('Anda Yakin Ingin Menghapus  ??')){document.location='?page=ongkir&op=delete&id_ongkir=<?php echo $tampil['id_ongkir']; ?>';}"class="btn btn-primary">Hapus Ongkir</a>
			
				</td>
				
			</tr>
		<?php
	}
?>
</table> 
</div>
<?php echo $pagination; ?>