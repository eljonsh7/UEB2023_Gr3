<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    echo '<script>window.location.href = "../index.php";</script>';
}

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    include('../Services/notify.php');
}
?>
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
    <link rel="stylesheet" href="style.css">
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




    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 auto;
            width: 100%;
        }
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById("questions");
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Questions Table</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Questions table</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-none border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Questions table</h6>
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
                                $results_per_page = 8;
                                $start_from = ($page - 1) * $results_per_page;
                                $sql = "SELECT ID,title,question
                                    FROM faq
                                    GROUP BY ID
                                    limit $start_from, $results_per_page;";
                                $sql1 = "SELECT ID,title,question
                                    FROM faq
                                    GROUP BY ID";
                                $result = mysqli_query($conn, $sql);
                                $result1 = mysqli_query($conn, $sql1);
                                $results_num = mysqli_num_rows($result1);
                                $pages = ceil($results_num / $results_per_page);



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
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Question</th>
                                </tr>';



                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '
                                                                    <tr>
                                                                        <td><a href="answerQuestion.php?detailsID=' . $row['ID'] . '">' . $row['ID'] . '</a></td>
                                                                        <td>' . $row['title'] . '</td>
                                                                        <td>' . $row['question'] . '</td>
                                                                    </tr>
                                                                    ';
                                    }
                                    echo '
                                                                </table>';
                                } else {
                                    echo '<td colspan="3" style="text-align:center;">There is no questions to be answered!</td></table>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($pages > 1) {
                echo '<section>
             <div class="container">';
                for ($i = 1; $i <= $pages; $i++) {
                    echo '<a style = "margin-right: 5px;" class = "btn btn-primary shadow-none btn-lg';
                    if ($i != $page) {
                        echo 'btn-floating"';
                    } else {
                        echo '"';
                    }
                    echo 'href="movies-tb.php?page=' . $i . '">' . $i . '</a>';
                }
                echo '</div>
         </section>';
            }
            ?>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart"></i> by BEBEÇ
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
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
        window.location.href = "addMovie.php";
    }
    const overlay = document.querySelector('.overlay');

    // Disable scrolling on the background content
    document.body.style.overflow = 'hidden';

    // Add a click event listener to the overlay
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            // Remove the overlay when it's clicked
            overlay.remove();
            window.location.href = "movies-tb.php";

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