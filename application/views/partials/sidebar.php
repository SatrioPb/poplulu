<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #9B0060;">
	<a class="sidebar-brand d-flex align-items-center justify-content-center my-2" href="<?= base_url('dashboard') ?>">
		<div class="sidebar-brand-icon">
			<img src="gambar/logo.png" alt="" style="filter:brightness(0)invert(1); width:80%">
		</div>
		<div class="sidebar-brand-text mx-3"></br></div>
	</a>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Master
	</div>

	<li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('barang') ?>">
			<i class="fas fa-fw fa-box"></i>
			<span>Master Barang</span></a>
	</li>

	<li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('customer') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Master Customer</span></a>
	</li>



	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Transaksi
	</div>



	<li class="nav-item <?= $aktif == 'penerimaan' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('penerimaan/order_detail_admin') ?>">
			<i class="fas fa-fw fa-file-invoice"></i>
			<span>Transaksi Penerimaan</span></a>
	</li>

	<!-- <hr class="sidebar-divider"> -->
	<?php if ($this->session->login['role'] == 'admin') : ?>
		<!-- Heading -->
		<!-- <div class="sidebar-heading">
			Pengaturan
		</div> -->

		<!-- <li class="nav-item <?= $aktif == 'pengguna' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('pengguna') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Manajemen Pengguna</span></a>
		</li> -->


		<!-- <li class="nav-item <?= $aktif == 'toko' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('toko') ?>">
				<i class="fas fa-fw fa-building"></i>
				<span>Profil Toko</span></a>
		</li> -->

		<!-- <li class="nav-item <?= $aktif == 'supplier' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('supplier') ?>">
				<i class="fas fa-fw fa-user"></i>
				<span>Master Supplier</span></a>
		</li> -->

		<!-- <li class="nav-item <?= $aktif == 'petugas' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('petugas') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Master Petugas</span></a>
		</li> -->
		<!-- Divider -->
	<?php endif; ?>
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>