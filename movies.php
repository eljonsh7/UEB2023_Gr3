<?php

include('Services/connection.php');
$searchCondition = "";
$type = "'movie'";
include('Services/pagination.php');

session_start();
$stmt1 = $conn->prepare("SELECT * FROM watchlist WHERE User_ID = ?");
$stmt1->bind_param("d", $_SESSION['user']);
$stmt1->execute();
$result1 = $stmt1->get_result();

$content_ids = array();
while ($row = mysqli_fetch_array($result1)) {
    $content_ids[] = $row['Content_ID'];
}
session_abort();
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
    .portfolio-content h5 {
        margin-top: -20px;
    }

    .transformers-right {
        display: inline-block;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        cursor: pointer;
        background-color: transparent;
    }

    .transformers-right.watchlisted {
        background-color: white;
        border: 1px;
    }

    .transformers-right.watchlisted:hover,
    .transformers-right:hover {
        background-color: gray;
        border: 1px;
    }

    .transformers-right {
        color: wheat;
        background-color: transparent;
        width: 30px;
        height: 30px;
        border-radius: 10%;
        position: relative;
        left: 76%;
        top: -320px;
        visibility: hidden;
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
    <?php include("Models/header.php");

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
                        <ul><a href="movies.php">
                                <li <?php if (!isset($_GET['genre']) || $_GET['genre'] === '') {
                                        echo 'class="active"';
                                    } ?>>
                                    All
                                </li>
                            </a><a href="movies.php?genre=action">
                                <li <?php if (isset($_GET['genre']) && $_GET['genre'] === 'action') {
                                        echo 'class="active"';
                                    } ?>>
                                    Action
                                </li>
                            </a><a href="movies.php?genre=drama">
                                <li <?php if (isset($_GET['genre']) && $_GET['genre'] === 'drama') {
                                        echo 'class="active"';
                                    } ?>>
                                    Drama
                                </li>
                            </a> <a href="movies.php?genre=crime">
                                <li <?php if (isset($_GET['genre']) && $_GET['genre'] === 'crime') {
                                        echo 'class="active"';
                                    } ?>>
                                    Crime
                                </li>
                            </a>
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
                    include('Models/card.php');
                }
                ?>
            </div>
        </div>
    </section><!-- portfolio section end -->
    <?php
    $site = 'movies';
    include('Services/paginationNumbers.php');
    ?>
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
                        <?php
                        $sql = "SELECT * from content where type = 'movie'";
                        $result = mysqli_query($conn, $sql);
                        while ($row1 = mysqli_fetch_array($result)) {
                            $youtube_link = $row1['Trailer'];

                            $video_id = substr(parse_url($youtube_link, PHP_URL_QUERY), 2);

                            $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                            echo '<div class = "col-md-16"> 
                            <a href="' . $youtube_link . '" class="popup-youtube">
                            <img src="' . $thumbnail_url . '" alt="video" />
                            </a>
                        </div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- video section end -->
    <!-- footer section start -->
    <?php include("Models/footer.php"); ?>
    <!-- footer section end -->
    <script>
    function list(id) {
        var watchlistButton = document.getElementById("watchlist-button" + id);
        if (watchlistButton.classList.contains("watchlisted")) {
            watchlistButton.classList.remove("watchlisted");
            removeFromWatchlist(id);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "Services/array-remove.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + id);
        } else {
            watchlistButton.classList.add("watchlisted");
            addToWatchlist(id);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "Services/array-add.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + id);
        }
    }

    function addToWatchlist(content_id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Services/watchlist-add.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("content_id=" + content_id);
    }

    function removeFromWatchlist(content_id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Services/watchlist-remove.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("content_id=" + content_id);
    }

    const movies = document.querySelectorAll('.filmi');

    movies.forEach((movie) => {
        const checkmark = movie.nextElementSibling;

        movie.addEventListener('mouseenter', (event) => {
            checkmark.style.visibility = 'visible';
            console.log("ENTERED");
        });

        movie.addEventListener('mouseleave', (event) => {
            if (event.relatedTarget !== checkmark) {
                checkmark.style.visibility = 'hidden';
                console.log("LEFT");
            }
        });

        checkmark.addEventListener('mouseenter', (event) => {
            checkmark.style.visibility = 'visible';
            console.log("ENTERED CHECKMARK");
        });

        checkmark.addEventListener('mouseleave', (event) => {
            if (event.relatedTarget !== movie) {
                checkmark.style.visibility = 'hidden';
                console.log("LEFT CHECKMARK");
            }
        });
    });
    </script>
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