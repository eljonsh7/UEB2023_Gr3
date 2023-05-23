<?php session_start();?>
<?php
include('Services/connection.php');
$type = "'movie'";
if ((isset($_GET['content']) && $_GET['content'] === 'movie' ) && (isset($_GET['genre']) && $_GET['genre'] !== '')) {
    $genre = mysqli_real_escape_string($conn, $_GET['genre']);
    $sql = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'movie' AND genre.Genre = '$genre'
    GROUP BY content.ID
    ORDER BY Rating DESC LIMIT 10";
} 
else if ((isset($_GET['content']) && $_GET['content'] === 'shows' )&& (isset($_GET['genre']) && $_GET['genre'] !== '')) {
    $genre = mysqli_real_escape_string($conn, $_GET['genre']);
    $sql = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'tv show' AND genre.Genre = '$genre'
    GROUP BY content.ID
    ORDER BY Rating DESC LIMIT 10";
}
else if (isset($_GET['content']) && $_GET['content'] === 'shows' && (!isset($_GET['genre']) || $_GET['genre'] === '')){
    $sql = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'tv show'
    GROUP BY content.ID
    ORDER BY Rating DESC LIMIT 10";
}
else {
    $sql = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type = 'movie'
    GROUP BY content.ID
    ORDER BY Rating DESC LIMIT 10";
}

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
    <style>
        .imdb {
            color: #00d9e1;
        }

        .filmi {
            /* float: left;    */
        }

        /* div div {
            float: left;
        } */
        .imgContentPortfolio{
            width: 220px;
            height: 330px;
        }

        .portfolio-content {
            flex:1;
            height: fit-content;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-left:10%;
            margin-top:-10%;
        }


        .main-div {
            /* margin-top: 100px;
            margin-bottom: 100px; */

        }
        .genre{
            text-align: center;
        }

        .contentDiv{
            margin:0% 15%;
            padding:3% 0;
            height:400px;
            display: flex;
            align-items: center;
        }

        .allmovies{
            background-color: #101219;
        }

        
        
    </style>
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- header section start -->
    <?php include("Models/header.php"); ?>
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content section-title">
                        <h1><i class="icofont icofont-movie"></i> Top IMDb Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- portfolio section start -->
    <section class="portfolio-area pt-60">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-center text-lg-left">
                <div class="portfolio-menu">
                    <ul><a href="imdb.php?content=movie">
                                <li <?php if ((isset($_GET['content']) && $_GET['content'] === 'movie') || (!isset($_GET['content']) || $_GET['content'] === '')) {
                                        echo 'class="active"';
                                    } ?>>
                                    MOVIE
                                </li>
                            </a><a href="imdb.php?content=shows">
                                <li <?php if (isset($_GET['content']) && $_GET['content'] === 'shows' ) {
                                        echo 'class="active"';
                                    } ?>>
                                    TV SHOWS
                                </li>
                                </a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                    <ul><?php if (isset($_GET['content'])){echo '<a href="imdb.php?content='.$_GET['content'].'">
                                <li '; if (!isset($_GET['genre']) || $_GET['genre'] === '') {
                                        echo 'class="active"';
                                    } echo '>
                                    All
                                </li>
                            </a><a href="imdb.php?content='.$_GET['content'].'&genre=action">
                                <li '; if (isset($_GET['genre']) && $_GET['genre'] === 'action') {
                                        echo 'class="active"';
                                    } echo'>
                                    Action
                                </li>
                            </a><a href="imdb.php?content='.$_GET['content'].'&genre=drama">
                                <li '; if (isset($_GET['genre']) && $_GET['genre'] === 'drama') {
                                        echo 'class="active"';
                                    } echo'>
                                    Drama
                                </li>
                            </a> <a href="imdb.php?content='.$_GET['content'].'&genre=crime">
                                <li '; if (isset($_GET['genre']) && $_GET['genre'] === 'crime') {
                                        echo 'class="active"';
                                    } echo'>
                                    Crime
                                </li>
                            </a>';}
                            else{echo '<a href="imdb.php">
                                <li '; if (!isset($_GET['genre']) || $_GET['genre'] === '') {
                                        echo 'class="active"';
                                    } echo '>
                                    All
                                </li>
                            </a><a href="imdb.php?genre=action">
                                <li'; if (isset($_GET['genre']) && $_GET['genre'] === 'action') {
                                        echo 'class="active"';
                                    } echo'>
                                    Action
                                </li>
                            </a><a href="imdb.php?genre=drama">
                                <li '; if (isset($_GET['genre']) && $_GET['genre'] === 'drama') {
                                        echo 'class="active"';
                                    } echo'>
                                    Drama
                                </li>
                            </a> <a href="imdb.php?genre=crime">
                                <li '; if (isset($_GET['genre']) && $_GET['genre'] === 'crime') {
                                        echo 'class="active"';
                                    } echo'>
                                    Crime
                                </li>
                            </a>';}
                            ?>
                        </ul>
                    </div>
                </div>
                
            </div>
            <hr />
            <div class="allmovies">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $title = $row['Title'];
                $poster = $row['Cover'];
                $id = $row['ID'];
                $type = $row['Type'];
                $genre = $row['Genre'];
                $description = $row['Description'];
                $rating = $row['Rating'];
                echo '<div class="contentDiv ' . $genre . '"">
                            <div  class = "filmi"  >
                                    <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                        <img id="imgContent" src="' . $poster . '" alt="portfolio" class="imgContentPortfolio"/>
                                    </a>
                                
                            </div>
                            <div class="portfolio-content">
                                <h2 class="title" style = "text-align:center;" >
                                    <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                        <span>' . $title . '</span>
                                    </a>
                                </h2>
                                <p class="title" style = "text-align:center;" ><b>Rating:</b> ' . $rating . '</p>
                                <p class = "genre"><b>Genre: </b>' . $genre . '</p>
                                <p style="margin-top:10%;">' . $description . '</p>
                                
                            </div>
                </div><hr/>';
            }
            ?>
            </div>
        </div>
    </section><!-- portfolio section end -->
    <!-- video section start -->

    <!-- footer section start -->
    <?php include("Models/footer.php"); ?>
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