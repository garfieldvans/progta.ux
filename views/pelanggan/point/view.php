<?php
	error_reporting(0);
	session_start();
	include "../koneksi.php";

?>
<?php
	$user=$_SESSION['ses_username'];
		$sql=mysqli_query($koneksi,"Select * from tbl_pelanggan where username='$user'");
		while($tamp= mysqli_fetch_assoc($sql)){
		 $id_pelanggan=$tamp['id_pelanggan'];
		 }
	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan where id_pelanggan='$id_pelanggan'");
	while ($tampil = mysqli_fetch_array($sql)) {
		$poin=$tampil['poin'];
			}
?>
<div class="alert alert-info" >
<div style='text-align:center'>

<?php
echo "<i><h2><b>Hi, $nama</b></h2>";
echo " <h4>Total Poin Anda Saat ini Adalah <b>$poin</b> </h4>";
echo  "<h3>Terus berbelanja agar poin anda terus bertambah </h3><br> </i>";
?>

<a href="?page=point&op=belanja&total=<?php echo $poin; ?>"  class="btn btn-primary ">Tukarkan Poin</a> 
</div>
</div>