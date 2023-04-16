<?php

include('connection.php');
$results_per_page = 4;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;
if (isset($_GET['genre'])) {
    $genreGET = $_GET['genre'];
    $sql = "SELECT content.Trailer,content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'movie' and Genre like '%{$genreGET}%'
    GROUP BY content.ID
    LIMIT $start_from, $results_per_page;";
    $sql1 = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'movie' and Genre like '%{$genreGET}%'
    GROUP BY content.ID;";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $results_num = mysqli_num_rows($result1);
    $pages = ceil($results_num / $results_per_page);
} else {
    $sql = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'movie'
    GROUP BY content.ID
    LIMIT $start_from, $results_per_page;";
    $sql1 = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'movie'
    GROUP BY content.ID;";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $results_num = mysqli_num_rows($result1);
    $pages = ceil($results_num / $results_per_page);
}

?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
    <!-- Main style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        .btn {
            background-color: #3a444f;
            border-width: 0;
        }

        .btn:hover,
        .btn:active {
            background-color: transparent;
            border-width: 3px;
            border-color: white;
        }

        .movies {

            color: #00d9e1;
        }

        .filmi {
            align-items: center;
            width: 221px;
            height: 330px;
            border-radius: 5%;
            margin: 0 auto;
            overflow: hidden;
        }

        .imgContentPortfolio {
            transition: 0.9s;
            position: relative;
        }

        .imgContentPortfolio:hover {
            transform: scale(1.2);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        #imgContent {
            width: 221px;
            height: 330px;
        }

        @media screen and (min-width: 576px) {
            .grid-container {
                grid-template-columns: repeat(2, minmax(250px, 1fr));
            }
        }

        @media screen and (min-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(2, minmax(250px, 1fr));
            }
        }

        @media screen and (min-width: 992px) {
            .grid-container {
                grid-template-columns: repeat(3, minmax(250px, 1fr));
            }

        }

        @media screen and (min-width: 1200px) {
            .grid-container {
                grid-template-columns: repeat(4, minmax(250px, 1fr));
            }

        }
    </style>
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- header section start -->
    <?php include("header.php");

    ?>

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Movies Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- portfolio section start -->
    <section class="portfolio-area pt-60">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="portfolio-menu">
                        <ul>
                            <li data-filter="*" <?php if (!isset($_GET['genre']) || $_GET['genre'] === '') {
                                                    echo 'class="active"';
                                                } ?>>
                                <a href="movies.php">All</a>
                            </li>
                            <li data-filter=".Action" <?php if (isset($_GET['genre']) && $_GET['genre'] === 'action') {
                                                            echo 'class="active"';
                                                        } ?>>
                                <a href="movies.php?genre=action">Action</a>
                            </li>
                            <li data-filter=".Drama" <?php if (isset($_GET['genre']) && $_GET['genre'] === 'drama') {
                                                            echo 'class="active"';
                                                        } ?>>
                                <a href="movies.php?genre=drama">Drama</a>
                            </li>
                            <li data-filter=".Crime" <?php if (isset($_GET['genre']) && $_GET['genre'] === 'crime') {
                                                            echo 'class="active"';
                                                        } ?>>
                                <a href="movies.php?genre=crime">Crime</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr />
            <div class="grid-container" id="contentContainer">

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['Title'];
                    $poster = $row['Cover'];
                    $id = $row['ID'];
                    $type = $row['Type'];
                    $genre = $row['Genre'];
                    echo '<div class="contentDiv' . $genre . '" style="margin-top:15%;">
                    <div>
                        <div  class = "filmi">
                            <center>
                                <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                    <img id="imgContent" src="' . $poster . '" alt="portfolio" class="imgContentPortfolio" style="border-radius:15px;"/>
                                </a>
                            </center>
                        </div>
                        <div class="portfolio-content">
                            <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                <h5 style = "text-align:center;">' . $title . '</h5>
                            </a>
                        </div>
                    </div>
                </div>';
                }


                ?>
            </div>
        </div>
    </section><!-- portfolio section end -->
    <?php
    if ($pages > 1) {
        echo '<section>
        <center>
             <div class="container">';

        if (isset($_GET['genre'])) {
            for ($i = 1; $i <= $pages; $i++) {
                echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
                if ($i != $page) {
                    echo 'btn-floating"';
                } else {
                    echo '"';
                }
                echo 'href="movies.php?page=' . $i . '&genre=' . $genreGET . '">' . $i . '</a>';
            }
        } else {
            for ($i = 1; $i <= $pages; $i++) {
                echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
                if ($i != $page) {
                    echo 'btn-floating"';
                } else {
                    echo '"';
                }
                echo 'href="movies.php?page=' . $i . '">' . $i . '</a>';
            }
        }
        echo '</div>
        <center>
         </section>';
    } ?>
    <!-- video section start -->
    <section class="video ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="video-slider mt-20">
                        <div class="video-area">
                            <img src="assets/img/video/video2.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video3.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video4.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video5.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video2.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video3.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video4.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="video-area">
                            <img src="assets/img/video/video5.png" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- video section end -->
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

    <script type="text/javascript">
        function checkAjax(Genre, Page) {
            $.ajax({
                url: 'sortGenre.php?type=movie&genre=' + Genre + '&page=' + Page,
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#contentContainer').html(data);
                }

            });
        };
    </script>
</body>

</html>