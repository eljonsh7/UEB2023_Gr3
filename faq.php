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

	<title>Edit Profile</title>
	<style>
        .faq {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 20px;
        }

        .faq h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .faq h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .faq p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .question {
            margin-bottom: 8%;
        }

		#send:hover {
			background-color: #007bff;
			color: white;
		}

		#send {
            border: black;
			background-color: black;
			color: white;
            margin: 1%;
		}

        #container {
            border: 1px solid white;
            border-radius: 20px;
            padding: 1.5%;
        }
	</style>
</head>

<body>
	<!-- Page loader -->
	<div id="preloader"></div>
	<!-- header section start -->
	<?php include("Models/header.php"); ?>

    <div class="faq">
        <h2>Frequently Asked Questions</h2>
        <hr />
        <br><br>
        
        <div class="question">
            <h3>Is FlixFeast safe to use?</h3>
            <p>Yes, FlixFeast prioritizes user safety and data security. We employ the latest security measures to protect your information and ensure a safe browsing experience.</p>
        </div>
        
        <div class="question">
            <h3>Can I submit movie data to FlixFeast?</h3>
            <p>Currently, only authorized contributors can submit movie data to FlixFeast. However, we appreciate your interest, and if you believe you have valuable contributions, please contact our support team.</p>
        </div>
        
        <div class="question">
            <h3>Where can I find the plot details of a movie?</h3>
            <p>You can find the plot details of a movie on the movie's detail page. Once you search for a movie or browse through our collection, click on the movie's title or poster to access its dedicated page with comprehensive information, including the plot.</p>
        </div>

        <div class="question">
            <h3>How can I search for movies on FlixFeast?</h3>
            <p>You can find the search bar in the top-right corner of the page. There you can search for any movie in our database.</p>
        </div>

        <div class="question">
            <h3>Can I create an account on FlixFeast?</h3>
            <p>Yes, absolutely. You can click or hover on Profile and then you can click Sign Up and fill the form.</p>
        </div>

        <div class="question">
            <h3>Can I rate and review movies on FlixFeast?</h3>
            <p>For the moment it is not possible, but we will bring the option soon.</p>
        </div>

        <div class="question">
            <h3>Can I create a personalized watchlist on FlixFeast?</h3>
            <p>Yes. You can create the watchlist after you have signed in. In the top-right corner of every movie or tv-show.</p>
        </div>
        
        <div class="question">
            <h3>Are there any subscription fees or charges for using FlixFeast?</h3>
            <p>No. FlixFeast is and always will be free.</p>
        </div>
        
    </div>
    <div class="container mt-5" id="container">
        <h1>Contact FlixFeast</h1>
        <hr style="margin: 1% 0% 2% 0%;"/>
        <p style="margin:1%;">If you have any questions or feedback, please feel free to send us an email:</p>

        <a href="mailto:flixfeastt@gmail.com" class="btn btn-primary" id='send'>Send Email</a>
    </div>



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