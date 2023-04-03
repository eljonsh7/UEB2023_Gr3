<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="icon" type="image/png" href="assets/img/logo2.png" />
    <title>FlixFeast</title>
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

    ul {
        margin-top: 13px;
    }

    .nav-links li {
        margin-right: 20px;
    }

    .nav-links a,
    a {
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

    a#show-link,
    a#movie-link {
        color: #333;
    }

    a#show-link:hover,
    a#movie-link:hover {
        color: white;
    }

    .submit {
        color: white;
        background-color: #333;
        border: none;
    }

    h2 {
        display: flex;
        justify-content: center;
    }

    td {
        word-wrap: break-word;
        max-width: 300px;
        /* color: ; */
        text-align: center;
    }

    table,
    th,
    td {
        border: 2px solid grey;
        border-collapse: collapse;
    }

    table {
        margin-top: 5%;
    }

    .overlay {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal {
        display: flex;
        justify-content: center;
        /* centers horizontally */
        align-items: center;
        /* centers vertically */
        width: 10%;
        height: 15%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
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
                    <input type="hidden" name="addForm" value="submitted">

                    <label for="title">Title:</label>
                    <input class="form-control" type="text" id="title" placeholder="Title" name="title"><br>

                    <label for="startdate">Start Date:</label>
                    <input class="form-control" type="date" id="startdate" placeholder="Start Date"
                        name="startdate"><br>

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
                    <textarea class="form-control" id="description" placeholder="Description:" name="description"
                        style="color:black;" maxlength="1000"></textarea><br>

                    <label for="genre">Genre:</label>
                    <input class="form-control" type="text" id="genre" placeholder="Genre:" name="genre"><br>

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addForm'])) {
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
				$description = new input(mysqli_real_escape_string($conn,$_POST['description']),"description");
				$genre = new input($_POST['genre'],"genre");
				$inputsTV = [$title,$startdate,$status,$rating,$director,$studio,$cover,$trailer,$description,$genre];
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
                	$sql = "INSERT INTO tvshows (Title, StartDate, Status, Rating, Director, Studio, Cover, Trailer, Description, Genre) VALUES ('$title->value', '$startdate->value', '$status->value', '$rating->value', '$director->value', '$studio->value', '$cover->value', '$trailer->value','$description->value', '$genre->value')";
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
					<th>Genre</th>
					<th> </th>
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
								<td>'.$row['Genre'].'</td>
								<td><a href="addShow.php?removeID='.$row['ID'].'&mode=remove">x</a></td>
				  			</tr>
						';
				}
		echo '</table>';
		if(isset($_GET['mode'])){
			echo '<form id="show-remove" method="post">
					<div class="overlay">
  						<div class="modal">
    						<input type="hidden" name="popForm" value="submitted">
							<button style="background-color:red;margin:2%;"><a href="addShow.php?removeID='.$_GET['removeID'].'&mode=remove&confirm=1">Remove</a></button>
							<button style="background-color:green;margin:2%;"><a href="addShow.php">Cancel</a></button>
  						</div>
					</div>
					
					</form>';
		}
		if(isset($_GET['confirm'])){
			$removeID=$_GET['removeID'];
			$sql = "DELETE FROM `tvshows` WHERE `tvshows`.`ID` = $removeID";
            mysqli_query($conn, $sql);
			echo '<script>window.location.href = "addShow.php";</script>';
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


    <script>
    const overlay = document.querySelector('.overlay');

    // Disable scrolling on the background content
    document.body.style.overflow = 'hidden';

    // Add a click event listener to the overlay
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            // Remove the overlay when it's clicked
            overlay.remove();
            window.location.href = "addMovie.php";

            // Enable scrolling on the background content
            document.body.style.overflow = '';
        }
    });
    </script>

</body>

</html>