
<?php session_start();
    include('Services/connection.php')
?>

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
            max-width: 802px;
            margin: 0 auto;
            padding: 22px;
        }

        .faq h2 {
            font-size: 25px;
            margin-bottom: 22px;
            margin-top: 22%;
        }


        .faq h3 {
            font-size: 22px;
            margin-bottom: 12px
        }


        .faq p {
            font-size: 15px;
            line-height: 1.5;
            margin-bottom: 22px;
        }


        .question {
            margin-bottom: 9%;
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
            border: 2px solid white;
            border-radius: 25px;
            padding: 1.4%;
        }

        textarea {
            height: 250px; /* set the height to 200 pixels */
            overflow-y: auto; /* add a vertical scrollbar when the content overflows */
            resize:none;
        }
	</style>
</head>

<body>
	<!-- Page loader -->
	<div id="preloader"></div>
	<!-- header section start -->
	<?php include("Models/header.php"); ?>

    <div class="faq" id="faq">
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

        <?php
            if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
            echo '<div class="container">
            <div class="details-reply">
                <form method="post" id="faqForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="select-container">
                                <input type="text" placeholder="Subject" name="title" id="subject"/>
                                <i class="icofont icofont-question"></i>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="textarea-container">
                                <textarea placeholder="Type Here Message" name="question" id="question"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" style="color:white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>';
            }
        



            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $question = $_POST['question'];
                if(empty($title)){
                    echo '<script>document.getElementById("subject").style.border="2px solid red";</script>';
                    echo '<script>document.getElementById("subject").scrollIntoView({behavior:"smooth"});</script>';
                    if(!empty($question)){
                        echo '<script>document.getElementById("question").value="'.$question.'"</script>';
                    }
                }
                if(empty($question)){
                    echo '<script>document.getElementById("question").style.border="2px solid red";</script>';
                    echo '<script>document.getElementById("question").scrollIntoView({behavior:"smooth"});</script>';
                    if(!empty($title)){
                        echo '<script>document.getElementById("subject  ").value="'.$title.'"</script>';
                    }
                }
                if(empty($question)||empty($title)){
                    $message = "Please fill the entire form!";
                    include('Services/notify.php');
                }
                if(!empty($question)&& !empty($title)){
                    $stmt = $conn->prepare("SELECT Email FROM users WHERE ID=?");
                    $stmt->bind_param('d', $_SESSION['user']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $email = $row['Email'];
                    $stmt = $conn->prepare("INSERT INTO `faq` (email,title,question) VALUES (?,?,?)");
                    $stmt->bind_param("sss", $email,$title,$question);
                    $stmt->execute();
                    $message = "Your question was submited, our support team will get back to you!";
                    include('Services/notify.php');
                }
            }
        ?>
        
        
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