<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
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
        td{
			word-wrap: break-word;
			max-width: 300px;
			color:;
			text-align: center;
		}
		table, th, td {
  			border: 2px solid grey;
  			border-collapse: collapse;
		}
		table{
			margin-top: 5%;
		}
		
    </style>
</head>
<body style="background-color: #245953;">
	<header>
		<nav>
			<div class="logo">
				<!-- <a href="index.php"><img src="img/logo.png"></a> -->
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
				<form id="show-add" method="post">
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

					<label for="description">Description:</label>
                    <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000"></textarea><br>

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
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);

		class input{
			public $value;
			public $id;


			function __construct($value,$id){
				$this->value = $value;
				$this->id = $id;
			}
		}
        // check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check which form was submitted
                // get the form data
                $title = new input($_POST['title'],"title");
                $startdate = new input($_POST['startdate'],"startdate");
                $status = new input($_POST['status'],"status");
                $rating = new input($_POST['rating'],"rating");
				$director = new input($_POST['director'],"director");
                $studio = new input($_POST['studio'],"studio");
                $cover = new input($_POST['cover'],"cover");
                $trailer = new input($_POST['trailer'],"trailer");
				$description = new input($_POST['description'],"description");
				$inputsTV = [$title,$startdate,$status,$rating,$director,$studio,$cover,$trailer,$description];
				$temp = false;
				for($i = 0; $i < sizeof($inputsTV) ; $i++){
					if(empty($inputsTV[$i]->value)){
						echo '<script>document.getElementById("'.$inputsTV[$i]->id.'").style.border="2px solid red";</script>';
						$temp = true;
					}else{
						echo '<script>document.getElementById("'.$inputsTV[$i]->id.'").value="'.$inputsTV[$i]->value.'";</script>';
					}
					if(($i == sizeof($inputsTV)-1) && $temp == true){
						echo "<h3>Please fill out every information about the show!</h3>";
					}
				}
				if($temp == false){
                	// insert the data into the tvshows table
                	$sql = "INSERT INTO tvshows (Title, StartDate, Status, Rating, Director, Studio, Cover, Trailer, Description) VALUES ('$title->value', '$startdate->value', '$status->value', '$rating->value', '$director->value', '$studio->value', '$cover->value', '$trailer->value','$description->value')";
                	mysqli_query($conn, $sql);
					for($i = 0; $i < sizeof($inputsTV) ; $i++){
						echo '<script>document.getElementById("'.$inputsTV[$i]->id.'").value="'."".'";</script>';
				}
				}
        }
        echo '<table>
				<tr>
					<th>Title</th>
					<th>Start Date</th>
                    <th>Status</th>
					<th>Rating</th>
					<th>Director</th>
					<th>Studio</th>
                    <th>Cover</th>
					<th>Trailer</th>
					<th>Description</th>
				</tr>';
		$sql = "SELECT * FROM `tvshows`";
		$result = mysqli_query( $conn, $sql);
				while( $row = mysqli_fetch_array($result) ){
					echo '
				  			<tr>
								<td><a href= "editDetails.php?detailsID='.$row['ID'].'&type=Show&mode=info">'.$row['Title'].'</a></td>
								<td>'.$row['StartDate'].'</td>
                                <td>'.$row['Status'].'</td>
								<td>'.$row['Rating'].'</td>
								<td>'.$row['Director'].'</td>
								<td>'.$row['Studio'].'</td>
                                <td>'.substr($row['Cover'],0,30).'</td>
								<td>'.substr($row['Trailer'],0,30).'</td>
								<td>'.substr($row['Description'],0,100).'</td>
				  			</tr>
						';
				}
		echo '</table>';
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