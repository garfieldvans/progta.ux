				<div ><div class="container">
				<div class="col-sm-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title" style='text-align:center'>Login</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="?page=login_proses">
								<div class="form-group">
									<input type="text" name="username" class="form-control input-sm" Placeholder="Username">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control input-sm" Placeholder="Password">
								</div>
								<div class="form-group">
									<button class="btn btn-info btn-block">Login</button>
								</div>
							</form>
							
						</div>
						</div>
						</div>
					
						</div><form class="alert alert-warning" method="POST">	<h4><i>Anda Belum Punya Akun ?? </i><button class="btn btn-primary" name='log'>Buat Akun</button> <h4></form>
							<?php
							if(isset($_POST['log'])){
								echo "<script>location='?page=daftar'</script>";
							}
							?>
						</div><br><br><br>