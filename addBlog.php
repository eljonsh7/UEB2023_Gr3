<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css" />
    <!-- Popup CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css" />
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

    <!-- header section end -->
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->


    <form id="blog-add" method="post" style="width: 50%; margin: 0 auto;">
        <h2>Blog</h2>
        <input type="hidden" name="addForm" value="submitted">
        <label for="title">Title:</label>
        <input class="form-control" type="text" id="title" placeholder="Title:" name="title"><br>

        <label for="id">Author ID:</label>
        <input class="form-control" type="text" id="id" placeholder="Author ID:" name="id"><br>

        <label for="content">Content:</label>
        <textarea class="form-control" id="content" placeholder="Content:" name="content"></textarea><br>

        <label for="image">Image URL:</label>
        <input class="form-control" type="text" id="image" placeholder="Image URL:" name="image"><br>


        <input class="form-control submit" type="submit" value="Submit" name="blog_submit">
    </form>

    <?php
    // connect to the database
    include ('connection.php');
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

        // get the form data
        $title = new input($_POST['title'], "title");
        $id = new input($_POST['id'], "id");
        $content = new input($_POST['content'], "content");
        $image = new input($_POST['image'], "image");
        $inputs = [$title, $id, $content, $image];
        $temp = false;
        for ($i = 0; $i < sizeof($inputs); $i++) {
            if (empty($inputs[$i]->value)) {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").style.border="2px solid red";</script>';
                $temp = true;
            } else {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").value="' . $inputs[$i]->value . '";</script>';
            }
            if (($i == sizeof($inputs) - 1) && $temp == true) {
                echo "<h3>Please fill out every information about the blog!</h3>";
            }
        }
        if ($temp == false) {
            // insert the data into the movies table
            $sql = "INSERT INTO blogs (Title, AuthorID, Content, Image) VALUES ('$title->value', '$date->value', '$rating->value', '$director->value', '$studio->value',  '$trailer->value','$description->value','$cover->value', '$genre->value', '$length->value')";
            mysqli_query($conn, $sql);
            for ($i = 0; $i < sizeof($inputs); $i++) {
                echo '<script>document.getElementById("' . $inputs[$i]->id . '").value="' . "" . '";</script>';
            }
        }
    }

    echo '<table style="margin: 0 auto;">
				<tr>
					<th>Title</th>
					<th>Author ID:</th>
					<th>Content</th>
					<th>Image URL:</th>
					<th></th>
				</tr>';
    $sql = "SELECT * FROM `blogs`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '
				  			<tr>
								<td><a href="editDetails.php?detailsID=' . $row['ID'] . '&type=Blogs&mode=info">' . $row['Title'] . '</a></td>
								<td>' . $row['Title'] . '</td>
								<td>' . $row['AuthorID'] . '</td>
								<td>' . $row['Content'] . '</td>
								<td>' . $row['Image'] . '</td>
								<td><a href="addBlog.php?removeID=' . $row['ID'] . '&mode=remove">x</a></td>
				  			</tr>
					';
    }
    echo '</table>';
    if (isset($_GET['mode'])) {
        echo '<form id="blog-remove" method="post">
					<div class="overlay">
  						<div class="modal">
    						<input type="hidden" name="popForm" value="submitted">
							<button style="background-color:red;margin:2%;"><a href="addBlog.php?removeID=' . $_GET['removeID'] . '&mode=remove&confirm=1">Remove</a></button>
							<button style="background-color:green;margin:2%;"><a href="addBlog.php">Cancel</a></button>
  						</div>
					</div>
					
					</form>';
    }
    if (isset($_GET['confirm'])) {
        $removeID = $_GET['removeID'];
        $sql = "DELETE FROM `blogs` WHERE `blogs`.`ID` = $removeID";
        mysqli_query($conn, $sql);
        echo '<script>window.location.href = "addBlog.php";</script>';
    }
    ?>


    <!-- details area end -->
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