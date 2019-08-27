<div class="container">
	<h1 class="h3 mb-4 text-gray-800">Users</h1>

	<div class="row py-5">
		<div class="col-md-12">
			<div class="card" style="border-radius: 0;">
				<div class="card-body">
					<div class="mb-4">
						<button class="btn btn-primary" data-toggle="modal" data-target="#dataModal" data-backdrop="static">
							New User
						</button>
					</div>

					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach ($users as $user) : ?>
								<tr id="row-<?= $user->mask_id; ?>">
									<td></td>
									<td><?= $user->first_name . ' ' . $user->last_name; ?></td>
									<td><?= $user->email; ?></td>
									<td class="text-capitalize"><?= $user->role; ?></td>
									<td class="text-capitalize"><?= $user->status; ?></td>
									<td>
										<button class="btn btn-sm btn-primary edit-user" data-id="<?= $user->mask_id; ?>">
											<i class="fas fa-edit"></i>
										</button>

										<button class="btn btn-sm btn-danger delete-user" data-id="<?= $user->mask_id; ?>">
											<i class="fas fa-trash"></i>
										</button>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="dataModal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form id="userForm">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div>
						<p><span class="text-danger">NB: </span> fields marked <span>*</span> are required</p>
					</div>
					<div class="form-group">
						<label for="">First Name <span class="text-danger">*</span></label>
						<input type="text" name="firstName" id="firstName" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Last Name <span class="text-danger">*</span></label>
						<input type="text" name="lastName" id="lastName" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Email <span class="text-danger">*</span></label>
						<input type="text" name="email" id="email" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Role <span class="text-danger">*</span></label>
						<select name="role" id="role" class="custom-select">
							<option value="user">User</option>
							<option value="admin">Admin</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Status <span class="text-danger">*</span></label>
						<select name="status" id="status" class="custom-select">
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-success px-4" id="userFormBtn">
						Save
					</button>
				</div>
			</form>
		</div>
	</div>
</div>