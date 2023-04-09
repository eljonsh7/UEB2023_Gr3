<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="icon" type="image/png" href="assets/img/logo2.png" />
    <title>FlixFeast</title>
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
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
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
            $title = new input($_POST['title'], "title");
            $startdate = new input($_POST['startdate'], "startdate");
            $status = new input($_POST['status'], "status");
            $rating = new input($_POST['rating'], "rating");
            $director = new input($_POST['director'], "director");
            $studio = new input($_POST['studio'], "studio");
            $cover = new input($_POST['cover'], "cover");
            $trailer = new input($_POST['trailer'], "trailer");
            $description = new input(mysqli_real_escape_string($conn, $_POST['description']), "description");
            $genre = new input($_POST['genre'], "genre");
            $inputsTV = [$title, $startdate, $status, $rating, $director, $studio, $cover, $trailer, $description, $genre];
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
            if ($temp == false) {
                // insert the data into the tvshows table
                $sql = "INSERT INTO tvshows (Title, StartDate, Status, Rating, Director, Studio, Cover, Trailer, Description, Genre, Type) VALUES ('$title->value', '$startdate->value', '$status->value', '$rating->value', '$director->value', '$studio->value', '$cover->value', '$trailer->value','$description->value', '$genre->value', 'TV Show')";
                mysqli_query($conn, $sql);
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