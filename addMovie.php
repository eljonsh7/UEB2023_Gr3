<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FlixFeast</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="assets/img/logo2.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
    <!-- Slick nav CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css" media="all" />
    <!-- Iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />
    <!-- Owl carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css" />
    <!-- Popup CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css" />
    <!-- Main style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- header section start -->
    <?php include("header.php"); ?>

    <!-- header section end -->
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->


    <form id="movie-add" method="post" style=" margin: 0 auto; width: 50%;">
        <h2>Movie</h2>
        <input type="hidden" name="addForm" value="submitted">
        <label for="title">Title:</label>
        <input class="form-control" type="text" id="title" placeholder="Title:" name="title"><br>

        <label for="date">Date:</label>
        <input class="form-control" type="date" id="date" placeholder="Date:" name="date"><br>

        <label for="rating">Rating:</label>
        <input class="form-control" type="text" id="rating" placeholder="Rating:" name="rating"><br>

        <label for="director">Director:</label>
        <input class="form-control" type="text" id="director" placeholder="Director:" name="director"><br>

        <label for="studio">Studio:</label>
        <input class="form-control" type="text" id="studio" placeholder="Studio:" name="studio"><br>

        <label for="cover">Cover Link:</label>
        <input class="form-control" type="text" id="cover" placeholder="Cover Link:" name="cover"><br>

        <label for="trailer">Trailer Link:</label>
        <input class="form-control" type="text" id="trailer" placeholder="Trailer Link:" name="trailer"><br>

        <label for="description">Description:</label>
        <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000"></textarea><br>

        <label for="genre">Genre:</label>
        <input class="form-control" type="text" id="genre" placeholder="Genre:" name="genre"><br>

        <label for="length">Length:</label>
        <input class="form-control" type="text" id="length" placeholder="Length:" name="length"><br>

        <input class="form-control submit" type="submit" value="Submit" name="movie_submit">
    </form>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    // connect to the database
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

    class input
    {
        public $value;
        public $id;


        function __construct($value, $id)
        {
            $this->value = $value;
            $this->id = $id;
        }
    }
    // check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addForm'])) {
        // check which form was submitted

        // get the form data
        $title = new input($_POST['title'], "title");
        $date = new input($_POST['date'], "date");
        $rating = new input($_POST['rating'], "rating");
        $director = new input($_POST['director'], "director");
        $studio = new input($_POST['studio'], "studio");
        $cover = new input($_POST['cover'], "cover");
        $trailer = new input($_POST['trailer'], "trailer");
        $description = new input(mysqli_real_escape_string($conn, $_POST['description']), "description");
        $genre = new input($_POST['genre'], "genre");
        $length = new input($_POST['length'], "length");
        $inputs = [$title, $date, $rating, $director, $studio, $cover, $trailer, $description, $genre, $length];
        $temp = false;
        for ($i = 0; $i < sizeof($inputs); $i++) {
            if (empty($inputs[$i]->value)) {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").style.border="2px solid red";</script>';
                $temp = true;
            } else {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").value="' . $inputs[$i]->value . '";</script>';
            }
            if (($i == sizeof($inputs) - 1) && $temp == true) {
                echo "<h3>Please fill out every information about the movie!</h3>";
            }
        }
        if ($temp == false) {
            // insert the data into the movies table
            $sql = "INSERT INTO movies (Title, Date, Rating, Director, Studio, Trailer, Description, Cover, Genre, Length) VALUES ('$title->value', '$date->value', '$rating->value', '$director->value', '$studio->value',  '$trailer->value','$description->value','$cover->value', '$genre->value', '$length->value')";
            mysqli_query($conn, $sql);
            for ($i = 0; $i < sizeof($inputs); $i++) {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").value="' . "" . '";</script>';
            }
        }
    }

    echo '<table style=" margin: 0 auto; width: 90%;" class = "table table-bordered">
				<tr>
					<th>Title</th>
					<th>Date</th>
					<th>Rating</th>
					<th>Director</th>
					<th>Studio</th>
					<th>Trailer</th>
					<th>Description</th>
					<th>Cover</th>
					<th>Genre</th>
					<th>Length</th>
					<th></th>
				</tr>';
    $sql = "SELECT * FROM `movies`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '
				  			<tr>
								<td><a href="editDetails.php?detailsID=' . $row['ID'] . '&type=Movie&mode=info">' . $row['Title'] . '</a></td>
								<td>' . $row['Date'] . '</td>
								<td>' . $row['Rating'] . '</td>
								<td>' . $row['Director'] . '</td>
								<td>' . $row['Studio'] . '</td>
								<td>' . substr($row['Trailer'], 0, 30) . '</td>
								<td>' . substr($row['Description'], 0, 100) . '</td>
								<td>' . substr($row['Cover'], 0, 30) . '</td>
								<td>' . $row['Genre'] . '</td>
								<td>' . $row['Length'] . '</td>
								<td><a href="addMovie.php?removeID=' . $row['ID'] . '&mode=remove"><img style = "width: 50px;" src="assets/img/x.png">
                                </a></td>
				  			</tr>
					';
    }
    echo '</table>';
    if (isset($_GET['mode'])) {
        echo '<form id="movie-remove" method="post">
					<div class="overlay">
  						<div class="modal">
    						<input type="hidden" name="popForm" value="submitted">
							<button style="background-color:red;margin:2%;"><a href="addMovie.php?removeID=' . $_GET['removeID'] . '&mode=remove&confirm=1">Remove</a></button>
							<button style="background-color:green;margin:2%;"><a href="addMovie.php">Cancel</a></button>
  						</div>
					</div>
					
					</form>';
    }
    if (isset($_GET['confirm'])) {
        $removeID = $_GET['removeID'];
        $sql = "DELETE FROM `movies` WHERE `movies`.`ID` = $removeID";
        mysqli_query($conn, $sql);
        echo '<script>window.location.href = "addMovie.php";</script>';
    }
    ?>

    <!-- details area end -->
    <!-- footer section start -->
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
</body>

</html>