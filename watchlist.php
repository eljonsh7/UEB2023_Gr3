<!DOCTYPE html>
<html lang="en">
<?php
    include('Services/connection.php');
    session_start();

    $stmt1 = $conn->prepare("SELECT * FROM watchlist WHERE User_ID = ?");
    $stmt1->bind_param("d", $_SESSION['user']);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    $content_ids = array();
    while ($row = mysqli_fetch_array($result1)) {
        $content_ids[] = $row['Content_ID'];
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/logo2.png" />
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

    <title>Watchlist</title>
    <style>
    .profileo, .watchlisto {
        color: #00d9e1;
    }


    .portfolio-content h5 {
        margin-top: 5%;
    }


    .transformers-right {
        display: inline-block;
        padding: 6px 12px;
        border: 1px solid gray;
        border-radius: 5px;
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
        width: 33px;
        height: 33px;
        border-radius: 10%;
        position: relative;
        left: 81%;
        top: -320px;
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
    <?php include("Models/header.php"); ?>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Watchlist Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- portfolio section start -->
    <section class="portfolio-area pt-60">
        <div class="container">
            <div>
                <h3>Movies</h3>
            </div>
            <hr>
                <?php
                $stmt1 = $conn->prepare("SELECT * FROM Watchlist w JOIN Content c ON c.ID = w.Content_ID WHERE w.User_ID = ? AND Type = 'Movie'");
                $stmt1->bind_param("d", $_SESSION['user']);
                $stmt1->execute();
                $result1 = $stmt1->get_result();

                if(mysqli_num_rows($result1)>0){
                    echo '<div class="grid-container" id="contentContainer">';
                    while ($row = mysqli_fetch_array($result1)) {
                        $title = $row['Title'];
                        $poster = $row['Cover'];
                        $id = $row['ID'];
                        $type = $row['Type'];
                        $genre = "";
                        include('Models/card.php');
                    }
                    echo '</div>';
                }else{
                    echo '<span>No movies in your wishlist yet, explore for movies <a href="movies.php">here</a></span>';
                }
                ?>
            <div style="margin-top: 7%;">
                <h3>TV Shows</h3>
            </div>
            <hr>
                <?php
                $stmt2 = $conn->prepare("SELECT * FROM Watchlist w JOIN Content c ON c.ID = w.Content_ID WHERE w.User_ID = ? AND Type = 'TV Show'");
                $stmt2->bind_param("d", $_SESSION['user']);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                
                if(mysqli_num_rows($result2)>0){
                    echo '<div class="grid-container" id="contentContainer">';
                    while ($row = mysqli_fetch_array($result2)) {
                        $title = $row['Title'];
                        $poster = $row['Cover'];
                        $id = $row['ID'];
                        $type = $row['Type'];
                        $genre = "";
                        include('Models/card.php');
                    }
                    echo '</div>';
                }else{
                    echo '<span>No TV Shows in your wishlist yet, explore for shows <a href="tv-shows.php">here</a></span>';
                }
                ?>
            </div>
        </div>
    </section>

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