<?php
include('connection.php');
$search = $_GET['search'];
if (isset($_GET['type'])) {
    $type = "'" . $_GET['type'] . "'";
    $searchCondition = "and content.Title like '%{$search}%'";
} else {
    $type = "'movie','tv show'";
    $searchCondition = "and content.Title like '%{$search}%'";
}
include('pagination.php');
// echo $sql;
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
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-gap: 20px;
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


    <?php
    echo '<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-content">
                    <h3>Search results for "' . $search . '": </h3>
                </div>
            </div>
        </div>
    </div>
</section>';

    ?><section class="portfolio-area pt-60">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="portfolio-menu">
                        <ul><a href="results.php?search=<?php echo $search ?>">
                                <li <?php if (!isset($_GET['type']) || $_GET['type'] === '') {
                                        echo 'class="active"';
                                    } ?>>
                                    All
                                </li>
                            </a><a href="results.php?type=movie&search=<?php echo $search ?>">
                                <li <?php if (isset($_GET['type']) && $_GET['type'] === 'movie') {
                                        echo 'class="active"';
                                    } ?>>
                                    Movies
                            </a><a href="results.php?type=tv show&search=<?php echo $search ?>">
                                <li <?php if (isset($_GET['type']) && $_GET['type'] === 'tv show') {
                                        echo 'class="active"';
                                    } ?>>
                                    TV Shows
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />

            <div class="grid-container" id="contentContainer">
                <?php
                if (mysqli_num_rows($result) > 0) {

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

                    echo '</div>';
                } else {
                    echo '<h6 class=":text-danger text-center mt-3">No Movies or TV Shows found!</h6>';
                }
                echo '</div></section>';
                ?>
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
                </style>

                <?php
                if ($pages > 1) {
                    echo '<section>
    <center>
         <div class="container">';

                    if (isset($_GET['type'])) {
                        $type = $_GET['type'];
                        for ($i = 1; $i <= $pages; $i++) {
                            echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
                            if ($i != $page) {
                                echo 'btn-floating"';
                            } else {
                                echo '"';
                            }
                            echo 'href="results.php?page=' . $i . '&type=' . $type . '&search=' . $search . '">' . $i . '</a>';
                        }
                    } else {
                        for ($i = 1; $i <= $pages; $i++) {
                            echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
                            if ($i != $page) {
                                echo 'btn-floating"';
                            } else {
                                echo '"';
                            }
                            echo 'href="results.php?page=' . $i . '&search=' . $search . '">' . $i . '</a>';
                        }
                    }
                    echo '</div>
    <center>
     </section>';
                } ?>

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

</body>

</html>