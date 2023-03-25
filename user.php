<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
    <style>
      
    </style>
</head>
<body>
<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-6">

				<!-- Login Form -->
				<form id="login-form">
					<h2>Login</h2>
					<div class="form-group">
						<label for="login-username">Username:</label>
						<input type="text" class="form-control" id="login-username" name="login-username">
					</div>

					<div class="form-group">
						<label for="login-password">Password:</label>
						<input type="password" class="form-control" id="login-password" name="login-password">
					</div>

					<button type="submit" class="btn btn-primary">Login</button>

					<p>Don't have an account? <a href="#" id="register-link">Register here</a>.</p>
				</form>

				<!-- Register Form -->
				<form id="register-form" style="display: none;">
					<h2>Register</h2>
					<div class="form-group">
						<label for="register-username">Username:</label>
						<input type="text" class="form-control" id="register-username" name="register-username">
					</div>

					<div class="form-group">
						<label for="register-password">Password:</label>
						<input type="password" class="form-control" id="register-password" name="register-password">
					</div>

					<div class="form-group">
						<label for="confirm-password">Confirm Password:</label>
						<input type="password" class="form-control" id="confirm-password" name="confirm-password">
					</div>

					<button type="submit" class="btn btn-primary">Register</button>

					<p>Already have an account? <a href="#" id="login-link">Login here</a>.</p>
				</form>

			</div>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Script to switch between login and register forms -->
	<script>
		$(document).ready(function() {
			$('#register-link').click(function() {
				$('#login-form').hide();
				$('#register-form').show();
			});

			$('#login-link').click(function() {
				$('#register-form').hide();
				$('#login-form').show();
			});
		});
	</script>

</body>
</html>