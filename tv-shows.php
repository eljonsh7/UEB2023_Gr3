<?php

include('connection.php');

$sql = "SELECT * FROM `content` where type = 'tv show'";

$result = mysqli_query($conn, $sql);
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
    .tv {
        color: #00d9e1;
    }

    .filmi {
        align-items: center;
        width: 221px;
        height: 330px;
        border-radius: 15px;
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
    <?php include("header.php"); ?>

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>TV Shows Page</h1>
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
                            <li data-filter="*" class="active" onclick="checkAjax('All')">All</li>
                            <li data-filter=".Crime" onclick="checkAjax('Crime')">Crime</li>
                            <li data-filter=".Drama" onclick="checkAjax('Drama')">Drama</li>
                            <li data-filter=".Nature" onclick="checkAjax('Documentary')">Documentary</li>
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
    function checkAjax(Genre) {
        $.ajax({
            url: 'sortGenre.php?type=tvshow&genre=' + Genre,
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