<?php
session_start();
if(isset($_GET['cookieID']) && isset($_SESSION['settingRememberCookie'])){
    $idCookie = $_GET['cookieID'];  
    try{
    setcookie('ID', $idCookie, time() + (14 * 24 * 60 * 60), "/");
    }catch(Exception $e){
        echo '<script>console.log("'.$e->getMessage().'");</script>';
    }
    echo '<script>window.location.href="index.php"</script>';
    $_SESSION['settingRememberCookie'] = false;
}
if(isset($_GET['signout']) && $_GET['signout']==1){
    setcookie('ID', "", time() + (14 * 24 * 60 * 60), "/");
    echo '<script>window.location.href="index.php"</script>';
}
if(isset($_COOKIE['ID'])){
    echo '<script>console.log("COOKIE:'.$_COOKIE['ID'].'");</script>';
}
include('Services/connection.php');


$stmt1 = $conn->prepare("SELECT * FROM watchlist WHERE User_ID = ?");
$stmt1->bind_param("d", $_SESSION['user']);
$stmt1->execute();
$result1 = $stmt1->get_result();

$content_ids = array();
while ($row = mysqli_fetch_array($result1)) {
    $content_ids[] = $row['Content_ID'];
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
        .portfolio-content h5 {
            margin-top: 5%;
        }

        .home {
            color: #00d9e1;
        }

        .img-wrapper {
            width: 100%;
            overflow: hidden;
        }

        div.portfolio-content>h2 {
            font-size: 22px;
            justify-content: center;
            display: flex;
        }

        .row {
            justify-content: center;
        }

        .sideFeatured {
            display: none;
        }

        .importantDiv {
            margin-bottom: 50px !important;
        }

        .imgScroll {
            width: 400px !important;
            height: 596px !important;
        }


        .soon {
            margin: 5px;
        }

        .soon img {

            border-radius: 14px;

        }

        @media screen and (min-width: 450px) {
            .imgScroll {
                width: 100% !important;
                padding: 10% 67px 0;
            }

            .textDiv {}

            .importantDiv {
                width: 500px;
                margin: 0 auto;
            }

            .picDiv {
                width: 100%;
            }

        }

        @media screen and (max-width: 1074px) {
            .col-md-5 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 100%;
                max-width: 100%;
            }

            .textDiv {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 50%;
                flex: 0 0 80%;
                max-width: 80%;
            }

            .textDiv p {
                text-align: justify;
            }
        }

        @media screen and (min-width: 1075px) {
            .imgScroll {
                width: 300px !important;
                height: 448px !important;
                padding: 0;
            }

            .picDiv {
                padding-left: 2%;
                padding-top: 4%;
                margin-right: -1%;
            }

            .importantDiv {
                width: 99.5%;

            }

            .textDiv {
                display: block;
            }
        }

        @media screen and (min-width: 1200px) {
            .imgScroll {
                width: 300px !important;
                height: 448px !important;
            }

            .picDiv {
                margin-left: -7%;
                padding-top: 2%;
                margin-right: -8%;
            }
        }

        @media screen and (min-width: 1286px) {
            .imgScroll {
                width: 400px !important;
                height: 597px !important;
            }

            .picDiv {
                padding-left: 2%;
                padding-top: 0.5%;
                margin-right: 0;
                margin-left: 0;
            }

        }

        @media screen and (min-width: 1300px) {
            .sideFeatured {
                display: block;
            }
        }

        .portfolio-content h5 {
            margin-top: 5%;
        }

        .transformers-right {
            display: inline-block;
            padding: 6px 12px;
            border: 1px solid gray;
            border-radius: 3px;
            cursor: pointer;
            background-color: transparent;
        }

        .transformers-right.watchlisted {
            background-color: white;
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
            left: 81.5%;
            top: -320px;
        }

        .filmi {
            align-items: center;
            width: 220px;
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

            width: 220px;
            height: 330px;
        }


        a.btn {
            display: flex;
            margin: 2%;
            justify-content: center;
            background: #3a444f;
            border: 2px solid transparent;
        }
        a.btn:hover {
            border: 2px solid white;
        }

        .arrow-button {
            border-radius: 30px;
            display:flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border: none;
            background-color: #f7f7f7;
            color: white;
            font-size: 24px;
            cursor: pointer;
            background-color: #3a444f;
        }

        .arrow-button:hover {
            border:2px white solid;
            color: white;
        }

        .arrow-left::before {
            content: '';
            display: inline-block;
            border: solid white;
            border-width: 0 3px 3px 0;
            padding: 4px;
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        .arrow-right::before {
            content: '';
            display: inline-block;
            border: solid white;
            border-width: 0 3px 3px 0;
            padding: 4px;
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }

        a.scrollToTop {
            display: flex; 
            justify-content: center; 
            align-content: center;
        }

        i.icofont.icofont-arrow-up {
            align-content: center; 
            display: flex; 
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- header section start -->
    <?php include("Models/header.php"); ?>
    <section class="hero-area" id="home">
        <div class="container">
            <div class="hero-area-slider activeDiv">
                <?php
                include('Services/connection.php');
                $sql = "SELECT * FROM `content` ORDER BY `Date` DESC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                $count = 0;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $count++;
                    if ($count == 2) {
                        $Cover2 = $row['Cover'];
                        $Title2 = $row['Title'];
                        $Rating2 = $row['Rating'];
                        $Description2 = $row['Description'];
                        $Trailer2 = $row['Trailer'];
                    }
                    $Cover = $row['Cover'];
                    $Title = $row['Title'];
                    $Rating = $row['Rating'];
                    $Description = $row['Description'];
                    $Trailer = $row['Trailer'];
                    echo
                    '<div class="row hero-area-slide importantDiv" style="display: flex;justify-content: center;align-items: center;  margin-top: 25%;">
                            <div class="col-lg-6 col-md-5 picDiv">
                                <a href="movie-details.php?id=' . $row['ID'] . '&type=Movie">
                                    <div class="hero-area-content">
                                        <div class="img-wrapper" style="margin-bottom:4%;margin-top:-8.5%;">
                                            <img src="' . $Cover . '" alt="about" id="test123" class="imgScroll" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-7 textDiv">
                                <div class="hero-area-content pr-50">
                                    <a href="movie-details.php?id=' . $row['ID'] . '&type=Movie"><h2>' . $Title . '</h2></a>
                                    <div class="review">
                                        <div class="author-review">
                                            <i class="icofont icofont-star"></i>
                                        </div>
                                        <h4>' . $Rating . '</h4>
                                    </div>
                                    <p>' . stripslashes($Description) . '</p>
                                    <div class="slide-trailor">
                                        <a href="' . $Trailer . '" class="theme-btn popup-youtube">Trailer  ▶</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>

            </div>
        </div>
        </div>
        <div class="hero-area-thumb sideFeatured">
            <div class="thumb-prev">
                <?php
                echo
                '<div class="row hero-area-slide" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-lg-6 col-md-5 picDiv">
                        <div class="hero-area-content">
                            <div class="img-wrapper" style="margin-bottom:4%;margin-top:-8.5%;">
                                <img src="' . $Cover . '" alt="about" id="test123" class="imgScroll"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 textDiv">
                        <div class="hero-area-content pr-50">
                            <h2>' . $Title . '</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>' . $Rating . '</h4>
                            </div>
                            <p>' . stripslashes($Description) . '</p>
                            <div class="slide-trailor">
                                <a href="' . $Trailer . '" class="theme-btn popup-youtube">Trailer  ▶</a>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
            </div>
            <div class="thumb-next">
                <?php
                echo
                '<div class="row hero-area-slide" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-lg-6 col-md-5 picDiv">
                        <div class="hero-area-content">
                            <div class="img-wrapper" style="margin-bottom:4%;margin-top:-8.5%;">
                                <img src="' . $Cover2 . '" alt="about" id="test123" class="imgScroll"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 textDiv">
                        <div class="hero-area-content pr-50">
                            <h2>' . $Title2 . '</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>' . $Rating2 . '</h4>
                            </div>
                            <p>' . stripslashes($Description2) . '</p>
                            <div class="slide-trailor">
                                <a href="' . $Trailer2 . '" class="theme-btn popup-youtube">Trailer  ▶</a>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
            </div>
        </div>
    </section>
    <!-- portfolio section start -->

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Latest Content</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- portfolio section start -->
    <section class="portfolio-area pt-60">
        <div class="container">
            <div>
                <h2>Movies</h2>
            </div>
            <hr>
            <div class="grid-container" id="contentContainer">
                <?php
                $stmt1 = $conn->prepare("SELECT * FROM Content c WHERE c.Type = 'Movie' ORDER BY c.Date DESC LIMIT 4");
                $stmt1->execute();
                $result1 = $stmt1->get_result();

                while ($row = $result1->fetch_assoc()) {
                    $title = $row['Title'];
                    $poster = $row['Cover'];
                    $id = $row['ID'];
                    $type = $row['Type'];
                    $genre = "";
                    include('Models/card.php');
                }
                ?>
            </div>
            <a href="movies.php" class="btn">Show more &rarr;</a>
            <div style="margin-top: 7%;">
                <h2>TV Shows</h2>
            </div>
            <hr>
            <div class="grid-container" id="contentContainer">
                <?php
                $stmt2 = $conn->prepare("SELECT * FROM Content c WHERE c.Type = 'TV Show' ORDER BY c.Date DESC LIMIT 4");
                $stmt2->execute();
                $result2 = $stmt2->get_result();

                while ($row = mysqli_fetch_array($result2)) {
                    $title = $row['Title'];
                    $poster = $row['Cover'];
                    $id = $row['ID'];
                    $type = $row['Type'];
                    $genre = "";
                    include('Models/card.php');
                }
                ?>
            </div>
            <a href="tv-shows.php" class="btn">Show more &rarr;</a>
        </div>
    </section>

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
                <div class="col-md-8 ">
                    <div class="video-area">
                        <?php
                        $sql = "SELECT * FROM content where type = 'tv show' ORDER BY date DESC LIMIT 1";
                        $result = mysqli_query($conn, $sql);

                        while ($row1 = mysqli_fetch_array($result)) {
                            $youtube_link = $row1['Trailer'];
                            $video_id = substr(parse_url($youtube_link, PHP_URL_QUERY), 2);
                            $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                            echo '
                        <a href="' . $youtube_link . '" class="popup-youtube">
                            <img src="' . $thumbnail_url . '" alt="video" />
                            <i class="icofont icofont-ui-play"></i>
                        </a>
                        <div class="video-text">
                            <h2>' . $row1['Title'] . '</h2>
                            <div class="review">';
                            $full_stars = floor($row1['Rating']);
                            $half_stars = round(($row1['Rating'] - $full_stars) * 2) / 2;
                            $empty_stars = 5 - $full_stars - $half_stars;

                            echo '<div class="author-review">';
                            for ($i = 0; $i < $full_stars; $i++) {
                                echo '<i class="icofont icofont-star"></i>';
                            }
                            if ($half_stars >= 0.5) {
                                echo '<i class="icofont icofont-star-half"></i>';
                            }
                            for ($i = 0; $i < $empty_stars; $i++) {
                                echo '<i class="icofont icofont-star-outline"></i>';
                            }
                            echo '</div>';
                            echo ' </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">

                        <?php
                        $sql = "SELECT * FROM content ORDER BY date DESC LIMIT 2";
                        $result = mysqli_query($conn, $sql);

                        while ($row1 = mysqli_fetch_array($result)) {

                            $youtube_link = $row1['Trailer'];
                            $video_id = substr(parse_url($youtube_link, PHP_URL_QUERY), 2);
                            $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                            echo '<div class="col-md-12 col-sm-6">
            <div class="video-area">
                <a href="' . $youtube_link . '" class="popup-youtube">
                    <img src="' . $thumbnail_url . '" alt="video" />
                </a>
                <div class="video-text">
                <h4>' . $row1['Title'] . '</h4>
                </div>
            </div>
        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section><!-- video section end -->
    <!-- news section start -->
    <?php
    $sql = "SELECT * FROM blogs ORDER BY UpdatedAt DESC";

    $count = 0;
    $result = mysqli_query($conn, $sql);
    while ($row1 = mysqli_fetch_array($result)) {
        $count++;
        if ($count == 1) {
            $title2 = $row1['Title'];
            $date2 = $row1['UpdatedAt'];
            $content2 = $row1['Content'];
            $image2 = $row1['Image'];
            $year2 = date("Y", strtotime($date2));
            $month2 = date("m", strtotime($date2));
            $day2 = date("d", strtotime($date2));
            $monthName2 = date('F', mktime(0, 0, 0, $month2, 1));
        }
        $title = $row1['Title'];
        $date = $row1['UpdatedAt'];
        $content = $row1['Content'];
        $image = $row1['Image'];
        $year = date("Y", strtotime($date));
        $month = date("m", strtotime($date));
        $day = date("d", strtotime($date));
        $monthName = date('F', mktime(0, 0, 0, $month, 1));
    } ?>
    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h1><i class="icofont icofont-coffee-cup"></i> Latest Blogs</h1>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="blog-container" style="display:flex;justify-content:center;align-items:center;margin-top:5%">
                <button  class="arrow-button arrow-left" id="leftArrow"></button>
                <div id="currentBlog" style="display:inline-block;width:90%;">Loading blogs...</div>
                <button class="arrow-button arrow-right" id="rightArrow"></button>
        </div>
        <script>
            var currentBlogIndex = 0;
            var currentBlogElement = document.getElementById("currentBlog");
            var blogsArray = [];

            function switchToNextMovie() {
            currentBlogIndex = (currentBlogIndex + 1) % blogsArray.length;
            updateCurrentMovie();
            }

            function switchToPreviousMovie() {
            currentBlogIndex = (currentBlogIndex - 1 + blogsArray.length) % blogsArray.length;
            updateCurrentMovie();
            }

            function updateCurrentMovie() {
            currentBlogElement.innerHTML = blogsArray[currentBlogIndex];
            }

            var leftArrowButton = document.getElementById("leftArrow");
            leftArrowButton.addEventListener("click", switchToPreviousMovie);

            var rightArrowButton = document.getElementById("rightArrow");
            rightArrowButton.addEventListener("click", switchToNextMovie);
                <?php
                $sql3 = "SELECT * FROM blogs ORDER BY UpdatedAt DESC";

                $count = 0;
                $result3 = mysqli_query($conn, $sql3);
                $blogsArray = array();
                while ($row1 = mysqli_fetch_array($result3)) {
                        $id = $row1['ID'];
                        $title = $row1['Title'];
                        $date = $row1['UpdatedAt'];
                        $content = $row1['Content'];
                        $image = $row1['Image'];
                        $year = date("Y", strtotime($date));
                        $month = date("m", strtotime($date));
                        $day = date("d", strtotime($date));
                        $monthName = date('F', mktime(0, 0, 0, $month, 1));
                        array_push($blogsArray,'<div class="single-news" style="margin:0 15%;">
                                 <div class="news-bg-1" style="background-image: url(\'' . $image . '\');">
                                    <div class="news-date">
                                        <h2><span>' . $monthName . '</span>' . $day . '</h2>
                                        <h1>' . $year . '</h1>
                                    </div>
                                    <div style="background-color:rgba(0,0,0,0.5);height:100%;">
                                        <div class="news-content">
                                            <h2>' . $title . '</h2>
                                            <p>' . substr($content, 0, 100) . '...</p>
                                        </div>
                                        <a href="blog-details.php?id=' . $id . '">Read More</a>
                                    </div>
                                </div>
                             </div>');
                            echo "blogsArray = " . json_encode($blogsArray) . ";"; 
                        }
                        ?>
                // Display the first blog
            updateCurrentMovie();
        </script>
            </div>
    </section><!-- news section end -->
    <!-- footer section start -->
    <?php include("Models/footer.php"); ?>
    <!-- footer section end -->
    <script>
    <?php if (isset($_SESSION['user'])) {
            echo 'function list(id) {
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
            }';
        } ?>
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