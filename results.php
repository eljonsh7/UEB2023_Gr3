<?php
 $db_host = 'localhost';
 $db_user = 'root';
 $db_pass = 'root';
 $db_name = 'moviedb';
 $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);
 
?>
<!DOCTYPE HTML>
<html lang="zxx">
	
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Moviepoint - Online Movie,Vedio and TV Show HTML Template</title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="assets/img/favcion.png" />
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
	</head>
	<body>
		<!-- Page loader -->
	    <div id="preloader"></div>
		<!-- header section start -->
		<?php include("header.php");?>
		<section class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumb-area-content">
							<h3>Results:</h3>
						</div>
					</div>
				</div>
			</div>
		</section>
<div style = "">
        <?php
if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    
    $query = "SELECT Title, Cover FROM tvshows WHERE Title LIKE '%{$search}%' UNION SELECT Title, Cover FROM movies WHERE Title LIKE '%{$search}%' ";
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<section class="portfolio-area pt-60" >
        <div class="container">
            <div class="row portfolio-item">';
        
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['Title'];
                $poster = $row['Cover'];
                echo '<div class="col-lg-3 col-md-4 col-sm-6 soon released">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="'.$poster.'" alt="portfolio" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h2>'.$title.'</h2>
                        
                        </div>
                    </div>
                </div>';
            }
            
        
        echo '</div>
        </div>
    </section';
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No movies found</h6>";
    }
}

?>
</div>
    
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