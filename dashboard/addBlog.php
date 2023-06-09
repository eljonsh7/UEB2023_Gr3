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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/css2/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css2/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css2/material-dashboard.css?v=3.0.5" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var element = document.getElementById("blogs");
            element.classList.add("active", "bg-gradient-primary");
        });

        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
    </style>
</head>


<body class="g-sidenav-show dark-version bg-gray-200">

    <?php include("header.php"); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="blogs-tb.php">Blogs
                                table</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Blog</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Add Blog</h6>
                </nav>
            </div>
        </nav>
        <div class="row justify-content-center mt-5" id="blogadd">
            <div class="col-md-6" style="display: flex;">
                <div style="position: relative; margin-right: 50px; ">
                    <img id="imagePreview" src="../assets/img/placeholder.png" alt="Selected Image" style="width: 300px; height: auto; border-radius: 25px">
                </div>
                <form id="blog-add" method="post" enctype="multipart/form-data">
                    <h2>Blog</h2>
                    <input type="hidden" name="addForm" value="submitted">

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" id="title" placeholder="Title:" name="title">
                    </div>

                    <div class="form-group">
                        <label for="rating">Content:</label>
                        <textarea class="form-control" id="content" placeholder="Content:" name="content"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="director">Image:</label>
                        <input class="form-control" type="file" onchange="previewImage(event)" id="image" name="image">
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="btn btn-primary shadow-none" type="submit" value="Submit" name="blog_submit">
                    </div>
                </form>
            </div>
        </div>
        <?php
        // connect to the database
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'moviedb';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

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
        // check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addForm'])) {

            // check which form was submitted
            $image_name = $_FILES['image']['name'];
            $image_temp_name = $_FILES['image']['tmp_name'];
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $img_lc = strtolower($img_ex);
            $allowed_array = array("jpg", "jpeg", "png");
            $new_img_name = "";
            if (in_array($img_lc, $allowed_array)) {
                $new_img_name = "assets/img/blog_images/" . $_POST['title'] . "." . $img_lc;
                $upload_path = '../' . $new_img_name;
                move_uploaded_file($image_temp_name, $upload_path);
            } else {
                echo "Wrong format";
            }

            // get the form data
            $image = new input($new_img_name, "image");
            $title = new input($_POST['title'], "title");
            $content = new input(mysqli_real_escape_string($conn, $_POST['content']), "content");
            $inputs = [$title, $content, $image];
            $temp = false;
            foreach ($inputs as $input) {
                if (empty($input->value)) {
                    echo '<script>document.getElementById("' . $input->id . '").style.border="2px solid red";</script>';
                    $temp = true;
                } else {
                    echo '<script>document.getElementById("' . $input->id . '").value="' . $input->value . '";</script>';
                }
            }
            if ($temp == true) {
                echo "<h6 style='text-align: center;'>Please fill out every information about the blog!</h6>";
            } else {
                // insert the data into the blogs table
                $sql = "INSERT INTO blogs (Title, AuthorID, Content, Image) VALUES ('$title->value', '{$_SESSION['user']}', '$content->value', '$image->value')";

                mysqli_query($conn, $sql);
                foreach ($inputs as $input) {
                    echo '<script>document.getElementById("' . $input->id . '").value="' . "" . '";</script>';
                }
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