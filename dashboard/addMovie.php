<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    echo '<script>window.location.href = "../index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FlixFeast</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/css2/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css2/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css2/material-dashboard.css?v=3.0.5" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById("movies");
        element.classList.add("active", "bg-gradient-primary");
    });
    </script>
    <style>
    .table td,
    .table th {
        white-space: normal;
    }

    .form-control {
        background-color: white;
        padding: 5px;
    }

    .form-group {
        width: 600px;
    }

    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 auto;
            width: 100%;
        }
    }

    body {
        overflow-x: hidden;
    }
    </style>
</head>


<body class="g-sidenav-show dark-version bg-gray-200">

    <?php include("header.php"); ?>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="movies-tb.php">Movie
                                table</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Movie</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Add Movie</h6>
                </nav>
            </div>
        </nav>
        <div class="row justify-content-center mt-5" id="movieadd">
            <div class="col-md-6" style="display: flex; justify-content: center;">
                <form id="movie-add" method="post" enctype="multipart/form-data">
                    <h2>Movie</h2>
                    <input type="hidden" name="addForm" value="submitted">

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control bg-dark" type="text" id="title" placeholder="Title:" name="title">
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input class="form-control bg-dark" type="date" id="date" placeholder="Date:" name="date">
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <input class="form-control bg-dark" type="text" id="rating" placeholder="Rating:" name="rating">
                    </div>

                    <div class="form-group">
                        <label for="director">Director:</label>
                        <input class="form-control bg-dark" type="text" id="director" placeholder="Director:"
                            name="director">
                    </div>

                    <div class="form-group">
                        <label for="studio" class="form-label">Studio:</label>
                        <input type="text" class="form-control bg-dark" id="studio" placeholder="Studio:" name="studio">
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover Image:</label>
                        <input class="form-control bg-dark" type="text" id="cover" name="cover">
                    </div>

                    <div class="form-group">
                        <label for="trailer">Trailer Link:</label>
                        <input class="form-control bg-dark" type="text" id="trailer" placeholder="Trailer Link:"
                            name="trailer">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control bg-dark" id="description" placeholder="Description:"
                            name="description" style="color:black;" maxlength="1000"></textarea>
                    </div>
                    <label>Genres:</label><br>

                    <div class="form-group" id="genres" style="border-radius:10px;">
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Action" value="Action"> Action</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Comedy" value="Comedy"> Comedy</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Documentary" value="Documentary"> Documentary</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Drama" value="Drama"> Drama</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Fantasy" value="Fantasy"> Fantasy</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Horror" value="Horror"> Horror</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Animation" value="Animation"> Animation</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Mystery" value="Mystery"> Mystery</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Romance" value="Romance"> Romance</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Science Fiction" value="Science Fiction"> Science Fiction</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Thriller" value="Thriller"> Thriller</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Family" value="Family"> Family</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Crime" value="Crime"> Crime</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]"
                                id="Adventure" value="Adventure"> Adventure</label>
                    </div>

                    <div class="form-group">
                        <label for="length">Length:</label>
                        <input class="form-control bg-dark" type="text" id="length" placeholder="Length:" name="length">
                    </div>

                    <br>

                    <div class="form-group">
                        <input class="btn btn-primary shadow-none" type="submit" value="Submit" name="movie_submit">
                    </div>
                </form>
            </div>
        </div>
        <?php
        // connect to the database

        include('connection.php');


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
            $title = new input(mysqli_real_escape_string($conn,$_POST['title']), "title");
            $date = new input(mysqli_real_escape_string($conn, $_POST['date']), "date");
            $rating = new input(mysqli_real_escape_string($conn, $_POST['rating']), "rating");
            $cover = new input(mysqli_real_escape_string($conn, $_POST['cover']), "cover");
            $trailer = new input(mysqli_real_escape_string($conn, $_POST['trailer']), "trailer");
            $director = new input($_POST['director'], "director");
            $studio = new input($_POST['studio'], "studio");
            $description = new input(mysqli_real_escape_string($conn, $_POST['description']), "description");
            $length = new input(mysqli_real_escape_string($conn, $_POST['length']), "length");
            $genre = new input(isset($_POST['genre']) ? $_POST['genre'] : [], "genre");
            $inputs = [$title, $date, $rating, $director, $studio, $cover, $trailer, $description, $length];
            $temp = false;

            foreach ($inputs as $input) {
                if (empty($input->value)) {
                    echo '<script>document.getElementById("' . $input->id . '").style.border="2px solid red";</script>';
                    $temp = true;
                } else {
                    echo '<script>document.getElementById("' . $input->id . '").value="' . $input->value . '";</script>';
                }
            }

            if (sizeof($genre->value) == 0) {
                echo '<script>document.getElementById("genres").style.border="2px solid red";</script>';
                $temp = true;
            } else {
                foreach ($genre->value as $genreValue) {
                    echo '<script>document.getElementById("' . $genreValue . '").checked=true;</script>';
                }
            }

            if ($temp == true) {
                echo "<h6 style='text-align:center;'>Please fill out every information about the movie!</h6>";
            } else {
                // insert the data into the content table
                $sql = "INSERT INTO content (Title, Date, Rating, Trailer, Description, Cover, Length, Type) VALUES ('$title->value', '$date->value', '$rating->value', '$trailer->value','$description->value','$cover->value', '$length->value', 'Movie')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                //insert into genres table
                if (!empty($genre->value)) {
                    foreach ($genre->value as $genreValue) {
                        $genreValue = mysqli_real_escape_string($conn, $genreValue);
                        $sql1 = "INSERT INTO genre (ID, Genre) VALUES ('$id', '$genreValue')";
                        mysqli_query($conn, $sql1);
                    }
                }
                //insert into studios table
                $sql2 = "INSERT INTO studio (ID, Studio) VALUES ('$id', '$studio->value')";
                mysqli_query($conn, $sql2);
                //insert into director table
                $sql3 = "INSERT INTO director (ID, Director) VALUES ('$id', '$director->value')";
                mysqli_query($conn, $sql3);

                foreach ($inputs as $input) {
                    echo '<script>document.getElementById("' . $input->id . '").value="' . "" . '";</script>';
                }
                echo '<script>window.location.href = "movies-tb.php";</script>';
            }
        }

        ?>

    </main>
    <!-- details area end -->
    <!-- footer section start -->
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