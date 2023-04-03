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
        .home {
            visibility: hidden;
            color: #00d9e1;
        }

        .img-wrapper {
            width: 100%;
            overflow: hidden;
        }
        div.portfolio-content > h2 {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- header section start -->
    <?php include("header.php"); ?>
    <?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

    $sql = "SELECT * FROM `movies`";

    $result = mysqli_query($conn, $sql);
    ?>
    <section class="hero-area" id="home">
        <div class="container">
            <div class="hero-area-slider">
                <?php
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
                    '<div class="row hero-area-slide" style="display: flex;justify-content: center;align-items: center;  margin-top: 25%;">
					<div class="col-lg-6 col-md-5">
						<a href="movie-details.php?id=' . $row['ID'] . '&type=movie">
							<div class="hero-area-content">
								<div class="img-wrapper" style="margin-bottom:4%;margin-top:-8.5%;">
									<img src="' . $Cover . '" style="width: 100%;" alt="about" id="test123" />
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-6 col-md-7">
						<div class="hero-area-content pr-50">
							<a href="movie-details.php?id=' . $row['ID'] . '&type=movie"><h2>' . $Title . '</h2></a>
							<div class="review">
								<div class="author-review">
									<i class="icofont icofont-star"></i>
								</div>
								<h4>' . $Rating . '</h4>
							</div>
							<p>' . $Description . '</p>
							<div class="slide-trailor">
								<a href="' . $Trailer . '" class="theme-btn popup-youtube">Trailer  ▶</a>
							</div>
						</div>
					</div>
				</div>
				
							';
                }
                ?>

            </div>
        </div>
        </div>
        <div class="hero-area-thumb">
            <div class="thumb-prev">
                <?php
                echo
                '<div class="row hero-area-slide" style="display: flex;justify-content: center;align-items: center;">
									<div class="col-lg-6 col-md-5">
										<div class="hero-area-content">
											<div class="img-wrapper" style="margin-bottom:4%;margin-top:-8.5%;">
												<img src="' . $Cover . '" style="width: 100%;" alt="about" id="test123" />
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-7">
										<div class="hero-area-content pr-50">
											<h2>' . $Title . '</h2>
											<div class="review">
												<div class="author-review">
													<i class="icofont icofont-star"></i>
												</div>
												<h4>' . $Rating . '</h4>
											</div>
											<p>' . $Description . '</p>
											<div class="slide-trailor">
												<a href="' . $Trailer . '" class="theme-btn popup-youtube">Trailer  ▶</a>
											</div>
										</div>
									</div>
								</div>
								';

                ?>
            </div>
            <div class="thumb-next">
                <?php
                echo
                '<div class="row hero-area-slide" style="display: flex;justify-content: center;align-items: center;">
									<div class="col-lg-6 col-md-5">
										<div class="hero-area-content">
											<div class="img-wrapper" style="margin-bottom:4%;margin-top:-8.5%;">
												<img src="' . $Cover2 . '" style="width: 100%;" alt="about" id="test123" />
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-7">
										<div class="hero-area-content pr-50">
											<h2>' . $Title2 . '</h2>
											<div class="review">
												<div class="author-review">
													<i class="icofont icofont-star"></i>
												</div>
												<h4>' . $Rating2 . '</h4>
											</div>
											<p>' . $Description2 . '</p>
											<div class="slide-trailor">
												<a href="' . $Trailer2 . '" class="theme-btn popup-youtube">Trailer  ▶</a>
											</div>
										</div>
									</div>
								</div>
								';

                ?>
            </div>
        </div>
    </section><!-- hero area end -->
    <!-- portfolio section start -->
    <section class="portfolio-area pt-60">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="section-title">
                        <h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                        <ul>
                            <li data-filter=".latest" class="active" onclick="latest()">Latest</li>
                            <li data-filter=".top" onclick="top()">Top Rated</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-9 portfolio-container latest">
                    <div class="row portfolio-items" id="latest">
                        <?php
                            // Connect to the database
                            $db = new mysqli('localhost', 'root', 'root', 'moviedb');

                            $query = "SELECT * FROM movies ORDER BY Date DESC LIMIT 6";
                            $result = $db->query($query);

                            while ($row = $result->fetch_assoc()) {
                                $title = $row['Title'];
                                $cover = $row['Cover'];
                                echo '<div class="col-md-4 col-sm-6 soon released">
                                        <div class="single-portfolio">
                                            <div class="single-portfolio-img">';
                                echo '<img src="' . $cover . '" alt="portfolio" />';
                                echo '</div>';
                                echo '<div class="portfolio-content">';
                                echo '<h2>' . $title . '</h2>';
                                echo '</div>
                                    </div>
                                </div>';
                            }

                            // Close the database connection
                            $db->close();
                        ?>
                    </div>
                    <div class="row portfolio-items" id="top" style="display: none;">
                        <?php
                            // Connect to the database
                            $db = new mysqli('localhost', 'root', 'root', 'moviedb');

                            $query = "SELECT * FROM movies ORDER BY Rating DESC LIMIT 6";
                            $result = $db->query($query);

                            while ($row = $result->fetch_assoc()) {
                                $title = $row['Title'];
                                $cover = $row['Cover'];
                                echo '<div class="col-md-4 col-sm-6 soon released">
                                        <div class="single-portfolio">
                                            <div class="single-portfolio-img">';
                                echo '<img src="' . $cover . '" alt="portfolio" />';
                                echo '</div>';
                                echo '<div class="portfolio-content">';
                                echo '<h2>' . $title . '</h2>';
                                echo '</div>
                                    </div>
                                </div>';
                            }

                            // Close the database connection
                            $db->close();
                        ?>
                    </div>
                </div>
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
                <div class="col-md-9">
                    <div class="video-area">
                        <img src="assets/img/video/video1.png" alt="video" />
                        <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                            <i class="icofont icofont-ui-play"></i>
                        </a>
                        <div class="video-text">
                            <h2>Angle of Death</h2>
                            <div class="review">
                                <div class="author-review">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                </div>
                                <h4>180k voters</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="video-area">
                                <img src="assets/img/video/video2.png" alt="video" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="video-area">
                                <img src="assets/img/video/video3.png" alt="video" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- video section end -->
    <!-- news section start -->

    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h1><i class="icofont icofont-coffee-cup"></i> Latest News</h1>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="news-slide-area">
            <div class="news-slider">
                <div class="single-news">
                    <div class="news-bg-1"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under
                            her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
                <div class="single-news">
                    <div class="news-bg-2"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under
                            her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
                <div class="single-news">
                    <div class="news-bg-3"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under
                            her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
            </div>
            <div class="news-thumb">
                <div class="news-next">
                    <div class="single-news">
                        <div class="news-bg-3"></div>
                        <div class="news-date">
                            <h2><span>NOV</span> 25</h2>
                            <h1>2017</h1>
                        </div>
                        <div class="news-content">
                            <h2>The Witch Queen</h2>
                            <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up
                                under her hat, and teal eyes.</p>
                        </div>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="news-prev">
                    <div class="single-news">
                        <div class="news-bg-2"></div>
                        <div class="news-date">
                            <h2><span>NOV</span> 25</h2>
                            <h1>2017</h1>
                        </div>
                        <div class="news-content">
                            <h2>The Witch Queen</h2>
                            <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up
                                under her hat, and teal eyes.</p>
                        </div>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- news section end -->
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

    <script>
        function top(){
            document.getElementById("top").display = "flex";
            document.getElementById("latest").display = "none";
        }

        function latest(){
            document.getElementById("top").display = "none";
            document.getElementById("latest").display = "flex";
        }
    </script>

</body>

</html>