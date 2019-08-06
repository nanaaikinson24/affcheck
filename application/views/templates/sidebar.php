<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
		<div class="sidebar-brand-text mx-3">Amazing Market Consult</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<?php if ( $user->role == 'admin'): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>
	<?php endif; ?>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('aff-check'); ?>">
			<i class="fas fa-fw fa-user-alt"></i>
			<span>Aff Check</span>
		</a>
	</li>

	<?php if ( $user->role == 'admin'): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('users'); ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Users</span>
			</a>
		</li>
	<?php endif; ?>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->