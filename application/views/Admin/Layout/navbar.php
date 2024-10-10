<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="navbar-brand-wrapper d-flex justify-content-center">
				<div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
					<a class="navbar-brand brand-logo" href="index.html"><img src="<?= base_url('asset/majestic-master/') ?>images/logo.svg" alt="logo" /></a>
					<a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('asset/majestic-master/') ?>images/logo-mini.svg" alt="logo" /></a>
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-sort-variant"></span>
					</button>
				</div>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<ul class="navbar-nav mr-lg-4 w-100">
					<li class="nav-item nav-search d-none d-lg-block w-100">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="search">
									<i class="mdi mdi-magnify"></i>
								</span>
							</div>
							<input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
						</div>
					</li>
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
							<img src="<?= base_url('asset/majestic-master/') ?>images/faces/face5.jpg" alt="profile" />
							<span class="nav-profile-name">Admin</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

							<a href="<?= base_url('cLogin/logout') ?>" class="dropdown-item">
								<i class="mdi mdi-logout text-primary"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>

				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="mdi mdi-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Admin/cDashboard') ?>">
							<i class="mdi mdi-home menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Admin/cPengguna') ?>">
							<i class="mdi mdi-view-headline menu-icon"></i>
							<span class="menu-title">Pengguna</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Admin/cKategori') ?>">
							<i class="mdi mdi-chart-pie menu-icon"></i>
							<span class="menu-title">Kategori Barang</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Admin/cBarang') ?>">
							<i class="mdi mdi-grid-large menu-icon"></i>
							<span class="menu-title">Barang</span>
						</a>
					</li>
				</ul>
			</nav>
