<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">AFF Check</h1>

	<div class="my-5">
		<div class="row">
			<div class="col-md-5 offset-md-1">
				<form class="aff-search" id="affCheckForm">
					<div class="input-group mb-3">
						<input type="text" name="search" id="search" class="form-control" placeholder="Staff ID" required>
						<div class="input-group-append">
							<button class="btn btn-primary" id="affCheckFormBtn">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row py-5">
			<div class="col-md-10 offset-md-1">
				<div class="border-top pt-5">
					<div class="success-data" style="display: none;">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="d-block">Current Affordability</label>
									<input
										type="text"
										name="currentAffordability"
										id="currentAffordability"
										class="form-control"
										style="border: 1px solid rgba(82, 29, 108, 0.8); background-color: rgba(82, 29, 108, 0.8);color: #fff;"
										disabled
									>
								</div>

								<div class="form-group">
									<label for="">Full Name</label>
									<input type="text" name="name" id="name" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Employee No.</label>
									<input type="text" name="employeeNumber" id="employeeNumber" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Social Security</label>
									<input type="text" name="socialSecurity" id="socialSecurity" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Organization</label>
									<input type="text" name="organization" id="organization" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Job</label>
									<input type="text" name="job" id="job" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Grade</label>
									<input type="text" name="grade" id="grade" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Grade Step</label>
									<input type="text" name="gradeStep" id="gradeStep" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Ministry</label>
									<input type="text" name="ministry" id="ministry" class="form-control" disabled>
								</div>
							</div>

							<div class="col-md-6">

								<div class="form-group">
									<label for="" class="d-block">Affordability (AS AT)</label>
									<input type="text" name="affordability" id="affordability" class="form-control" disabled>
								</div>


								<div class="form-group">
									<label for="">Department</label>
									<input type="text" name="department" id="department" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Region</label>
									<input type="text" name="region" id="region" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">District</label>
									<input type="text" name="district" id="district" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Contact</label>
									<input type="text" name="contact" id="contact" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Email</label>
									<input type="text" name="email" id="email" class="form-control" disabled>
								</div>

								<div class="form-group">
									<label for="">Date of Birth</label>
									<input type="text" name="dob" id="dob" class="form-control" disabled>
								</div>
							</div>
						</div>
					</div>

					<div class="error-data" style="display: none;"></div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

