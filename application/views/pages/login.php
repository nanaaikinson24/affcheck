<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Amazing Market Consult</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
	<div class="auth-main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="card shadow-sm login-card">
						<div class="card-body">
							<form id="loginForm">
								<div class="logo">
									<img src="<?= base_url('assets/img/logo.png'); ?>" alt="">
								</div>

								<div class="formMsg"></div>

								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="email" id="email" class="form-control" required>
								</div>

								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>

								<div class="form-group mt-4">
									<button class="btn btn-success btn-block" id="loginFormBtn">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					
					<div class="success-content" style="display: none;"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets/js/login.js'); ?>"></script>
</body>
</html>