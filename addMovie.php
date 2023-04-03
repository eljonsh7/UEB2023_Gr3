<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FlixFeast</title>
    <!--     Fonts and icons     -->
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
    body{overflow-x: hidden;}
  </style>
</head>


<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="movies-tb.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Movies table</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="shows-tb.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tv Shows table</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="sign-up.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="movies-tb.php">Movie table</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Movie</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Add Movie</h6>
            </nav>
        </div>
        </nav>
  <div class="row justify-content-center mt-5" id="movieadd">
        <div class="col-md-6" style="display: flex; justify-content: center;">
          <form id="movie-add" method="post">
            <h2>Movie</h2>
            <input type="hidden" name="addForm" value="submitted">

            <div class="form-group">
              <label for="title">Title:</label>
              <input class="form-control" type="text" id="title" placeholder="Title:" name="title">
            </div>

            <div class="form-group">
              <label for="date">Date:</label>
              <input class="form-control" type="date" id="date" placeholder="Date:" name="date">
            </div>

            <div class="form-group">
              <label for="rating">Rating:</label>
              <input class="form-control" type="text" id="rating" placeholder="Rating:" name="rating">
            </div>

            <div class="form-group">
              <label for="director">Director:</label>
              <input class="form-control" type="text" id="director" placeholder="Director:" name="director">
            </div>

            <div class="form-group">
              <label for="studio">Studio:</label>
              <input class="form-control" type="text" id="studio" placeholder="Studio:" name="studio">
            </div>

            <div class="form-group">
              <label for="cover">Cover Link:</label>
              <input class="form-control" type="text" id="cover" placeholder="Cover Link:" name="cover">
            </div>

            <div class="form-group">
              <label for="trailer">Trailer Link:</label>
              <input class="form-control" type="text" id="trailer" placeholder="Trailer Link:" name="trailer">
            </div>

            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000"></textarea>
            </div>

            <div class="form-group">
              <label for="genre">Genre:</label>
              <input class="form-control" type="text" id="genre" placeholder="Genre:" name="genre">
            </div>

            <div class="form-group">
              <label for="length">Length:</label>
              <input class="form-control" type="text" id="length" placeholder="Length:" name="length">
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
                echo "<h6 style='text-align:center;'>Please fill out every information about the movie!</h6>";
            }
        }
        if ($temp == false) {
            // insert the data into the movies table
            $sql = "INSERT INTO movies (Title, Date, Rating, Director, Studio, Trailer, Description, Cover, Genre, Length) VALUES ('$title->value', '$date->value', '$rating->value', '$director->value', '$studio->value',  '$trailer->value','$description->value','$cover->value', '$genre->value', '$length->value')";
            mysqli_query($conn, $sql);
            for ($i = 0; $i < sizeof($inputs); $i++) {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").value="' . "" . '";</script>';
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