<?php
if (!isset($_GET['mode'])) {
	echo '<script>window.location.href = "user.php?mode=info";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		img.cover1 {
			height: 100%;
		}

		img.profile {
			border-radius: 50%;
			align-content: center;
			margin: 7%;
		}

		p.details>b,
		p.details {
			font-size: large;
			margin: 7% 0%;
		}

		h2>a {
			text-decoration: underline;
		}

		h2>a:hover {
			color: #007bff;
			text-decoration: underline;
		}

		#edit:hover,
		#editpic:hover,
		#passEdit:hover {
			background-color: #007bff;
			color: white;
		}

		#edit,
		#editpic,
		#passEdit {
			background-color: black;
			color: white;
		}

		.edit {
			margin: 0 5%;
			width: =200%;
		}

		.details,
		.btn {
			margin: 3%
		}

		.modal p {
			margin-top: 0;
			margin-bottom: 1em;
			text-align: center;
		}

		input.f1 {
			color: black;
			margin-bottom: 25px;
			width: 200%;
			border-color: white;
		}

		input.f2 {
			color: black;
			margin-bottom: 25px;
			border-color: white;
		}

		.home {
			color: #00d9e1;
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
	<?php include("Models/header.php"); ?>

	<?php
	$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE ID = ?");
	mysqli_stmt_bind_param($stmt, 'd', $_SESSION['user']);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$user = mysqli_fetch_assoc($result);
	if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
		if (isset($_GET['mode']) && $_GET['mode'] == 'info') {
			echo '
				<div style = "display:flex;margin:10%;justify-content:center;" >
					<img src="' . $user['Photo'] . '" alt="' . $user['Username'] . '" width="300px" height="350px" class="cover1 profile"/>
					<div style="margin:7%;>
						<div id="viewDetails" style="width:50%;margin-left:5%;">
							<p id="firstname" class="details"><b>First Name:</b> <br>' . $user['Firstname'] . '</p>
							<p id="lastname" class="details"><b>Last Name:</b> <br>' . $user['Lastname'] . '</p>
							<p id="birthdate" class="details"><b>Birthdate:</b> <br>' . $user['Birthdate'] . '</p>
							<p id="username" class="details"><b>Username:</b> <br>' . $user['Username'] . '</p>
							<p id="email" class="details"><b>Email: </b><br>' . $user['Email'] . '</p>' .
				//<a class="btn btn-warning" href="user.php?mode=edit">Edit</a>
				'</div>
					</div>
				</div>';
		} else if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
			echo '<br><br><br>
				<div style = "display:flex; justify-content:center; margin:8%;">
					<div class="cover" style="display:block;">
						<img src="' . $user['Photo'] . '" alt="' . $user['Username'] . '" width="300px" class="cover profile"/>
						<form method="post" action="user.php?mode=info" enctype="multipart/form-data">
							<input type="hidden" name="photo" value="1">
							<div class="form-group">
								<br>
								<label for="file">Change Photo:</label>
								<input class="form-control f1 text-white bg-dark" type="file" id="image" name="image" required style="width: 82%;">
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" value="Change Photo" name="photo" id="editpic">
							</div>
						</form>
					</div>
					<div class="edit" id="movieadd">
						<div class="col-md-6" style="display: flex; justify-content: center;">
							<form id="movie-add" method="post" enctype="multipart/form-data">
								<h2 style="width: 200%;">Edit Profile or <a href="user.php?mode=info">Go Back</a></h2>
								<input type="hidden" name="edit" value="submitted">
								<div class="form-group">
									<label for="firstname">First Name:</label>
									<input class="form-control f1 text-white bg-dark" value="' . $user['Firstname'] . '" type="text" id="firstname" placeholder="Firstname:" required name="firstname">
								</div>
								<div class="form-group">
									<label for="lastname">Last Name:</label>
									<input class="form-control f1 text-white bg-dark" value="' . $user['Lastname'] . '" type="text" id="lastname" placeholder="Lastname:" required name="lastname">
								</div>
								<div class="form-group">
									<label for="username">Usrname:</label>
									<input class="form-control f1 text-white bg-dark" value="' . $user['Username'] . '" type="text" id="username" placeholder="Username:" required name="username">
								</div>
								<div class="form-group">
									<label for="birthdate">Birthdate:</label>
									<input class="form-control f1 text-white bg-dark" value="' . $user['Birthdate'] . '" type="date" id="birthdate" placeholder="Birthdate:" required name="birthdate">
								</div>
								<div class="form-group">
									<label for="email">Email:</label>
									<p id="email" class="details">' . $user['Email'] . '</p>
								</div>

								<div class="form-group">
									<input class="btn btn-primary" type="submit" value="Edit Profile" name="edit" id="edit">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div style = "display:flex; justify-content:center;">
					<div>
						<div class="pass" style="justify-content: center; display: flex;">
							<form id="pass" method="post" enctype="multipart/form-data" style="width: 400px">
								<h2 style="width: 200%;">Edit Password</h2><br>
								<input type="hidden" name="pass" value="submitted">
								<div class="form-group">
									<label for="oldpassword">Old Password:</label>
									<input class="form-control f2 text-white bg-dark" type="password" id="oldpassword" 
									placeholder="Old Password:" required name="oldpassword">
								</div>
								<div class="form-group">
									<label for="password">New Password:</label>
									<input class="form-control f2 text-white bg-dark" type="password" id="password" 
									placeholder="New Password:" required name="password" onkeyup="verifyPassword()">
									<p id="error1" style="display: none; flex-wrap: wrap;color: white; font-size:small;">
										Password must contain one capital letter, one digit and must be longer!</p>
								</div>
								<div class="form-group">
									<label for="password2">Confirm New Password:</label>
									<input class="form-control f2 text-white bg-dark" type="password" id="password2" 
									placeholder="Confirm New Password:" required name="password2" onkeyup="verifyPassword()">
									<p id="isItEqual" style="display: none; font-size:small;" style="color: white;">Passwords do not match</p>
								</div>
								<div class="form-group">
									<input class="btn btn-dark" type="submit" value="Change Password" name="passEdit" id="passEdit">
								</div>
							</form>
						</div>
					</div>
				</div>';
		}
	} else {
		echo '<a href="#">Profile <i class="icofont icofont-simple-down"></i></a>
						<ul>
							<li><a href="" class="signup-popup">Log in</a></li>
							<li><a href="" class="login-popup">Sign up</a></li>
						</ul>';
	}
	?>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['photo'])) {
		$image_name = $user['Username'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$folder = "assets/img/user_pic/";
		$path = $folder . $image_name;

		$check = getimagesize($tmp_name);

		if ($check) {
			move_uploaded_file($tmp_name, $path);
			$stmt = mysqli_prepare($conn, "UPDATE users SET Photo = ? WHERE ID = ?");
			mysqli_stmt_bind_param($stmt, 'ss', $path, $_SESSION['user']);
			mysqli_stmt_execute($stmt);
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$username = $_POST['username'];

		$stmt1 = mysqli_prepare($conn, "SELECT * FROM users WHERE Username = ?");
		mysqli_stmt_bind_param($stmt1, 's', $username);
		mysqli_stmt_execute($stmt1);
		$result1 = mysqli_stmt_get_result($stmt1);
		$user1 = mysqli_fetch_assoc($result1);


		if (mysqli_num_rows($result1) > 0) {
			if ($user['ID'] == $user1['ID']) {
				$sql = "UPDATE users SET Firstname=?, Lastname=?, Birthdate=?, Username=? WHERE ID=?";
				$stmt = mysqli_prepare($conn, $sql);
				mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $birthdate, $username, $_SESSION['user']);
				mysqli_stmt_execute($stmt);
			}
		}

		echo '<script>window.location.href = "user.php?mode=info";</script>';
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pass'])) {
		$pass1 = $_POST['password'];
		$pass2 = $_POST['password2'];
		$oldpass = $_POST['oldpassword'];

		if ($user['Password'] == $oldpass) {
			$sql = "UPDATE users SET Password=? WHERE ID=?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "si", $pass1, $_SESSION['user']);
			mysqli_stmt_execute($stmt);
		} else {
			echo '<script>alert("Old password incorrect.")</script>';
		}

		echo '<script>window.location.href = "user.php?mode=info";</script>';
	}
	?>



	<?php include("Models/footer.php"); ?>

	<script>
		function verifyPassword() {
			const pass1 = document.getElementById("password").value;
			const pass2 = document.getElementById("password2").value;
			const signUpButton = document.getElementById("passEdit");
			const errorMessage = document.getElementById("isItEqual");
			const allMessage = document.getElementById("error1");

			const passwordRegex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
			const isPasswordValid =
				pass1 === pass2 && passwordRegex.test(pass1);

			if (pass1.length != 0) {
				if (!passwordRegex.test(pass1)) {
					allMessage.style.display = "block";
					allMessage.style.color = "red";
				} else {
					allMessage.style.display = "none";
				}
			} else {
				allMessage.style.display = "none";
			}

			if (pass2.length != 0) {
				if (pass1 !== pass2) {
					errorMessage.style.display = "flex";
					errorMessage.style.color = "red";
				} else {
					errorMessage.style.display = "none";
				}
			} else {
				errorMessage.style.display = "none";
			}

			signUpButton.disabled = !isPasswordValid;
		}
	</script>
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
	include("Services/connection.php");

	$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE ID = ?");
	mysqli_stmt_bind_param($stmt, 's', $_SESSION['user']);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signUpForm'])) {
		$username = $_POST['username-field'];
		$email = $_POST['email-field'];
		$password = $_POST['password'];

		$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
		mysqli_stmt_bind_param($stmt, 's', $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		$stmt1 = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
		mysqli_stmt_bind_param($stmt1, 's', $username);
		mysqli_stmt_execute($stmt1);
		$result1 = mysqli_stmt_get_result($stmt1);

		if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0) {
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
</body>

</html>