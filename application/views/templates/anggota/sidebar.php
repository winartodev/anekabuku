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
			<a href="index3.html" class="brand-link">
				<img src="<?= base_url('assets') ?>/dist/img/icon.jpg" alt="Aneka Buku Logo"
					class="brand-image img-circle elevation-3">
				<span class="brand-text font-weight-light">Aneka Buku</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
							alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Alexander Pierce</a>
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
							<a href="<?= base_url('anggota/dashboard') ?>" class="nav-link">
								<i class="nav-icon fa fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-header">KATEGORI</li>
						<li class="nav-item has-treeview">
							<a href="" class="nav-link">
								<i class="nav-icon fas fa-list"></i>
								<p>
									Kategori
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<?php foreach($kategori as $_kategori): ?>
								<li class="nav-item">
									<a href="<?= base_url('anggota/kategori/subcat/').$_kategori->id_kategori ?>" class="nav-link">
										<i class="nav-icon-sm fa  fa-circle fa-sm"></i>
										<p>
											<?= $_kategori->nama_kategori; ?>
										</p>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</li>

						<li class="nav-header">BUKU</li>
						<li class="nav-item has-treeview">
							<a href="" class="nav-link">
								<i class="nav-icon fas fa-book"></i>
								<p>
									Buku
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
							<li class="nav-item">
							<a href="<?= base_url('anggota/buku/keranjang_buku') ?>" class="nav-link">
								<i class="nav-icon-sm fa fa-cart-plus fa-sm"></i>
								<p>
									Keranjang Buku
									<span class="badge badge-danger right">0</span>
								</p>
							</a>
							<a href="<?= base_url('anggota/dashboard') ?>" class="nav-link">
								<i class="nav-icon-sm fa fa-book-reader fa-sm"></i>
								<p>
									Pinjaman Buku
								</p>
							</a>
						</li>
							</ul>
						</li>

						
						
						<li class="nav-header">SETTINGS</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
								<i class="nav-icon fa fa-user-alt"></i>
								<p>
									User
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
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
