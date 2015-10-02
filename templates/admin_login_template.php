<!DOCTYPE html>
<html>
<head>
	<title>Best Layer, Inc</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>/assets/css/jquery.fullPage.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>/assets/css/main.css">
</head>
<body class="admin">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 style="text-align: center;">Login</h1>
				<div class="" style="width: 40%; min-width: 320px; display: block; margin: 0 auto;">
				<div class="panel panel-primary">
					<div class="panel-heading">&nbsp;</div>
					<div class="panel-body">
						<?php echo $THE_MESSAGE; ?>
						<form method="post">
							<input type="hidden" name="action" value="admin_login">
						  <div class="form-group">
						    <label for="">Username</label>
						    <input type="text" class="form-control" name="username" placeholder="Username">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" name="password" placeholder="Password">
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>				
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo ROOT_URL; ?>/assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo ROOT_URL; ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>