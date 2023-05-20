<?php

session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    echo '<script>window.location.href = "../index.php";</script>';
}
//get the number of users from database
include("connection.php");
$sql = "SELECT count(*) as num_users FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_users = $row['num_users'];


//get the number of movies from database
$sql = "SELECT count(*) as num_movies FROM content WHERE type = 'movie'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_movies = $row['num_movies'];

//get the number of series from database
$sql = "SELECT count(*) as num_series FROM content WHERE type = 'tv show'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_series = $row['num_series'];

//find the number of blogs from database
$sql = "SELECT count(*) as num_blogs FROM blogs";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_blogs = $row['num_blogs'];

//percentage of movies and series
$percentage_movies = round(($num_movies / ($num_movies + $num_series)) * 100);
$percentage_series = round(($num_series / ($num_movies + $num_series)) * 100);

//get the number of comments from database
$sql = "SELECT count(*) as num_comments FROM comments";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_comments = $row['num_comments'];

//compare number of blogs this week and last week
$sql = "SELECT count(*) as num_blogs FROM blogs WHERE createdat >= DATE(NOW()) - INTERVAL 7 DAY";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_blogs_this_week = $row['num_blogs'];

$sql = "SELECT count(*) as num_blogs FROM blogs WHERE createdat >= DATE(NOW()) - INTERVAL 14 DAY AND createdat < DATE(NOW()) - INTERVAL 7 DAY";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num_blogs_last_week = $row['num_blogs'];

if ($num_blogs_last_week == 0) {
    $percentage_blogs = 100;
} else {
    $percentage_blogs = round((($num_blogs_this_week - $num_blogs_last_week) / $num_blogs_last_week) * 100);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo2.png">
    <title>Dashboard</title>
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
    <script defer data-site="http://localhost/Projekti/UEB2023_Gr3/index.php" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var element = document.getElementById("dashboard");
            element.classList.add("active", "bg-gradient-primary");
        });
    </script>
</head>


<body class="g-sidenav-show dark-version bg-gray-200">

    <?php include("header.php"); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape d-flex bg-gradient-dark align-items-center shadow-dark justify-content-center  border-radius-xl mt-n4 position-absolute">
                                <img src="../assets/img/users.png" class="col-sm-7 centered-element" alt="">
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                <h4 class="mb-0"><?php echo $num_users ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <!-- <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last
                                week</p>
                        </div> -->
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary d-flex align-items-center justify-content-center shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <img src="../assets/img/clapperboard_192px.png" class="col-sm-7" alt="">
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Movies</p>
                                <h4 class="mb-0"><?php echo $num_movies ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $percentage_movies ?>%</span>
                                of
                                all content</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success d-flex align-items-center justify-content-center shadow-success text-center border-radius-xl mt-n4 position-absolute">

                                <img src="../assets/img/tv show.png" class="col-sm-7" alt="">
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's TV Shows</p>
                                <h4 class="mb-0"> <?php echo $num_series ?> </h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $percentage_series ?>%</span>
                                of all content</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info d-flex align-items-center shadow-info justify-content-center text-center border-radius-xl mt-n4 position-absolute">
                                <img src="../assets/img/blogs.png" class="col-sm-7 centered-element" alt="">
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Blogs Posted</p>
                                <h4 class="mb-0"><?php echo $num_blogs ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+<?php echo $percentage_blogs ?>%</span>
                                than
                                last week</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-genres" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0">Genre Content Count</h6>
                            <p class="text-sm">Number of Content per Genre</p>
                            <hr class="dark horizontal">
                            <div class="chart-data">
                                <?php
                                // Assuming you have a database connection $conn

                                // Query to fetch genre and content count
                                $sql = "SELECT g.Genre, COUNT(c.ID) AS content_count
                            FROM genre g
                            LEFT JOIN content c ON g.ID = c.ID
                            GROUP BY g.Genre";
                                $result = mysqli_query($conn, $sql);

                                // Create arrays to store genre and content count
                                $genres = [];
                                $contentCounts = [];

                                // Loop through the query results and populate the arrays
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $genres[] = $row['Genre'];
                                    $contentCounts[] = $row['content_count'];
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // krijimi i chart-it te pare mbi numrin e permbajtjeve per nje zhaner
                var ctx = document.getElementById('chart-genres').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($genres); ?>,
                        datasets: [{
                            label: 'Content Count',
                            data: <?php echo json_encode($contentCounts); ?>,
                            backgroundColor: '#caf0f8',
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: "#fff",
                                }
                            },
                            y: {
                                grid: {
                                    display: true
                                },
                                ticks: {
                                    color: "#fff",
                                }
                            }
                        }
                    }
                });
            </script>



            <div class="mt-4 row">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-studios" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0">Popular Studios</h6>
                            <p class="text-sm">Number of Content per Studio</p>
                            <hr class="dark horizontal">
                            <?php

                            // Query to fetch studio and content count
                            $sql = "SELECT s.Studio, COUNT(c.ID) AS content_count
                        FROM studio s
                        LEFT JOIN content c ON s.ID = c.ID
                        GROUP BY s.Studio
                        ORDER BY COUNT(c.ID) DESC";
                            $result = mysqli_query($conn, $sql);

                            // Fetch the top 5 popular studios
                            $chartLabels = [];
                            $chartData = [];
                            $counter = 0;

                            while ($row = mysqli_fetch_assoc($result)) {
                                $studio = $row['Studio'];
                                $contentCount = $row['content_count'];
                                $chartLabels[] = $studio;
                                $chartData[] = $contentCount;
                                $counter++;

                                // Display only the top 5 studios
                                if ($counter >= 5) {
                                    break;
                                }
                            };
                            ?>
                            <script>
                                // Krijimi i charti-t te deyte per numrin e permbajtjeve per studio

                                document.addEventListener("DOMContentLoaded", function() {
                                    // Retrieve the chart canvas element
                                    var ctx = document.getElementById("chart-studios").getContext("2d");

                                    // Define the chart data and options
                                    var chartData = {
                                        labels: <?php echo json_encode($chartLabels); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($chartData); ?>,
                                            backgroundColor: [
                                                "#8ecae6",
                                                "#219ebc",
                                                "#023047",
                                                "#023047",
                                                "#ffb703"
                                            ],
                                            borderWidth: 0
                                        }]
                                    };

                                    var chartOptions = {
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                display: false
                                            }
                                        },
                                        scales: {
                                            x: {
                                                ticks: {
                                                    color: "#fff", // Set the label color to white
                                                },
                                            },
                                            y: {
                                                ticks: {
                                                    color: "#fff", // Set the label color to white
                                                },
                                            },
                                        },
                                    };

                                    // Create and render the chart
                                    new Chart(ctx, {
                                        type: "bar",
                                        data: chartData,
                                        options: chartOptions
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-lg-4 mt-4 mb-3">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Completed Tasks</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/js2/core/popper.min.js"></script>
    <script src="assets/js2/core/bootstrap.min.js"></script>
    <script src="assets/js2/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js2/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js2/plugins/chartjs.min.js"></script>


    <script src="assets/js2/material-dashboard.min.js?v=3.0.5"></script>
</body>

</html>