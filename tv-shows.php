<?php 
			$db_host = 'localhost';
			$db_user = 'root';
			$db_pass = 'root';
			$db_name = 'moviedb';
			$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);
			
			$sql = "SELECT * FROM `tvshows`";

			$result = mysqli_query( $conn, $sql );
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
		</style>
	</head>
	<body>
		<!-- Page loader -->
	    <div id="preloader"></div>
		<!-- header section start -->
		<?php include("header.php");?>

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
								<li data-filter="*" class="active">All</li>
								<li data-filter=".Crime">Crime</li>
								<li data-filter=".Drama">Drama</li>
								<li data-filter=".Nature">Nature Documentary</li>
							</ul>
						</div>
					</div>
				</div>
				<hr />
				<?php
				$i = 0;
			while( $row = mysqli_fetch_array($result) ){
				$i++;
				$title = $row['Title'];
                $poster = $row['Cover'];
                $id = $row['ID'];
                $type = $row['Type'];
				$genre = $row['Genre'];
				if($i%4==1){
					echo '<div class="row portfolio-item">';
				}
                echo '<div class="col-lg-3 col-md-4 col-sm-6 '.$genre.'">
                <a href = "movie-details.php?id='.$id.'&type='.$type.'">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="'.$poster.'" alt="portfolio" />
                        </div>
                        <div class="portfolio-content">
                            <h5>'.$title.'</h5>
                        
                        </div>
                    </div>
                    </a>
                </div>';
				if($i%4==0){
					echo '</div>';
				}
			}
				?>

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
        <?php include("footer.php");?>
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