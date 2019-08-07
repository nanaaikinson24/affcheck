<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="container">
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <div class="my-5">
      <div class="row">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header">Personal Information</div>

            <div class="card-body">
              <form id="personalForm">
                <p><span class="text-danger">NB: </span>Fields marked <span class="text-danger">*</span> are required</p>
                <div class="form-msg"></div>
                <div class="form-group">
                  <label for="">First Name <span class="text-danger">*</span></label>
                  <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $user->first_name; ?>">
                </div>

                <div class="form-group">
                  <label for="">Last Name <span class="text-danger">*</span></label>
                  <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $user->last_name; ?>">
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= $user->email; ?>" disabled>
                </div>

                <div class="form-group">
                  <label for="">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control" value="<?= $user->phone; ?>">
                </div>

                <div class="form-group">
                  <button class="btn btn-primary btn-block" id="personalFormBtn">
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- <div class="mb-2">
            <div class="d-flex">
              <div class="mx-auto">
                <div class="profile-img shadow"></div>
                <div class="text-center">
                  <input type="file" name="profileImg" id="profileImg" class="d-none">
                  <button class="btn btn-sm btn-success mt-2">
                    Upload File
                  </button>
                </div>
              </div>
            </div>
          </div> -->

          <div class="card shadow">
            <div class="card-header">Password</div>

            <div class="card-body">
              <form id="passwordForm">
                <p><span class="text-danger">NB: </span>All fields are required</p>
                <div class="formMsg"></div>
                <div class="form-group">
                  <label for="">Old Password <span class="text-danger">*</span></label>
                  <input type="password" name="opassword" id="opassword" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="">New Password <span class="text-danger">*</span></label>
                  <input type="password" name="password" id="password" class="form-control" required>
                  <small class="text-secondary d-block">8 characters minimum</small>
                </div>

                <div class="form-group">
                  <label for="">Confirm Password <span class="text-danger">*</span></label>
                  <input type="password" name="cpassword" id="cpassword" class="form-control" required>
                </div>

                <div class="form-group">
                  <button class="btn btn-block btn-primary" id="passwordFormBtn">
                    Change Password
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->