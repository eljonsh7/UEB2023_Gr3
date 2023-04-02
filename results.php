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

    <div style="">
        <?php
if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    echo '<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-content">
                    <h3>Search results for "'.$search.'": </h3>
                </div>
            </div>
        </div>
    </div>
</section>';

    echo '<section class="portfolio-area pt-60">
	<div class="container">
	<div class="row ">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="portfolio-menu">
							<ul>
								<li data-filter="*" class="active">All</li>
								<li data-filter=".movie">Movies</li>
								<li data-filter=".tvshow">TV Shows</li>
							</ul>
						</div>
					</div>
				</div>
				<hr />
				
	';
    $query = "SELECT Title, Cover, ID , Type, Genre FROM tvshows WHERE Title LIKE '%{$search}%' UNION SELECT Title, Cover, ID , Type, Genre FROM movies WHERE Title LIKE '%{$search}%'";

    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0) {
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
                echo '<div class="col-lg-3 col-md-4 col-sm-6 '.$genre.' '.$type.'">
                <a href = "movie-details.php?id='.$id.'&type='.$type.'">
                    <div class="single-portfolio">
                        <div class="single-portfolio-img">
                            <img src="'.$poster.'" alt="portfolio" />
                        </div>
                        <div class="portfolio-content">
                            <h5 style = "text-align:center;">'.$title.'</h5>
                        </div>
                    </div>
                    </a>
                </div>';
				if($i%4==0){
					echo '</div>';
				}
			}
    }
    else {
        echo '<h6 class=":text-danger text-center mt-3">No Movies or TV Shows found!</h6>';
    }
	echo '</div></section>';
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