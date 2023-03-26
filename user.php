<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
    <style>
		.nav-links {
			display: flex;
			list-style: none;
		}

		ul{
			margin-top: 13px;
		}

		.nav-links li {
			margin-right: 20px;
		}

		.nav-links a {
			color: #fff;
			text-decoration: none;
		}
		
		ul li a {
			padding: 8px 10px;
			border-radius: 5px;
			font-weight: 700;
		}

		ul li a:hover {
			background-color: white;
			color: #333;
		}
		* {
			color: white;
		}

		input {
			color: grey;
		}

		header {
		background-color: #333;
		color: #fff;
		padding: 10px;
		}

		nav {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin: 0 10%;
		}

		.logo img {
			height: 50px;
		}
		a#register-link, a#login-link{
			color: #333;
		}
		a#register-link:hover, a#login-link:hover{
			color:white;
		}
    </style>
</head>
<body style="background-color: #245953;">
	<header>
		<nav>
			<div class="logo">
				<a href="index.php"><img src="img/logo.png"></a>
			</div>
			<ul class="nav-links">
				<li><a href="home.php">Home</a></li>
				<li><a href="movies.php">Movies</a></li>
				<li><a href="shows.php">TV Shows</a></li>
				<li><a href="imdb.php">Top IMDb</a></li>
			</ul>
		</nav>
	</header>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-6">

				<!-- Login Form -->
				<form id="login-form">
					<h2>Login</h2><br>
					<div class="form-group">
						<label for="login-username">E-mail:</label>
						<input type="email" class="form-control" id="login-username" name="login-username">
					</div>

					<div class="form-group">
						<label for="login-password">Password:</label>
						<input type="password" class="form-control" id="login-password" name="login-password">
					</div>

					<br>

					<button type="submit" class="btn" style="background-color: #333; color: white">Login</button><br>

					<p>Don't have an account? <a href="#" id="register-link">Register here</a>.</p>
				</form>

				<!-- Register Form -->
				<form id="register-form" style="display: none;">
					<h2>Register</h2><br>
					<div class="form-group">
						<label for="register-username">E-mail:</label>
						<input type="email" class="form-control" id="register-username" name="register-username">
					</div>

					<div class="form-group">
						<label for="register-password">Password:</label>
						<input type="password" class="form-control" id="register-password" name="register-password">
					</div>

					<div class="form-group">
						<label for="confirm-password">Confirm Password:</label>
						<input type="password" class="form-control" id="confirm-password" name="confirm-password">
					</div>

					<br>

					<button type="submit" class="btn" style="background-color: #333; color: white">Register</button><br>

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