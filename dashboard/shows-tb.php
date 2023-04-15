<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Dashboard
    </title>
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
    <style>
    .table td,
    .table th {
        white-space: normal;
    }

    .form-control {

        background-color: #2e3757;
    }

    .container {
        margin: 0;
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
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 30%;
        height: 25%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        background-color: #344767;
        padding: 20px;
        border-radius: 7px;
    }

    .modal p {
        margin-top: 0;
        margin-bottom: 1em;
        text-align: center;
    }

    .modal-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 5%;
        width: 60%;
    }

    .modal-buttons a {
        width: 30%;
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
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">TV Shows table</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">TV Shows table</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">TV Shows table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <?php
                                // connect to the database

                                include('connection.php');
                                if (isset($_GET["page"])) {
                                    $page = $_GET["page"];
                                } else {
                                    $page = 1;
                                }
                                $results_per_page = 2;
                                $start_from = ($page - 1) * $results_per_page;
                                if (isset($_GET['search'])) {
                                    $search = $_GET['search'];
                                    $sql = "SELECT * FROM `content` WHERE type = 'tv show' and Title like '%{$search}%' LIMIT $start_from, $results_per_page";
                                    $sql1 = "SELECT * FROM `content` WHERE type = 'tv show' and Title like '%{$search}%'";
                                    $result = mysqli_query($conn, $sql);
                                    $result1 = mysqli_query($conn, $sql1);
                                    $results_num = mysqli_num_rows($result1);
                                    $pages = ceil($results_num / $results_per_page);
                                } else {
                                    $sql = "SELECT * FROM `content` WHERE type = 'tv show' limit $start_from, $results_per_page";
                                    $sql1 = "SELECT * FROM `content` WHERE type = 'tv show'";
                                    $result = mysqli_query($conn, $sql);
                                    $result1 = mysqli_query($conn, $sql1);
                                    $results_num = mysqli_num_rows($result1);
                                    $pages = ceil($results_num / $results_per_page);
                                }


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

                                echo '<form action="shows-tb.php?page=' . $page . '" method="get" class="form-flex" style="display: flex;" onsubmit="return addSearchTermToAction()">
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search for tv shows...">
                                    <input type="hidden" name="page" value="' . $page . '">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Go</button>
                            </form>';


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
                                        $sql = "INSERT INTO content (Title, Date, Rating, Director, Studio, Trailer, Description, Cover, Genre, Length) VALUES ('$title->value', '$date->value', '$rating->value', '$director->value', '$studio->value',  '$trailer->value','$description->value','$cover->value', '$genre->value', '$length->value')";
                                        mysqli_query($conn, $sql);
                                        for ($i = 0; $i < sizeof($inputs); $i++) {
                                            echo '<script>document.getElementById("' . $inputs[$i]->id . '").value="' . "" . '";</script>';
                                        }
                                    }
                                }

                                echo '<table class="table align-items-center mb-0" width="300px">
				<tr>
          <th>Cover</th>
					<th>Title</th>
					<th>Started</th>
                    <th>Status</th>
					<th>Rating</th>
					<th>Director</th>
					<th>Studio</th>
					<th>Trailer</th>
					<th>Description</th>
					<th>Genre</th>
					<th></th>
				</tr>';

                                while ($row = mysqli_fetch_array($result)) {
                                    echo '
                    <tr>
                        <td><img src="' . $row['Cover'] . '" width="70px" height="94.5px"></td>
                        <td><a href="editDetails.php?detailsID=' . $row['ID'] . '&type=Show&mode=info">' . $row['Title'] . '</a></td>
                        <td>' . $row['Date'] . '</td>
                        <td>' . $row['Status'] . '</td>
                        <td>' . $row['Rating'] . '</td>
                        <td>' . $row['Director'] . '</td>
                        <td>' . $row['Studio'] . '</td>
                        <td>' . substr($row['Trailer'], 0, 30) . '</td>
                        <td>' . substr($row['Description'], 0, 40) . '</td>
                        <td>' . $row['Genre'] . '</td>
                        <td><a href="shows-tb.php?removeID=' . $row['ID'] . '&mode=remove" class = "btn btn-primary text-white">x</a></td>
                    </tr>';
                                }
                                echo '</table>';
                                if (isset($_GET['mode'])) {
                                    $idRemove = $_GET['removeID'];
                                    $sql = "SELECT * FROM `content` WHERE `ID` = $idRemove";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    echo '<form id="movie-remove" method="post">
					<div class="overlay">
            <div class="modal">
              <input type="hidden" name="popForm" value="submitted">
              <p>Are you sure you want to remove "' . $row['Title'] . '" from our database?</p>
              <div class="modal-buttons">
                <a href="shows-tb.php?removeID=' . $_GET['removeID'] . '&mode=remove&confirm=1" class="btn btn-primary text-white" style="margin:2%;color:white;">Yes</a>
                <a href="shows-tb.php" class="btn btn-success text-white" style="margin:2%;">No</a></button>
              </div>
            </div>
					</div>
					
					</form>';
                                }
                                if (isset($_GET['confirm'])) {
                                    $removeID = $_GET['removeID'];
                                    $sql = "DELETE FROM `content` WHERE `tvshows`.`ID` = $removeID";
                                    mysqli_query($conn, $sql);
                                    echo '<script>window.location.href = "shows-tb.php";</script>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            echo '<section>
                                <div class="container">';

            if ($pages > 1) {
                if (isset($_GET['search'])) {

                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
                        if ($i != $page) {
                            echo 'btn-floating"';
                        } else {
                            echo '"';
                        }
                        echo 'href="shows-tb.php?page=' . $i . '&search=' . $search . '">' . $i . '</a>';
                    }
                } else {
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
                        if ($i != $page) {
                            echo 'btn-floating"';
                        } else {
                            echo '"';
                        }
                        echo 'href="shows-tb.php?page=' . $i . '">' . $i . '</a>';
                    }
                }
            }
            echo '</div>
                            </section>';
            ?>
            <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="add()">Want to
                add a TV Show?</button>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart"></i> by BBEÇ
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js2/core/popper.min.js"></script>
    <script src="assets/js2/core/bootstrap.min.js"></script>
    <script src="assets/js2/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js2/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function add() {
        window.location.href = "addShow.php";
    }
    const overlay = document.querySelector('.overlay');

    // Disable scrolling on the background content
    document.body.style.overflow = 'hidden';

    // Add a click event listener to the overlay
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            // Remove the overlay when it's clicked
            overlay.remove();
            window.location.href = "shows-tb.php";

            // Enable scrolling on the background content
            document.body.style.overflow = '';
        }
    });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js2/material-dashboard.min.js?v=3.0.5"></script>
</body>

</html>