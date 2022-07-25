<form class="form-horizontal" role="form" action="?page=setakun&op=save" method="POST">

	
	<div class="form-group">
		<label class="col-sm-2 control-label">Password Lama</label>
		<div class="col-sm-10">
			<input type="password" name="pass_lama" class="form-control" placeholder="Password Lama">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Password Baru</label>
		<div class="col-sm-10">
			<input type="password" name="pass_baru" class="form-control" placeholder="Password Baru">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Konfirmasi  Password Baru</label>
		<div class="col-sm-10">
			<input type="password" name="ulang_pass_baru" class="form-control" placeholder="Konfirmasi Password Baru">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Simpan Password</button>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<?php echo $_SESSION["salah"]; $_SESSION["salah"]="";?>
		</div>
	</div>
</form>