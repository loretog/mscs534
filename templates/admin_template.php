<!DOCTYPE html>
<html>
<head>
	<title>Best Layer, Inc</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>/assets/css/jquery.fullPage.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>/assets/css/main.css">
	<style type="text/css">body { margin-top: 20px; }</style>
</head>
<body class="admin">

	<div class="container">	
		<div class="row">		
			<div class="col-lg-12">
				<div class="page-header">
				  <h1>Best Layer Inc. <small>Administrator</small></h1>
				</div>	
			</div>
			<div class="col-lg-3">
				<div class="well well-sm">				
					Welcome back <?php echo $_SESSION[ 'Admin.username' ] ?>! <a class="pull-right" href="<?php echo ROOT_URL; ?>/admin/logout">Logout</a>
				</div>

				<div class="list-group">
					<?php
						$page = $this->Router->method_name;
					?>
					<a href="<?php echo ROOT_URL; ?>/admin" class="list-group-item <?php echo $page == 'index' ? 'active' : '' ?>">Home</a>
				  <a href="<?php echo ROOT_URL; ?>/admin/products" class="list-group-item <?php echo $page == 'products' ? 'active' : '' ?>">Products</a>
				  <a href="<?php echo ROOT_URL; ?>/admin/orders" class="list-group-item <?php echo $page == 'orders' ? 'active' : '' ?>">Orders</a>
				  <a href="<?php echo ROOT_URL; ?>/admin/categories" class="list-group-item <?php echo $page == 'categories' ? 'active' : '' ?>">Categories</a>
				  <a href="<?php echo ROOT_URL; ?>/admin/customers" class="list-group-item <?php echo $page == 'customers' ? 'active' : '' ?>">Customers</a>
				</div>
			</div>
			<div class="col-lg-9">				
				<?php echo $THE_MESSAGE; ?>
				<?php echo $THE_VIEW; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				Footer
			</div>
		</div> 
	</div>

	<script src="<?php echo ROOT_URL; ?>/assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo ROOT_URL; ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>