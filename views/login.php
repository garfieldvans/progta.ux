<form class="form-horizontal" action="?page=login_proses" method="POST">
	<fieldset>
		<legend>Login</legend>
		<div class="form-group">
			<label class="col-lg-2 control-label">Username</label>
			<div class="col-lg-10">
				<input type="text" name="username" class="form-control" placeholder="username">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Password</label>
			<div class="col-lg-10">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Level</label>
			<div class="col-lg-10">
				<select name="level" class="form-control">
					<option value="admin">Admin</option> 
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<?php echo $_SESSION["salah"]; session_destroy();?>
			</div>
		</div>
	</fieldset>
</form>