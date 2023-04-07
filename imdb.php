<?php
include ('connection.php');

$sql = "SELECT * FROM `movies` ORDER BY Rating DESC LIMIT 10";

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
		.imdb {
			color: #00d9e1;
		}

		.filmi{
			width: 25%;
			
		}
		div div{
			float: left;
		}
		.portfolio-content{
			width: 500px;
			height: fit-content;
			padding-left: 40px;
		}


		.main-div{
			margin-top: 50px;
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
						<h1>Top IMDb Page</h1>
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
					<div class="section-title">
						<h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
					</div>
				</div>
				<div class="col-lg-6 text-center text-lg-right">
					<div class="portfolio-menu">
						<ul>
							<li data-filter="*" class="active">Latest</li>
							<li data-filter=".soon">Comming Soon</li>
							<li data-filter=".top">Top Rated</li>
							<li data-filter=".released">Recently Released</li>
						</ul>
					</div>
				</div>
			</div>
			<?php
                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['Title'];
                    $poster = $row['Cover'];
                    $id = $row['ID'];
                    $type = $row['Type'];
                    $genre = $row['Genre'];
					$description = $row['Description'];
					$rating = $row['Rating'];
                    echo '<div class="contentDiv' . $genre . '" style="margin-top:15%;">
                    <div class="main-div">
                        <div  class = "filmi"  >
                            <center>
                                <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                    <img id="imgContent" src="' . $poster . '" alt="portfolio" class="imgContentPortfolio" style="border-radius:15px; " />
                                </a>
                            </center>
                        </div>
                        <div class="portfolio-content">
						<h5 class="title" style = "text-align:center;" >' . $title . '</h5>
						<p>'.$description.'</p>
						<h5 class="title" style = "text-align:center;" >Rating: ' . $rating . '</h5>
                            <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                
                            </a>
                        </div>
                    </div>
                </div>';
                }
                ?>
			<hr />
			<div>
			</div>
		</div>
	</section><!-- portfolio section end -->
	<!-- video section start -->
	
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