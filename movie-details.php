
<?php
 $db_host = 'localhost';
 $db_user = 'root';
 $db_pass = 'root';
 $db_name = 'moviedb';
 $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);
 

 $ID= $_GET['id'];


 if($_GET['type']=="movie"){
     $sql = "SELECT * FROM `movies` WHERE `ID` = $ID";
 }else if($_GET['type']=="tvshow"){
     $sql = "SELECT * FROM `tvshows` WHERE `ID` = $ID";
 }

 $result = mysqli_query( $conn, $sql);
 $row = mysqli_fetch_array($result);
 
?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Moviepoint - Online Movie,Vedio and TV Show HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="assets/img/favcion.png" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
      media="all"
    />
    <!-- Slick nav CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/slicknav.min.css"
      media="all"
    />
    <!-- Iconfont CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/icofont.css"
      media="all"
    />
    <!-- Owl carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css" />
    <!-- Popup CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/magnific-popup.css"
    />
    <!-- Main style CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/style.css"
      media="all"
    />
    <!-- Responsive CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/responsive.css"
      media="all"
    />
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
    
    if($_GET['type']=="movie"){
      echo '<section class="transformers-area">
      <div class="container">
        <div class="transformers-box">
          <div class="row flexbox-center">
            <div class="col-lg-5 text-lg-left text-center">
              <div class="transformers-content">
                <img src="'.$row["Cover"].'" alt="about" />
              </div>
            </div>
            <div class="col-lg-7">
              <div class="transformers-content">
                <h2>'.$row["Title"].'</h2>
                <p>'.$row['Genre'].'</p>
                <ul>
                  <li>
                    <div class="transformers-left">Rating:</div>
                    <div class="transformers-right">
                      <i class="icofont icofont-star">'.$row['Rating'].'</i>
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Director:</div>
                    <div class="transformers-right">
                      '.$row['Director'].'
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Studio:</div>
                    <div class="transformers-right">'.$row['Studio'].'</div>
                  </li>
                  <li>
                    <div class="transformers-left">Length:</div>
                    <div class="transformers-right">'.$row['Length'].' minutes</div>
                  </li>
                  <li>
                    <div class="transformers-left">Release:</div>
                    <div class="transformers-right">'.$row['Date'].'</div>
                  </li>
                  
                  
                  
                </ul>
              </div>
            </div>
          </div>
          <a href="'.$row['Trailer'].'" class="theme-btn popup-youtube"
          >Trailer  ▶</a
        >
        </div>
      </div>
    </section>';
    }else if($_GET['type']=="tvshow"){
      echo '<section class="transformers-area">
      <div class="container">
        <div class="transformers-box">
          <div class="row flexbox-center">
            <div class="col-lg-5 text-lg-left text-center">
              <div class="transformers-content">
                <img src="'.$row["Cover"].'" alt="about" />
              </div>
            </div>
            <div class="col-lg-7">
              <div class="transformers-content">
                <h2>'.$row["Title"].'</h2>
                <p>'.$row['Genre'].'</p>
                <ul>
                  <li>
                    <div class="transformers-left">Rating:</div>
                    <div class="transformers-right">
                      <i class="icofont icofont-star">'.$row['Rating'].'</i>
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Director:</div>
                    <div class="transformers-right">
                      '.$row['Director'].'
                    </div>
                  </li>
                  <li>
                    <div class="transformers-left">Studio:</div>
                    <div class="transformers-right">'.$row['Studio'].'</div>
                  </li>
                  <li>
                    <div class="transformers-left">Status:</div>
                    <div class="transformers-right">'.$row['Status'].'</div>
                  </li>
                  <li>
                    <div class="transformers-left">Start Date:</div>
                    <div class="transformers-right">'.$row['StartDate'].'</div>
                  </li>
              
                  
                  
                </ul>
              </div>
            </div>
          </div>
          
          <a href="'.$row['Trailer'].'" class="theme-btn popup-youtube"
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
        <div class="row">
          <div class="col-lg-9">
            <div class="details-content">
              <div class="details-overview">
                <h2>Overview</h2>
                <p>
                  Humans are at war with the Transformers, and Optimus Prime is
                  gone. The key to saving the future lies buried in the secrets
                  of the past and the hidden history of Transformers on Earth.
                  Now it's up to the unlikely alliance of inventor Cade Yeager,
                  Bumblebee, a n English lord and an Oxford professor to save
                  the world. Transformers: The Last Knight has a deeper mythos
                  and bigger spectacle than its predecessors, yet still ends up
                  being mostly hollow and cacophonous. The first "Transformers"
                  movie that could actually be characterized as badass. Which
                  isn't a bad thing. It may, in fact, be better.
                </p>
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
                        <button>
                          <i class="icofont icofont-send-mail"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="details-comment">
                <a class="theme-btn theme-btn2" href="#">Post Comment</a>
                <p>
                  You may use these HTML tags and attributes: You may use these
                  HTML tags and attributes: You may use these HTML tags and
                  attributes:
                </p>
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
          <div class="col-lg-3 text-center text-lg-left">
            <div class="portfolio-sidebar">
              <img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
              <img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
              <img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- details area end -->
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
