<!DOCTYPE html>
<html lang="en">

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

<body style="background-color: #212529;">
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
            <hr />
            <div class="grid-container" id="contentContainer">
                <?php
                $stmt1 = $conn->prepare("SELECT * FROM Watchlist w JOIN Content c ON c.ID = w.Content_ID WHERE w.User_ID = ?");
                $stmt1->bind_param("d", $_SESSION['user']);
                $stmt1->execute();
                $result1 = $stmt1->get_result();

                while ($row = mysqli_fetch_array($result1)) {
                    $title = $row['Title'];
                    $poster = $row['Cover'];
                    $id = $row['ID'];
                    $type = $row['Type'];
                    echo '<div class="contentDiv" style="margin-top:15%;">
                                <div>
                                    <div  class = "filmi">
                                        <center>
                                            <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                                <img id="imgContent" src="' . $poster . '" alt="portfolio" class="imgContentPortfolio" style="border-radius:15px;"/>
                                            </a>
                                        </center>
                                    </div>
                                    <div class="transformers-right watchlisted" id="watchlist-button' . $id . '" onclick="list(' . $id . ')">
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
            xhr.open("POST", "watchlist-add.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("content_id=" + content_id);
        }

        function removeFromWatchlist(content_id) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "watchlist-remove.php");
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