<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Kurnia Telor - Metode EOQ</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= base_url('asset/majestic-master/') ?>vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/majestic-master/') ?>vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('asset/majestic-master/') ?>css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?= base_url('asset/majestic-master/') ?>images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left py-5 px-4 px-sm-5">
							<div class="brand-logo">
								<img src="<?= base_url('asset/majestic-master/') ?>images/logo.svg" alt="logo">
							</div>
							<h4>Hello! let's get started</h4>
							<h6 class="font-weight-light">Sign in to continue.</h6>
							<?php if ($this->session->userdata('success')) {
							?>
								<div class="alert alert-success" role="alert">
									<h5>Sukses!</h5>

									<p><?= $this->session->userdata('success') ?></p>
								</div>
							<?php
							} ?>
							<?php if ($this->session->userdata('error')) {
							?>
								<div class="alert alert-danger" role="alert">
									<h5>Gagal!</h5>

									<p><?= $this->session->userdata('error') ?></p>
								</div>
							<?php
							} ?>
							<form action="<?= base_url('cLogin/p_proses') ?>" method="post" class="pt-3">
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="<?= base_url('asset/majestic-master/') ?>vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- inject:js -->
	<script src="<?= base_url('asset/majestic-master/') ?>js/off-canvas.js"></script>
	<script src="<?= base_url('asset/majestic-master/') ?>js/hoverable-collapse.js"></script>
	<script src="<?= base_url('asset/majestic-master/') ?>js/template.js"></script>
	<!-- endinject -->
</body>

</html>
