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
    p{overflow:auto;}
  </style>
</head>


<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../index.php" target="_blank">
        <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
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

  <?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

    if (!isset($_GET['detailsID'])) {
        header("Location:add" . $_GET['type'] . ".php");
    }


    $ID = $_GET['detailsID'];

    if ($_GET['type'] == "Movie") {
        $sql = "SELECT * FROM `movies` WHERE `ID` = $ID";
    } else if ($_GET['type'] == "Show") {
        $sql = "SELECT * FROM `tvshows` WHERE `ID` = $ID";
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  
  ?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                
                <?php
                if($_GET['type']=='Movie'){
                    echo '<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="movies-tb.php">Movie table</a></li>';
                }else if($_GET['type']=='Show'){
                    echo '<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="shows-tb.php">Shows table</a></li>';
                }
                if($_GET['mode'] == "info"){
                    echo '<li class="breadcrumb-item text-sm text-dark active" aria-current="page">'.$row['Title'].'</li>';
                }else if($_GET['mode'] == "edit"){
                    echo '<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="editDetails.php?detailsID='.$row['ID'].'&type='.$_GET['type'].'&mode=info">'.$row['Title'].'</a></li>';
                    echo '<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Editing Details</li>';
                }
                ?>
                
            </ol>
            <h6 class="font-weight-bolder mb-0"><?php echo $_GET['type'];?> info</h6>
            </nav>
        </div>
        </nav>
        <?php
    

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

    if ($_GET['type'] == "Movie" && $_GET['mode'] == "info") {
        echo '
            <div style = "display:flex;margin-left:3%;margin-top:3%;" >
            <img src="'.$row['Cover'].'" alt="'.$row['Title'].'" width="300px" height="447.53px"/>
            <div>
                <div id="viewDetails" style="width:50%;margin-left:5%;">
                    <p id="title" class="details"><b>Title:</b> <br>' . $row['Title'] . '</p>
                    <p id="date" class="details"><b>Date:</b> <br>' . $row['Date'] . '</p>
                    <p id="rating" class="details"><b>Rating:</b> <br>' . $row['Rating'] . '</p>
                    <p id="director" class="details"><b>Director: </b><br>' . $row['Director'] . '</p>
                    <p id="studio" class="details"><b>Studio: </b><br>' . $row['Studio'] . '</p>
                    <p id="cover" class="details" style="word-break: break-all;"><b>Cover: </b><br>' . $row['Cover'] . '</p>
                    <p id="trailer" class="details"><b>Trailer: </b><br>' . $row['Trailer'] . '</p>
                    <p id="description" class="details"><b>Description:</b> <br>' . $row['Description'] . '</p>
                    <p id="genre" class="details"><b>Genre: </b><br>' . $row['Genre'] . '</p>
                    <p id="length" class="details"><b>Length: </b><br>' . $row['Length'] . '</p>
                </div>
                
                <a class="btn btn-warning" href="editDetails.php?detailsID=' . $ID . '&type=Movie&mode=edit" style = "margin-left:5%;">Edit</a>
            </div>
            
            </div>
        ';
    } else if ($_GET['type'] == "Movie" && $_GET['mode'] == "edit") {
        echo '
            <div style = "display:flex; margin-left:3%;margin-top:3%;">
                <img src="'.$row['Cover'].'" alt="'.$row['Title'].'" width="300px" height="447.53px"/>
                <div class="row justify-content-center mt-5" id="movieadd" style="margin-left:3%;">
                    <div class="col-md-6" style="display: flex; justify-content: center;">
                        <form id="movie-add" method="post">
                            <h2>Movie</h2>
                            <input type="hidden" name="addForm" value="submitted">
    
                            <div class="form-group">
                            <label for="title">Title:</label>
                            <input class="form-control" value="'.$row['Title'].'" type="text" id="title" placeholder="Title:" name="title">
                            </div>
                
                            <div class="form-group">
                            <label for="date">Date:</label>
                            <input class="form-control" value="'.$row['Date'].'" type="date" id="date" placeholder="Date:" name="date">
                            </div>
                
                            <div class="form-group">
                            <label for="rating">Rating:</label>
                            <input class="form-control" value="'.$row['Rating'].'" type="text" id="rating" placeholder="Rating:" name="rating">
                            </div>
                
                            <div class="form-group">
                            <label for="director">Director:</label>
                            <input class="form-control" value="'.$row['Director'].'" type="text" id="director" placeholder="Director:" name="director">
                            </div>
                
                            <div class="form-group">
                            <label for="studio">Studio:</label>
                            <input class="form-control" value="'.$row['Studio'].'" type="text" id="studio" placeholder="Studio:" name="studio">
                            </div>
                
                            <div class="form-group">
                            <label for="cover">Cover Link:</label>
                            <input class="form-control" value="'.$row['Cover'].'" type="text" id="cover" placeholder="Cover Link:" name="cover">
                            </div>
                
                            <div class="form-group">
                            <label for="trailer">Trailer Link:</label>
                            <input class="form-control" value="'.$row['Trailer'].'" type="text" id="trailer" placeholder="Trailer Link:" name="trailer">
                            </div>
                
                            <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000">'.$row['Description'].'</textarea>
                            </div>
                
                            <div class="form-group">
                            <label for="genre">Genre:</label>
                            <input class="form-control" value="'.$row['Genre'].'" type="text" id="genre" placeholder="Genre:" name="genre">
                            </div>
                
                            <div class="form-group">
                            <label for="length">Length:</label>
                            <input class="form-control" value="'.$row['Length'].'" type="text" id="length" placeholder="Length:" name="length">
                            </div>
                            <br>
                
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Submit" name="movie_submit">
                            </div>

                            <center>
                                <h6 style="text-align:center;display:none;width:70%;" id="detailsWarning">Please fill out every information about the show!</h6>
                            </center>
                        </form>
                    </div>
                </div>
            </div>';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check which form was submitted

            // get the form data
            $title = new input($_POST['title'], "title");
            $date = new input($_POST['date'], "date");
            $rating = new input($_POST['rating'], "rating");
            $director = new input($_POST['director'], "director");
            $studio = new input($_POST['studio'], "studio");
            $cover = new input($_POST['cover'], "cover");
            $trailer = new input($_POST['trailer'], "trailer");
            $description = new input($_POST['description'], "description");
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
                    echo '<script>document.getElementById("detailsWarning").style.display="inline";</script>';
                }
            }
            if ($temp == false) {
                // edit the data in the movies table
                $sql = "UPDATE movies SET Title=?, Date=?, Rating=?, Director=?, Studio=?, Trailer=?, Description=?, Cover=?, Genre=?, Length=? WHERE ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssssssssdd", $title->value, $date->value, $rating->value, $director->value, $studio->value, $trailer->value, $description->value, $cover->value, $genre->value, $length->value, $ID);
                mysqli_stmt_execute($stmt);
                echo '<script>window.location.href = "editDetails.php?detailsID=' . $ID . '&type=Movie&mode=info";</script>';
            }
        }
    } else if ($_GET['type'] == "Show" && $_GET['mode'] == "info") {
        echo '
            <div style = "display:flex;margin-left:3%;margin-top:3%;" >
            <img src="'.$row['Cover'].'" alt="'.$row['Title'].'" width="300px" height="447.53px"/>
            <div>
                <div id="viewDetails" style="width:50%;margin-left:5%;">
                    <p id="title" class="details"><b>Title: </b><br>' . $row['Title'] . '</p>
                    <p id="date" class="details"><b>Start Date: </b><br>' . $row['StartDate'] . '</p>
                    <p id="date" class="details"><b>Status: </b><br>' . $row['Status'] . '</p>
                    <p id="rating" class="details"><b>Rating: </b><br>' . $row['Rating'] . '</p>
                    <p id="director" class="details"><b>Director: </b><br>' . $row['Director'] . '</p>
                    <p id="studio" class="details"><b>Studio: </b><br>' . $row['Studio'] . '</p>
                    <p id="cover" class="details" style="word-break: break-all;"><b>Cover: </b><br>' . $row['Cover'] . '</p>
                    <p id="trailer" class="details"><b>Trailer: </b><br>' . $row['Trailer'] . '</p>
                    <p id="trailer" class="details"><b>Description: </b><br>' . $row['Description'] . '</p>
                    <p id="genre" class="details"><b>Genre: </b><br>' . $row['Genre'] . '</p>
                </div>
                <a class="btn btn-warning" href="editDetails.php?detailsID=' . $ID . '&type=Show&mode=edit" style = "margin-left:5%;">Edit</a>
            </div>
            
            </div>
        ';
    } else if ($_GET['type'] == "Show" && $_GET['mode'] == "edit") {
        echo '
            <div style = "display:flex;margin-left:3%;margin-top:3%;" >
                <img src="'.$row['Cover'].'" alt="'.$row['Title'].'" width="300px" height="447.53px"/>
                <div class="row justify-content-center mt-5" id="movieadd" style="margin-left:3%;">
                    <div class="col-md-6" style="display: flex; justify-content: center;">
                        <form id="show-add" method="post">
                            <h2>TV Show</h2>
                            <input type="hidden" name="addForm" value="submitted">

                            <label for="title">Title:</label>
                            <input class="form-control" value="'.$row['Title'].'" type="text" id="title" placeholder="Title" name="title"><br>

                            <label for="startdate">Start Date:</label>
                            <input class="form-control" value="'.$row['StartDate'].'" type="date" id="startdate" placeholder="Start Date" name="startdate"><br>

                            <label for="status">Status:</label>
                            <input class="form-control" value="'.$row['Status'].'" type="text" id="status" placeholder="Status" name="status"><br>

                            <label for="rating">Rating:</label>
                            <input class="form-control" value="'.$row['Rating'].'" type="text" id="rating" placeholder="Rating" name="rating"><br>

                            <label for="director">Director:</label>
                            <input class="form-control" value="'.$row['Director'].'" type="text" id="director" placeholder="Director" name="director"><br>

                            <label for="studio">Studio:</label>
                            <input class="form-control" value="'.$row['Studio'].'" type="text" id="studio" placeholder="Studio" name="studio"><br>

                            <label for="cover">Cover Link:</label>
                            <input class="form-control" value="'.$row['Cover'].'" type="text" id="cover" placeholder="Cover Link" name="cover"><br>

                            <label for="trailer">Trailer Link:</label>
                            <input class="form-control" value="'.$row['Trailer'].'" type="text" id="trailer" placeholder="Trailer Link" name="trailer"><br>

                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000">'.$row['Description'].'</textarea><br>

                            <label for="genre">Genre:</label>
                            <input class="form-control" value="'.$row['Genre'].'" type="text" id="genre" placeholder="Genre:" name="genre"><br>
                            <br>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Submit" name="movie_submit">
                            </div>

                            <center>
                                <h6 style="text-align:center;display:none;width:70%;" id="detailsWarning">Please fill out every information about the show!</h6>
                            </center>
                        </form>
                        
                    </div>
                    
                </div>
            ';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $description = new input($_POST['description'], "description");
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
                    echo '<script>document.getElementById("detailsWarning").style.display="inline";</script>';
                }
            }
            if ($temp == false) {
                // edit the data in the shows table
                $sql = "UPDATE tvshows SET Title=?, StartDate=?,Status=?, Rating=?, Director=?, Studio=?, Cover=?, Trailer=?,Description=?, Genre=? WHERE ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssssssssssd", $title->value, $startdate->value, $status->value, $rating->value, $director->value, $studio->value, $cover->value, $trailer->value, $description->value, $genre->value, $ID);
                mysqli_stmt_execute($stmt);
                echo '<script>window.location.href = "editDetails.php?detailsID=' . $ID . '&type=Show&mode=info";</script>';
            }
        }
    } else if ($_GET['type'] == "Blogs" && $_GET['mode'] == "info") {
        echo '
            <div style = "display:flex;" >
            <img src="' . $row['Cover'] . '" width = 350px height = 400px>
            <div>
                <div id="viewDetails">
                    <p id="title" class="details">Title: <br>' . $row['Title'] . '</p>
                    <p id="id" class="details">Start Date: <br>' . $row['AuthorID'] . '</p>
                    <p id="content" class="details">Status: <br>' . $row['Content'] . '</p>
                    <p id="image" class="details">Rating: <br>' . $row['Image'] . '</p>
                </div>
                <a href="editDetails.php?detailsID=' . $ID . '&type=Blogs&mode=edit"><button style = "margin-left:2%;" onclick="edit()" href="" id="editBtn">Edit</button></a>
            </div>
            
            </div>
        ';
    } else if ($_GET['type'] == "Show" && $_GET['mode'] == "edit") {
        echo '
            <div style = "display:flex;" >
            <img src="' . $row['Cover'] . '" width = 350px>
            <div>
                <form id="movie-edit" method="post">
					<label for="title">Title:</label><br>
                    <input class="form-control" value="' . $row['Title'] . '" type="text" id="title" placeholder="Title:" name="title"><br>

                    <label for="id">Author ID:</label><br>
                    <input class="form-control" value="' . $row['AuthorID'] . '" type="text" id="id" placeholder="Author ID:" name="id"><br>

                    <label for="date">Content: </label><br>
                    <textarea class="form-control" value="' . $row['Content'] . '" id="content" placeholder="Content:" name="content"></textarea><br>

                    <label for="rating">Image URL: </label><br>
                    <input class="form-control" value="' . $row['Image'] . '" type="text" id="image" placeholder="Rating:" name="image"><br>


                    <input class="form-control submit" type="submit" value="Submit" name="movie_submit">
				</form>';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check which form was submitted
            // get the form data
            $title = new input($_POST['title'], "title");
            $id = new input($_POST['id'], "id");
            $content = new input($_POST['content'], "content");
            $image = new input($_POST['image'], "image");

            $inputsBlogs = [$title, $id, $content, $image];
            $temp = false;
            for ($i = 0; $i < sizeof($inputsBlogs); $i++) {
                if (empty($inputsBlogs[$i]->value)) {
                    echo '<script>document.getElementById("' . $inputsBlogs[$i]->id . '").style.border="2px solid red";</script>';
                    $temp = true;
                } else {
                    echo '<script>document.getElementById("' . $inputsBlogs[$i]->id . '").value="' . $inputsBlogs[$i]->value . '";</script>';
                }
                if (($i == sizeof($inputsBlogs) - 1) && $temp == true) {
                    echo "<h3>Please fill out every information about the show!</h3>";
                }
            }
            if ($temp == false) {
                // edit the data in the shows table
                $sql = "UPDATE blogs SET Title=?, AuthorID=?,Content=?, Image=? WHERE ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssssssssssd", $title->value, $id->value, $content->value, $image->value, $ID);
                mysqli_stmt_execute($stmt);
                echo '<script>window.location.href = "editDetails.php?detailsID=' . $ID . '&type=Blogs&mode=info";</script>';
            }
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