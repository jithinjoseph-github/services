<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Services</title>

	<link rel="stylesheet" href="<?= base_url() ?>/assets/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte.min.css">
	<script defer="" referrerpolicy="origin" src="<?= base_url() ?>/assets/s.js.download"></script>
    <script src="<?= base_url() ?>/assets/jquery.min.js.download"></script>
    <script src="<?= base_url() ?>/assets/bootstrap.bundle.min.js.download"></script>
    <script src="<?= base_url() ?>/assets/adminlte.min.js.download"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">

	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="https://adminlte.io/themes/v3/starter.html#"
				   role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
		</ul>
	</nav>


	<aside class="main-sidebar sidebar-dark-primary elevation-4">

		<a href="<?= base_url() ?>" class="brand-link">
			<img src="<?= base_url() ?>/assets/AdminLTELogo.webp" alt="AdminLTE Logo"
				 class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">Services</span>
		</a>

		<div class="sidebar">

			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= base_url() ?>/assets/user2-160x160.jpg" class="img-circle elevation-2"
						 alt="User Image">
				</div>
				<div class="info">
					<a href="<?= base_url() ?>" class="d-block">Alexander Pierce</a>
				</div>
			</div>

			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<li class="nav-item">
						<a href="<?= base_url('customers') ?>" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Customers
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('services') ?>" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								Services
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('customerservices') ?>" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
								Customer Services
							</p>
						</a>
					</li>
				</ul>
			</nav>

		</div>

	</aside>
