<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    echo '<script>window.location.href = "../index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FlixFeast</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/css2/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css2/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css2/material-dashboard.css?v=3.0.5" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
    .table td,
    .table th {
        white-space: normal;
    }

    .form-control {
        background-color: #2e3757;
        padding: 5px;
    }

    .form-group {
        width: 600px;
    }




    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 auto;
            width: 100%;
        }
    }

    body {
        overflow-x: hidden;
    }

    p {
        overflow: auto;
    }
    textarea {
            height: 250px; /* set the height to 200 pixels */
            overflow-y: auto; /* add a vertical scrollbar when the content overflows */
            resize:none;
        }
    </style>
</head>


<body class="g-sidenav-show dark-version bg-gray-200">

    <?php
    echo '
<style>
    .table td,
    .table th {
        white-space: normal;
    }

    .overlay {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 30%;
        height: 25%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 7px;
    }

    .modal p {
        margin-top: 0;
        margin-bottom: 1em;
        text-align: center;
    }

    .modal-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 5%;
        width: 60%;
    }

    .modal-buttons a {
        width: 30%;
    }
</style>
<script>
    document.addEventListener(\'DOMContentLoaded\', function() {
        var element = document.getElementById("questions")';


    echo '");
        element.classList.add("active", "bg-gradient-primary");
    });
</script>';


    include('header.php');
    include('connection.php');


    if (!isset($_GET['detailsID'])) {
        header("Location:questions.php");
    }


    $ID = $_GET['detailsID'];

    
    $sql = "SELECT ID,email,title,question
    FROM faq
    WHERE ID = $ID";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);


    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-sm" aria-current="page"><a class="opacity-5 text-dark" href="questions.php">Questions Table</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Answering Question</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">#<?php echo $ID?></h6>
                </nav>
            </div>
        </nav>
        <?php


        class input
        {
            public $value;
            public $id;


            function __construct($value, $id)
            {
                $this->value = $value;
                $this->id = $id;
            }
        }

            echo '
            <div style = "margin-left:3%;margin-top:3%;" >
            
                <div id="viewDetails" style="width:50%;margin-left:5%;">
                    <p id="titleInfo" class="details"><b>Title:</b> <br>' . $row['title'] . '</p>
                    <p id="questionInfo" class="details"><b>Question:</b> <br>' . $row['question'] . '</p>
                </div>
                <div class="container" style="padding:3%;">
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
                </div>
            </div>
            ';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $question = $_POST['question'];
                echo '<script>console.log("'.$title.'")</script>';
                echo '<script>console.log("'.$question.'")</script>';
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
                    $_POST['message'] = "Please fill the entire form!";
                    include('../Services/notify.php');
                }
                if(!empty($question)&& !empty($title)){
                    $stmt = $conn->prepare("DELETE FROM faq WHERE ID=?");
                    $stmt->bind_param('d', $ID);
                    $stmt->execute();
                    $_POST['message'] = "The question was answered!";
                    include('../Services/notify.php');
                }
            }


        ?>
    </main>
    <!-- details area end -->
    <!-- footer section start -->
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