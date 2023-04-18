<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" type="image/png" href="assets/img/logo2.png" />
	<link rel="icon" type="image/png" href="assets/img/logo2.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
    <!-- Slick nav CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css" media="all" />
    <!-- Iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />
    <!-- Owl carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
    <!-- Main style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />

	<title>Edit Profile</title>
	<style>
		input.field, input.field {
			border: 1px solid gray;
			border-radius: 5px;
			color: white;
			margin-bottom: 25px;
		}

		.home {
			color: #00d9e1;
		}

		.img-wrapper {
			width: 100%;
			overflow: hidden;
		}

		div.portfolio-content>h2 {
			font-size: 20px;
			justify-content: center;
			display: flex;
		}

		.row {
			justify-content: center;
		}

		.sideFeatured {
			display: none;
		}

		.importantDiv {
			margin-bottom: 50px !important;
		}

		.imgScroll {
			width: 400px !important;
			height: 597px !important;
		}


		@media screen and (min-width: 450px) {
			.imgScroll {
				width: 100% !important;
				padding: 10% 67px 0;
			}

			.textDiv {}

			.importantDiv {
				width: 500px;
				margin: 0 auto;
			}

			.picDiv {
				width: 100%;
			}

		}

		@media screen and (max-width: 1074px) {
			.col-md-5 {
				-webkit-box-flex: 0;
				-ms-flex: 0 0 41.666667%;
				flex: 0 0 100%;
				max-width: 100%;
			}

			.textDiv {
				-webkit-box-flex: 0;
				-ms-flex: 0 0 50%;
				flex: 0 0 80%;
				max-width: 80%;
			}

			.textDiv p {
				text-align: justify;
			}
		}

		@media screen and (min-width: 1075px) {
			.imgScroll {
				width: 300px !important;
				height: 448px !important;
				padding: 0;
			}

			.picDiv {
				padding-left: 2%;
				padding-top: 4%;
				margin-right: -1%;
			}

			.importantDiv {
				width: 99.5%;

			}

			.textDiv {
				display: block;
			}
		}

		@media screen and (min-width: 1200px) {
			.imgScroll {
				width: 300px !important;
				height: 448px !important;
			}

			.picDiv {
				margin-left: -7%;
				padding-top: 2%;
				margin-right: -8%;
			}
		}

		@media screen and (min-width: 1286px) {
			.imgScroll {
				width: 400px !important;
				height: 597px !important;
			}

			.picDiv {
				padding-left: 2%;
				padding-top: 0.5%;
				margin-right: 0;
				margin-left: 0;
			}

		}

		@media screen and (min-width: 1300px) {
			.sideFeatured {
				display: block;
			}
		}
    </style>
</head>

<body style="background-color: #212529;">
	<!-- Page loader -->
	<div id="preloader"></div>
    <!-- header section start -->
    <?php include("header.php"); ?>
	<br><br><br><br><br><br>

	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="user-box" style="width: 60%;">
			<h2 style="color: white;">Edit Profile</h2><br><br>
			<form method="post">
			<input type="hidden" name="signUpForm" value="1">
			<div class="form-group">
				<label for="username-field">USERNAME</label>
				<input type="text" id="username-field" name="username-field" class="form-control border" required />
			</div>
			<div class="form-group">
				<label for="email-field">EMAIL ADDRESS</label>
				<input type="email" id="email-field" name="email-field" class="form-control border" required />
			</div>
			<div class="form-group">
				<label for="password-field">NEW PASSWORD</label>
				<input type="password" id="password-field" name="password-field" class="form-control border" required onkeyup="verifyPassword()" />
				<p id="all" style="display: none; justify-content: center; color: white;">Password must contain at least one capital letter, one digit and must be at least 8 characters long!</p>
			</div>
			<div class="form-group">
				<label for="password-field2">CONFIRM PASSWORD</label>
				<input type="password" id="password-field2" name="password-field2" class="form-control border" required onkeyup="verifyPassword()" />
				<p id="isItSame" style="display: none; justify-content: center;">Passwords don't match</p>
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" />
				<label class="form-check-label" for="remember-me">Remember Me</label>
			</div>
			<button class="btn btn-primary" id="sign-up" disabled>Update</button>
			<button class="btn btn-danger" id="sign-up" disabled>Delete Account</button>
			</form>
		</div>
	</div>


	<?php include("footer.php"); ?>
    <!-- footer section end -->
    <!-- jquery main JS -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Slick nav JS -->
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- owl carousel JS -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Popup JS -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope JS -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- main JS -->
    <script src="assets/js/main.js"></script>

	<?php
		include("connection.php");

		$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE ID = ?");
		mysqli_stmt_bind_param($stmt, 's', $_SESSION['user']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		// if(mysqli_num_rows($result) > 0) {
		// 	echo "<script>
		// 		document.getElementByID('username-field').value = " . $result['Username'] . ";
		// 		document.getElementByID('email-field').value = " . $result['email'] . ";
		// 	</script>";
		// }

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signUpForm'])) {
			$username = $_POST['username-field'];
			$email = $_POST['email-field'];
			$password = $_POST['password-field'];

			$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
			mysqli_stmt_bind_param($stmt, 's', $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			$stmt1 = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
			mysqli_stmt_bind_param($stmt1, 's', $username);
			mysqli_stmt_execute($stmt1);
			$result1 = mysqli_stmt_get_result($stmt1);

			if(mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0) {
				$stmt = $conn->prepare("INSERT INTO users (Username, Email, password) VALUES (?, ?, ?)");
				$stmt->bind_param("sss", $username, $email, $password);
				$stmt->execute();

				if (mysqli_stmt_affected_rows($stmt) > 0) {
					echo "<script>console.log('Data inserted successfully!')";
					$_SESSION['user_logged_in'] = true;
					$_SESSION['user'] = false;
				} else {
					echo "<script>console.log('Error inserting data')";
				}
			} else {
				echo '<div class="overlay">
						<div class="modal">
							<p>Username or E-mail already in use</p>
						</div>
					</div>';
			}
		}
	?> 

	<script>
		document.getElementByID("username-field").value = ;
		document.getElementByID("email-field").value = ;
		document.getElementByID("password-field").value = ;
		document.getElementByID("password-field2").value = ;
	</script>

</body>

</html>