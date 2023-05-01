<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<?php include("headerscript.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column   blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="row flexbox-container">
					<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
							<div class="card border-grey border-lighten-3 m-0">
								<div class="card-header border-0">
									<?php echo validation_errors(); ?>
									<div id="loginError">
										<code style="font-size: 18px;">
										<?php  $diff = strtotime('2023-04-27 01:00:00') - strtotime('2023-04-27 00:00:00'); ?>
											<?= $this->session->flashdata('error'); ?>
										</code>
									</div>
									<script>
										$(document).ready(function() {
											setTimeout(function() {

												$('#loginError').fadeToggle(3000);
											});
										});
									</script>

									<div class="card-title text-center">
										<div class=""><img src="<?= base_url('app-assets/images/logo/hash.jpg') ?>" width="100px" height="100" alt="branding logo"></div>
									</div>
								</div>
								<div class="card-content">
									<div class="card-body">
										<form class="form-horizontal form-simple" method="post" action="<?= base_url('login/loginValidate') ?>">
											<fieldset class="form-group position-relative has-icon-left mb-10">
												<input type="text" class="form-control form-control-lg" id="user-name" name="username" placeholder="Your Username">
												<div class="form-control-position">
													<i class="feather icon-user"></i>
												</div>
											</fieldset>
											<fieldset class="form-group position-relative has-icon-left">
												<input type="password" class="form-control form-control-lg" id="user-password" name="password" placeholder="Enter Password">
												<div class="form-control-position">
													<i class="fa fa-key"></i>
												</div>
											</fieldset>
											<div class="form-group row">
												<div class="col-sm-6 col-6 text-sm-left">
													<a href="<?= base_url('registration'); ?>" class="card-link danger">New Registration</a>
												</div>
												<div class="col-sm-6 col-6 text-sm-right">
													<a href="" class="card-link danger">Forgot Password?</a>
												</div>
											</div>
											<button type="submit" name="submit" value="submit" class="btn btn-danger btn-lg btn-block"><i class="feather icon-unlock"></i>Login</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- END: Content-->


	<?php include("footerscript.php"); ?>

</body>
<!-- END: Body-->

</html>
