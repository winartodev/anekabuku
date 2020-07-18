<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">Home</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search"
						aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-light elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
				<img src="<?= base_url('assets') ?>/dist/img/icon.jpg" alt="Aneka Buku Logo" class="brand-image img-circle elevation-3"
					>
				<span class="brand-text font-weight-light">Aneka Buku</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/upload/petugas/').$this->session->userdata('foto') ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="<?= base_url('petugas/info/').$this->session->userdata('id_petugas') ?>" class="d-block">Hi, <?= $this->session->userdata('nama_petugas') ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   			<li class="nav-header">DASHBOARD</li>
                        <li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
								<i class="nav-icon fa fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-header">MAIN</li>
                        <li class="nav-item">
							<a href="<?= base_url('admin/kategori') ?>" class="nav-link">
								<i class="nav-icon fa fa-list-alt"></i>
								<p>
									Kategori
								</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="<?= base_url('admin/penerbit') ?>" class="nav-link">
								<i class="nav-icon fa fa-users"></i>
								<p>
									Penerbit
								</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="<?= base_url('admin/buku') ?>" class="nav-link">
								<i class="nav-icon fa fa-book-open"></i>
								<p>
									Buku
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/pengembalian') ?>" class="nav-link">
								<i class="nav-icon fa fa-book-open"></i>
								<p>
									Pengembalian Buku
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/anggota') ?>" class="nav-link">
								<i class="nav-icon fa fa-users"></i>
								<p>
									Anggota
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/petugas') ?>" class="nav-link">
								<i class="nav-icon fa fa-users"></i>
								<p>
									Petugas
								</p>
							</a>
						</li>
						<li class="nav-header">SETTINGS</li>
                        <li class="nav-item">
							<a href="<?= base_url('admin/user/info/').$this->session->userdata('id_petugas') ?>" class="nav-link">
								<i class="nav-icon fa fa-user"></i>
								<p>
									User
								</p>
							</a>
						</li>   
                        <li class="nav-item">
							<a href="<?= base_url('guest/logout') ?>" class="nav-link">
								<i class="nav-icon fa fa-times"></i>
								<p>
									Log Out
								</p>
							</a>
						</li>   
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
