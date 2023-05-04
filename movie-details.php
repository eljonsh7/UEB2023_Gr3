<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'moviedb';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);


$ID = $_GET['id'];

$sql = "SELECT content.Trailer, content.Type, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ' | ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.ID = '$ID'
    GROUP BY content.ID";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

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

    <style>
      #watchlist-button {
        display: inline-block;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        cursor: pointer;
      }

      #watchlist-button.watchlisted {
        background-color: white;
      }

      #watchlist-button.watchlisted:hover, #watchlist-button:hover {
        background-color: gray;
      }
      @media screen and (min-width: 992px) {
        .contentInformation{
            padding-left: 3%;
        }
    }
    @media screen and (max-width: 991px) {
        .contentInformation{
            padding-top: 3%;
        }
    }
    @media screen and (max-width: 767px) {
        .transformers-area{
            margin-top: -30%;
        }
    }
    
    .comment_img {
      border-radius: 50%;
    }
    table > tr > td > p {
      margin-left: 5%;
    }

    #com:hover {
			background-color: #007bff;
			color: white;
		}
		#com {
			background-color: black;
			color: white;
      margin-top: 2%;
		}
    </style>


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
    <!-- transformers area start -->
    <?php

  if ($_GET['type'] == "Movie") {
    echo '<section class="transformers-area">
      <div class="container">
        <div class="transformers-box">
          <div class="row flexbox-center">
            <div class="col-lg-5 text-lg-left text-center">
              <div class="transformers-content">
                <img src="' . $row["Cover"] . '" alt="about" />
              </div>
            </div>
            <div class="col-lg-7 contentInformation">
              <div class="transformers-content">
                <h2>' . $row["Title"] . '</h2>
                <p>' . $row['Genre'] . '</p>
                <ul>
                  <li>
                    <div class="transformers-left">Rating:</div>
                    <div class="transformers-right">
                      <i class="icofont icofont-star">' . ' ' . $row['Rating'] . '</i>
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Director:</div>
                    <div class="transformers-right">
                      ' . $row['Director'] . '
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Studio:</div>
                    <div class="transformers-right">' . $row['Studio'] . '</div>
                  </li>
                  <li>
                    <div class="transformers-left">Length:</div>
                    <div class="transformers-right">' . $row['Length'] . ' minutes</div>
                  </li>
                  <li>
                    <div class="transformers-left">Release:</div>
                    <div class="transformers-right">' . $row['Date'] . '</div>
                  </li>';
                  if(isset($_SESSION['user'])){
                    $stmt1 = mysqli_prepare($conn, "SELECT * FROM Watchlist WHERE User_ID = ? AND Content_ID = ?");
                    mysqli_stmt_bind_param($stmt1, 'ii', $_SESSION['user'], $_GET['id']);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);

                    echo '<li>
                        <div class="transformers-left" style="margin-right:2%;">Add to watchlist:</div>
                        <div class="transformers-right ';
                        if (mysqli_num_rows($result1) > 0) {
                          echo 'watchlisted';
                        }
                        echo '" id="watchlist-button"></div>
                      </li>';
                  }
                  echo '
                </ul>
              </div>
            </div>
          </div>
          <a href="' . $row['Trailer'] . '" class="theme-btn popup-youtube"
          >Trailer  ▶</a
        >
        </div>
      </div>
    </section>';
  } else if ($_GET['type'] == "TV Show") {
    echo '<section class="transformers-area">
      <div class="container">
        <div class="transformers-box">
          <div class="row flexbox-center">
            <div class="col-lg-5 text-lg-left text-center">
              <div class="transformers-content">
                <img src="' . $row["Cover"] . '" alt="about" />
              </div>
            </div>
            <div class="col-lg-7 contentInformation">
              <div class="transformers-content">
                <h2>' . $row["Title"] . '</h2>
                <p>' . $row['Genre'] . '</p>
                <ul>
                  <li>
                    <div class="transformers-left">Rating:</div>
                    <div class="transformers-right">
                      <i class="icofont icofont-star">' . $row['Rating'] . '</i>
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Director:</div>
                    <div class="transformers-right">
                      ' . $row['Director'] . '
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Studio:</div>
                    <div class="transformers-right">' . $row['Studio'] . '</div>
                  </li>
                  <li>
                    <div class="transformers-left">Status:</div>
                    <div class="transformers-right">' . $row['Status'] . '</div>
                  </li>
                  <li>
                    <div class="transformers-left">Start Date:</div>
                    <div class="transformers-right">' . $row['Date'] . '</div>
                  </li>';
                  if(isset($_SESSION['user'])){
                    $stmt1 = mysqli_prepare($conn, "SELECT * FROM Watchlist WHERE User_ID = ? AND Content_ID = ?");
                    mysqli_stmt_bind_param($stmt1, 'ii', $_SESSION['user'], $_GET['id']);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);

                    echo '<li>
                        <div class="transformers-left" style="margin-right:2%;">Add to watchlist:</div>
                        <div class="transformers-right ';
                        if (mysqli_num_rows($result1) > 0) {
                          echo 'watchlisted';
                        }
                        echo '" id="watchlist-button"></div>
                      </li>';
                  }
                  echo '
                </ul>
              </div>
            </div>
          </div>
          
          <a href="' . $row['Trailer'] . '" class="theme-btn popup-youtube"
            >Trailer  ▶</a
          >
        </div>
      </div>
    </section>';
  }




  ?>
    <!-- transformers area end -->
    <!-- details area start -->
    <section class="details-area">
        <div class="container">
            <div>
                <div>
                    <div class="details-content">
                        <div class="details-overview">
                          <h2>Comments</h2>
                          <?php
                            include("connection.php");

                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }

                            $stmt = mysqli_prepare($conn, "SELECT c.ID AS CID, c.Comment, u.ID, u.Firstname, u.Lastname, u.Photo FROM Comments c JOIN Users u ON c.User_id = u.ID WHERE c.Content_ID = ?");
                            mysqli_stmt_bind_param($stmt, 's', $_GET['id']);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while($row2 = $result->fetch_assoc()) {
                              echo "<table style='table-layout: auto; margin-bottom: 3%;'>";
                              echo "<tr>";
                              echo "<td width='50'><img src='" . $row2["Photo"] . "' width='40' height='40' class='comment_img'></td>";
                              echo "<td><p><b>" . $row2["Firstname"] . " " . $row2["Lastname"] . ": <b></p></td>";
                              echo "</tr>";
                              echo "<tr><td>";
                              if(isset($_SESSION['user']) && $_SESSION['user'] == $row2['ID']) {
                                echo "<a href='movie-details.php?id=".$row['ID']."&type=".$row['Type']."&delete=".$row2['CID']."' id='delete' style='color:red;'>Delete</a>";
                              }
                              echo "</td><td><p>" . $row2["Comment"] . "</p></td>";
                              echo "</tr>";
                              echo "</table>";
                            }

                            if (isset($_GET['delete'])){
                              $stmt3 = mysqli_prepare($conn, "DELETE FROM Comments WHERE ID = ?");
                              mysqli_stmt_bind_param($stmt3, 's', $_GET['delete']);
                              mysqli_stmt_execute($stmt3);
                              unset($_GET['delete']);
                            }
                          ?>
                        </div>
                        <div class="details-reply">
                          <h2>Leave a Comment</h2>
                          <form method="post">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="textarea-container">
                                      <textarea style="background: #13151f; color: white;" placeholder="Comment Here ..." class="form-control" id="message" name="message"></textarea>
                                      </div>
                                  </div>
                              </div>
                              <div class="details-comment">
                                <input type="submit" class="btn btn-primary" id="com" name="com" value="Post Comment">
                            </div>
                          </form>
                        </div>
                        <?php
                          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if ( isset($_SESSION['user'])){
                              $stmt2 = mysqli_prepare($conn, "INSERT INTO Comments (Content_ID, User_ID, Comment) VALUES (?, ?, ?)");
                              mysqli_stmt_bind_param($stmt2, 'sss', $_GET['id'], $_SESSION['user'], $_POST['message']);
                              mysqli_stmt_execute($stmt2);
                            } else {
                              echo "<script>alert('You are not logged in!')</script>";
                            }
                          } 
                        ?>
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
            </div>
        </div>
    </section>
    <!-- details area end -->
    <!-- footer section start -->
    <?php include("footer.php"); ?>
    <!-- footer section end -->
    <script>
      var watchlistButton = document.getElementById("watchlist-button");

      watchlistButton.addEventListener("click", function() {
        if (watchlistButton.classList.contains("watchlisted")) {
          watchlistButton.classList.remove("watchlisted");
          removeFromWatchlist(<?php echo $_GET['id']; ?>);
        } else {
          watchlistButton.classList.add("watchlisted");
          addToWatchlist(<?php echo $_GET['id']; ?>);
        }

        updateWatchlistButton();
      });

      function addToWatchlist(content_id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "watchlist-add.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("content_id=" + content_id);
      }

      function removeFromWatchlist(content_id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "watchlist-remove.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("content_id=" + content_id);
      }
    </script>

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