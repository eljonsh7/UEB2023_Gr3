<?php 
    session_start();
    if(!isset($_SESSION['admin']) || $_SESSION['admin']!= 1){
        echo '<script>window.location.href = "../index.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="icon" type="image/png" href="assets/img/logo2.png" />
    <title>FlixFeast</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var element = document.getElementById("tvshows");
            element.classList.add("active", "bg-gradient-primary");
        });
    </script>
</head>

<body class="g-sidenav-show dark-version bg-gray-200">

    <?php include("header.php"); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="shows-tb.php">TV Shows
                                table</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add TV Show</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Add TV Show</h6>
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
                        <label for="date">Start Date:</label>
                        <input class="form-control bg-dark" type="date" id="startdate" placeholder="Start Date:" name="startdate">
                    </div>
                    <label>Status:</label><br>
                    <div class="form-group" id="status">

                        <label>
                            <input type="radio" name="status" id="Filming" value="Filming">In Production / Filming
                        </label>
                        <label>
                            <input type="radio" name="status" id="Airing" value="Airing">On Air / Airing
                        </label>
                        <label>
                            <input type="radio" name="status" id="Hiatus" value="Hiatus">Hiatus
                        </label>
                        <label>
                            <input type="radio" name="status" id="Canceled" value="Canceled">Canceled
                        </label>
                        <label>
                            <input type="radio" name="status" id="Ended" value="Ended">Ended
                        </label>
                        <label>
                            <input type="radio" name="status" id="Renewed" value="Renewed">Renewed
                        </label>
                        <label>
                            <input type="radio" name="status" id="Suspended" value="Suspended">Suspended
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <input class="form-control bg-dark" type="text" id="rating" placeholder="Rating:" name="rating">
                    </div>

                    <div class="form-group">
                        <label for="director">Director:</label>
                        <input class="form-control bg-dark" type="text" id="director" placeholder="Director:" name="director">
                    </div>

                    <div class="form-group">
                        <label for="studio">Studio:</label>
                        <input class="form-control bg-dark" type="text" id="studio" placeholder="Studio:" name="studio">
                    </div>


                    <div class="form-group">
                        <label for="cover">Cover Image:</label>
                        <input class="form-control bg-dark" type="text" id="cover" name="cover">
                    </div>

                    <div class="form-group">
                        <label for="trailer">Trailer:</label>
                        <input class="form-control bg-dark" type="text" id="trailer" placeholder="Trailer Link:" name="trailer">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control bg-dark" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000"></textarea>
                    </div>

                    <label>Genres:</label><br>

                    <div class="form-group" id="genres" style="border-radius:10px;">
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Action" value="Action"> Action</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Comedy" value="Comedy"> Comedy</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Documentary" value="Documentary"> Documentary</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Drama" value="Drama"> Drama</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Fantasy" value="Fantasy"> Fantasy</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Horror" value="Horror"> Horror</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Animation" value="Animation"> Animation</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Mystery" value="Mystery"> Mystery</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Romance" value="Romance"> Romance</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Science Fiction" value="Science Fiction"> Science Fiction</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Thriller" value="Thriller"> Thriller</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Family" value="Family"> Family</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Crime" value="Crime"> Crime</label>
                        <label style="display:inline-block; margin-right:10px;"><input type="checkbox" name="genre[]" id="Adventure" value="Adventure"> Adventure</label>
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Submit" name="movie_submit">
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
            // check which form was submitted
            // get the form data
            // $image_name = $_FILES['cover']['name'];
            // $image_temp_name = $_FILES['cover']['tmp_name'];
            // $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            // $img_lc = strtolower($img_ex);
            // $allowed_array = array("jpg", "jpeg", "png");
            // if (in_array($img_lc, $allowed_array)) {
            //     $new_img_name = "Images/Posters/" . $_POST['title'] . "." . $img_lc;
            //     $upload_path = '../' . $new_img_name;
            //     move_uploaded_file($image_temp_name, $upload_path);
            // } else {
            //     echo "Wrong format";
            // }
            $title = new input(mysqli_real_escape_string($conn, $_POST['title']), "title");
            $startdate = new input(mysqli_real_escape_string($conn, $_POST['startdate']), "startdate");
            if (isset($_POST['status'])) {
                $status = new input(mysqli_real_escape_string($conn, $_POST['status']), "status");
            } else {
                $status = new input(NULL, "status");
            }
            $rating = new input(mysqli_real_escape_string($conn, $_POST['rating']), "rating");
            $cover = new input(mysqli_real_escape_string($conn, $_POST['cover']), "cover");
            $trailer = new input(mysqli_real_escape_string($conn, $_POST['trailer']), "trailer");
            $director = new input(mysqli_real_escape_string($conn, $_POST['director']), "director");
            $studio = new input(mysqli_real_escape_string($conn, $_POST['studio']), "studio");
            $description = new input(mysqli_real_escape_string($conn, $_POST['description']), "description");
            $genre = new input(isset($_POST['genre']) ? $_POST['genre'] : [], "genre");
            $inputsTV = [$title, $startdate, $status, $rating, $director, $studio, $cover, $trailer, $description];
            $temp = false;
            for ($i = 0; $i < sizeof($inputsTV); $i++) {
                if (empty($inputsTV[$i]->value)) {
                    echo '<script>document.getElementById("' . $inputsTV[$i]->id . '").style.border="2px solid red";</script>';
                    $temp = true;
                } else {
                    echo '<script>document.getElementById("' . $inputsTV[$i]->id . '").value="' . $inputsTV[$i]->value . '";</script>';
                }
                if (($i == sizeof($inputsTV) - 1) && $temp == true) {
                    echo "<h6 style='text-align:center;'>Please fill out every information about the show!</h6>";
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
            if ($status->value == NULL) {
                echo '<script>document.getElementById("status").style.border="2px solid red";</script>';
                $temp = true;
            } else {
                echo '<script>document.getElementById("' . $status->value . '").checked=true;</script>';
            }
            if ($temp == false) {
                // insert the data into the tvshows table
                $sql = "INSERT INTO content (Title, Date, Status, Rating, Cover, Trailer, Description, Type) VALUES ('$title->value', '$startdate->value', '$status->value', '$rating->value', '$cover->value', '$trailer->value','$description->value', 'TV Show')";
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

                for ($i = 0; $i < sizeof($inputsTV); $i++) {
                    echo '<script>document.getElementById("' . $inputsTV[$i]->id . '").value="' . "" . '";</script>';
                }
                echo '<script>window.location.href = "shows-tb.php";</script>';
            }
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2023 FlixFeast. All rights reserved.</p>
        <p>Made with commitment by BBEÇ.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




</body>

</html>