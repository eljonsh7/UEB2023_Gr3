<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
    <style>
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-top: 50px;
            text-align: center;
        }
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

		.nav-links a, a {
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
		a#show-link, a#movie-link{
			color: #333;
		}
		a#show-link:hover, a#movie-link:hover{
			color:white;
		}
        .submit{
            color: white;
            background-color: #333;
            border: none;
        }
        h2{
            display: flex;
            justify-content: center;
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

				<form id="movie-add" method="post">
					<h2><a href="#" id="show-link">Movie or a TV Show?</a></p></h2><br>
                    <h2>Movie</h2>
					<label for="title">Title:</label>
                    <input class="form-control" type="text" id="title" placeholder="Title" name="title"><br>

                    <label for="date">Date:</label>
                    <input class="form-control" type="date" id="date" placeholder="Date" name="date"><br>

                    <label for="rating">Rating:</label>
                    <input class="form-control" type="text" id="rating" placeholder="Rating" name="rating"><br>

                    <label for="director">Director:</label>
                    <input class="form-control" type="text" id="director" placeholder="Director" name="director"><br>

                    <label for="studio">Studio:</label>
                    <input class="form-control" type="text" id="studio" placeholder="Studio" name="studio"><br>

                    <label for="cover">Cover Link:</label>
                    <input class="form-control" type="text" id="cover" placeholder="Cover Link" name="cover"><br>

                    <label for="trailer">Trailer Link:</label>
                    <input class="form-control" type="text" id="trailer" placeholder="Trailer Link" name="trailer"><br>

                    <input class="form-control submit" type="submit" value="Submit" name="movie_submit">
				</form>

				<form id="show-add" style="display: none;" method="post">
                    <h2><a href="#" id="movie-link">Movie or a TV Show?<a></h2><br>
                    <h2>TV Show</h2>
					<label for="title">Title:</label>
                    <input class="form-control" type="text" id="title" placeholder="Title" name="title"><br>

                    <label for="startdate">Start Date:</label>
                    <input class="form-control" type="date" id="startdate" placeholder="Start Date" name="startdate"><br>

                    <label for="status">Status:</label>
                    <input class="form-control" type="text" id="status" placeholder="Status" name="status"><br>

                    <label for="rating">Rating:</label>
                    <input class="form-control" type="text" id="rating" placeholder="Rating" name="rating"><br>

                    <label for="director">Director:</label>
                    <input class="form-control" type="text" id="director" placeholder="Director" name="director"><br>

                    <label for="studio">Studio:</label>
                    <input class="form-control" type="text" id="studio" placeholder="Studio" name="studio"><br>

                    <label for="cover">Cover Link:</label>
                    <input class="form-control" type="text" id="cover" placeholder="Cover Link" name="cover"><br>

                    <label for="trailer">Trailer Link:</label>
                    <input class="form-control" type="text" id="trailer" placeholder="Trailer Link" name="trailer"><br>

                    <input class="form-control submit" type="submit" value="Submit" name="show_submit">
				</form>

			</div>
		</div>
	</div>
    <?php
        // connect to the database
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'moviedb';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        // check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check which form was submitted
            if (isset($_POST['movie_submit'])) {
                // get the form data
                $title = $_POST['title'];
                $date = $_POST['date'];
                $rating = $_POST['rating'];
                $director = $_POST['director'];
                $studio = $_POST['studio'];
                $cover = $_POST['cover'];
                $trailer = $_POST['trailer'];

                // insert the data into the movies table
                $sql = "INSERT INTO movies (Title, Date, Rating, Director, Studio, Cover, Trailer) VALUES ('$title', '$date', '$rating', '$director', '$studio', '$cover', '$trailer')";
                mysqli_query($conn, $sql);
            } elseif (isset($_POST['show_submit'])) {
                // get the form data
                $title = $_POST['title'];
                $startdate = $_POST['startdate'];
                $status = $_POST['status'];
                $rating = $_POST['rating'];
                $director = $_POST['director'];
                $studio = $_POST['studio'];
                $cover = $_POST['cover'];
                $trailer = $_POST['trailer'];

                // insert the data into the tvshows table
                $sql = "INSERT INTO tvshows (Title, StartDate, Status, Rating, Director, Studio, Cover, Trailer) VALUES ('$title', '$startdate', '$status', '$rating', '$director', '$studio', '$cover', '$trailer')";
                mysqli_query($conn, $sql);
            }
        }
        ?>

    <footer>
		<p>&copy; 2023 FlixFeast. All rights reserved.</p>
		<p>Made with commitment by BBEÇ.</p>
	</footer>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Script to switch between login and register forms -->
	<script>
		$(document).ready(function() {
			$('#show-link').click(function() {
				$('#movie-add').hide();
				$('#show-add').show();
			});

			$('#movie-link').click(function() {
				$('#show-add').hide();
				$('#movie-add').show();
			});
		});
	</script>

</body>
</html>