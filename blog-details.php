<?php
include('connection.php');
$id = $_GET['id'];
$sql = "SELECT * FROM blogs where id ='$id' ";
$sql1 = "SELECT users.Photo as Photo, users.Firstname as Name, users.Lastname as Surname FROM blogs
        join users
        on blogs.AuthorID = users.ID
        where blogs.ID ='$id'";


$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);

$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);

$profilePic = $row1['Photo'];
$authorName = $row1['Name'] . $row1['Surname'];

$title = $row['Title'];
$date = $row['UpdatedAt'];
$content = $row['Content'];
$image = $row['Image'];
$year = date("Y", strtotime($date));
$month = date("m", strtotime($date));
$day = date("d", strtotime($date));
$monthName = date('F', mktime(0, 0, 0, $month, 1));


?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moviepoint - Online Movie,Vedio and TV Show HTML Template</title>
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
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- header section start -->
    <?php include("header.php"); ?>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Blog Details Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- blog area start -->
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="news-details">
                        <div class="single-news">
                            <div class="news-bg-1"></div>
                            <div class="news-date">
                                <?php
                                echo '
                                <h2><span>' . $monthName . '</span>' . $day . '</h2>
                                <h1>' . $year . '</h1>';
                                ?>
                            </div>
                        </div>
                        <h2><?php echo $title; ?></h2>
                        <a href="#"><i class="icofont icofont-comment"></i>1k Comments</a>
                        <p><?php echo $content; ?></p>
                        <div class="detail-author">
                            <div class="row flexbox-center">
                                <div class="col-lg-6 text-lg-left text-center">
                                    <div class="details-author">
                                        <h4>By Admin:</h4>
                                        <img src="<?php echo $profilePic ?>" alt="" class="rounded-circle" style="width: 50px; height: 50px;">

                                    </div>
                                </div>
                                <div class="col-lg-6 text-lg-right text-center">
                                    <div class="details-author">
                                        <h4>Share:</h4>
                                        <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        <a href="#"><i class="icofont icofont-social-pinterest"></i></a>
                                        <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                                        <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <img src="assets/img/blog-detail.png" alt="" />
                        </div>
                        <div class="details-reply">
                            <h2>Leave a Reply</h2>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="select-container">
                                            <input type="text" placeholder="Name" />
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="select-container">
                                            <input type="text" placeholder="Email" />
                                            <i class="icofont icofont-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="select-container">
                                            <input type="text" placeholder="Phone" />
                                            <i class="icofont icofont-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="textarea-container">
                                            <textarea placeholder="Type Here Message"></textarea>
                                            <button><i class="icofont icofont-send-mail"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="details-comment">
                            <a class="theme-btn theme-btn2" href="#">Post Comment</a>
                            <p>You may use these HTML tags and attributes: You may use these HTML tags and attributes:
                                You may use these HTML tags and attributes: </p>
                        </div>
                        <div class="details-thumb">
                            <div class="details-thumb-prev">
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-left"></i>
                                </div>
                                <div class="thumb-text">
                                    <h4>Previous Post</h4>
                                    <p>Standard Post With Gallery</p>
                                </div>
                            </div>
                            <div class="details-thumb-next">
                                <div class="thumb-text">
                                    <h4>Next Post</h4>
                                    <p>Standard Post With Preview Image</p>
                                </div>
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <h4>Recent Posts</h4>
                        <ul>
                            <li><a href="#">Transformers: The Last Knight</a></li>
                            <li><a href="#">Duis aute irure dolor in reprehenderit in voluptate</a></li>
                            <li><a href="#">Nostrud exercitation ullamco laboris</a></li>
                            <li><a href="#">Magnam aliquam quaerat voluptatem</a></li>
                            <li><a href="#">Magnam aliquam quaerat voluptatem</a></li>
                            <li><a href="#">Excepteur sint occaecat cupidatat proi</a></li>
                        </ul>
                        <h4>Recent Comments</h4>
                        <ul>
                            <li><a href="#">admin on Justice League</a></li>
                            <li><a href="#">admin on Mask Man</a></li>
                            <li><a href="#">admin on Angle Pori</a></li>
                            <li><a href="#">admin on The Man</a></li>
                            <li><a href="#">admin on WP Devil</a></li>
                        </ul>

                        <!-- <div class="portfolio-sidebar">
                            <img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- blog area end -->
    <!-- footer section start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <img src="assets/img/logo.png" alt="about" />
                        <p>7th Harley Place, London W1G 8LZ United Kingdom</p>
                        <h6><span>Call us: </span>(+880) 111 222 3456</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4>Account</h4>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Watchlist</a></li>
                            <li><a href="#">Collections</a></li>
                            <li><a href="#">User Guide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter system now to get latest news from us.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email.." />
                            <button>SUBSCRIBE NOW</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left">
                        <div class="copyright-content">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="copyright-content">
                            <a href="#" class="scrollToTop">
                                Back to top<i class="icofont icofont-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- footer section end -->
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