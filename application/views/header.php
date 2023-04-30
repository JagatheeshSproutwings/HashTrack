<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<title>VEHICLES</title>

	<link rel="apple-touch-icon" href="">
	<link rel="shortcut icon" type="image/x-icon" href="">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors.min.css') ?>">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/bootstrap-extended.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/colors.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/components.min.css') ?>">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/colors/palette-gradient.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/fonts/simple-line-icons/style.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/pages/card-statistics.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/pages/vertical-timeline.min.css') ?>">
	<!-- END: Page CSS-->


	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class=" vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
	<!-- BEGIN: Header-->

	<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo" alt="" src="">
							<img src="<?= base_url('app-assets/images/logo/hash2_new.png') ?>" width="150px" height="50" alt="branding logo">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- END: Header-->


	<!-- BEGIN: Main Menu-->
	<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
				</li>
				<li class=" nav-item"><a href="<?= base_url('') ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>

				</li>
				<li class=" nav-item"><a href="<?= base_url('Customer') ?>"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Templates">Customer</span></a>

				</li>
				<li class=" nav-item"><a href="<?= base_url('Vehicle') ?>"><i class="feather icon-truck"></i><span class="menu-title" data-i18n="Templates">Vehicle</span></a>

				</li>
				<li class=" nav-item"><a href="<?= base_url('VehicleRent') ?>"><i class="feather icon-monitor"></i><span class="menu-title" data-i18n="Templates">Vehicle Rent</span></a>

				</li>
				<li class=" nav-item"><a href="<?= base_url('VehicleOpen') ?>"><i class="feather icon-truck"></i><span class="menu-title" data-i18n="Dashboard">Vehicle Open</span></a>

				</li>
				<li class=" nav-item"><a href="<?= base_url('VehicleChange') ?>"><i class="feather icon-truck"></i><span class="menu-title" data-i18n="Dashboard">Vehicle Rent</span></a>

				</li>
				<!-- <li class=" nav-item"><a href="<?= base_url('VehicleClose') ?>"><i class="feather icon-truck"></i><span class="menu-title" data-i18n="Dashboard">Vehicle Close</span></a>

				</li> -->
				<li class=" nav-item"><a href="<?= base_url('Login/AppLogout') ?>"><i class="feather icon-log-out"></i><span class="menu-title" data-i18n="Dashboard">Logout</span></a>

				</li>
			</ul>
		</div>
	</div>
	<!-- END: Main Menu-->
