<!-- Begin Page Content -->
<div class="container">
	<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $user_count; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Searches</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $search_count; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-search fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Search (<?= gmdate('d F, Y'); ?>)</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $search_count_now; ?></div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fab fa-searchengin fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Most Searched</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								Staff ID: <?= isset($staff_id) && !empty($staff_id) ? $staff_id : ''; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-search-plus fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="my-5">

	</div>
</div>
<!-- /.container-fluid -->