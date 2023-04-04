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
            background-color: #fff;
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
            var element = document.getElementById("blogs");
            element.classList.add("active", "bg-gradient-primary");
        });
    </script>
</head>

<body class="g-sidenav-show  bg-gray-200">

    <?php include("header.php"); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Movies table</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Movies table</h6>
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
                                <h6 class="text-white text-capitalize ps-3">Movie table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
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


                                echo '<table class="table align-items-center mb-0" width="300px">
				<tr>
                    <th>Image</th>
					<th>Title</th>
					<th>ID</th>
					<th>Content</th>
					<th>AuthorID</th>
					<th>CreatedAt</th>
					<th>UpdatedAt</th>
                
					<th></th>
				</tr>';
                                $sql = "SELECT * FROM `blogs`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '
				  			<tr>
                <td><img src="' . $row['Image'] . '" height="70px" ></td>
								<td><a href="editDetails.php?detailsID=' . $row['ID'] . '&type=Movie&mode=info">' . $row['Title'] . '</a></td>
								<td>' . $row['ID'] . '</td>
								<td>' . substr($row['Content'], 0, 40) . '</td>
								<td>' . $row['AuthorID'] . '</td>
								<td>' . $row['CreatedAt'] . '</td>
								<td>' . $row['UpdatedAt'] . '</td>
								<td><a href="blogs-tb.php?removeID=' . $row['ID'] . '&mode=remove" class = "btn btn-primary text-white">x</a></td>
				  			</tr>
					';
                                }
                                echo '</table>';
                                if (isset($_GET['mode'])) {
                                    $idRemove = $_GET['removeID'];
                                    $sql = "SELECT * FROM `movies` WHERE `ID` = $idRemove";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    echo '<form id="movie-remove" method="post">
					<div class="overlay">
  						<div class="modal">
    						<input type="hidden" name="popForm" value="submitted">
                <p>Are you sure you want to remove "' . $row['Title'] . '" from our database?</p>
                <div class="modal-buttons">
							    <a href="blogs-tb.php?removeID=' . $_GET['removeID'] . '&mode=remove&confirm=1" class="btn btn-primary text-white" style="margin:2%;color:white;">Yes</a>
						      <a href="blogs-tb.php" class="btn btn-success text-white" style="margin:2%;">No</a></button>
                </div>
  						</div>
					</div>
					
					</form>';
                                }
                                if (isset($_GET['confirm'])) {
                                    $removeID = $_GET['removeID'];
                                    $sql = "DELETE FROM `blogs` WHERE `blogs`.`ID` = $removeID";
                                    mysqli_query($conn, $sql);
                                    echo '<script>window.location.href = "blogs-tb.php";</script>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="add()">Add a
                Blog</button>

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
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
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
            window.location.href = "addBlog.php";
        }
        const overlay = document.querySelector('.overlay');

        // Disable scrolling on the background content
        document.body.style.overflow = 'hidden';

        // Add a click event listener to the overlay
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                // Remove the overlay when it's clicked
                overlay.remove();
                window.location.href = "blogs-tb.php";

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