<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Dashboard
  </title>
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
  <style>
    .table td,
    .table th {
      white-space: normal;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="movies-tb.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Movies table</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="shows-tb.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tv Shows table</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="sign-up.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">TV Shows table</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">TV Shows table</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Movie table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <?php
        // connect to the database
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'moviedb';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);

		class input{
			public $value;
			public $id;


			function __construct($value,$id){
				$this->value = $value;
				$this->id = $id;
			}
		}
        // check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addForm'])) {
            // check which form was submitted
            
                // get the form data
				$title = new input($_POST['title'],"title");
				$date = new input($_POST['date'],"date");
				$rating = new input($_POST['rating'],"rating");
				$director = new input($_POST['director'],"director");
				$studio = new input($_POST['studio'],"studio");
				$cover = new input($_POST['cover'],"cover");
				$trailer = new input($_POST['trailer'],"trailer");
				$description = new input(mysqli_real_escape_string($conn,$_POST['description']),"description");
				$genre = new input($_POST['genre'],"genre");
				$length = new input($_POST['length'],"length");
				$inputs = [$title,$date,$rating,$director,$studio,$cover,$trailer,$description,$genre,$length];
				$temp = false;
				for($i = 0; $i < sizeof($inputs) ; $i++){
					if(empty($inputs[$i]->value)){
						echo '<script>document.getElementById("'.$inputs[$i]->id.'").style.border="2px solid red";</script>';
						$temp = true;
					}else{
						echo '<script>document.getElementById("'.$inputs[$i]->id.'").value="'.$inputs[$i]->value.'";</script>';
					}
					if(($i == sizeof($inputs)-1) && $temp == true){
						echo "<h3>Please fill out every information about the movie!</h3>";
					}
				}
                if($temp == false){
                	$sql = "INSERT INTO tvshows (Title, Date, Rating, Director, Studio, Trailer, Description, Cover, Genre, Length) VALUES ('$title->value', '$date->value', '$rating->value', '$director->value', '$studio->value',  '$trailer->value','$description->value','$cover->value', '$genre->value', '$length->value')";
                	mysqli_query($conn, $sql);
					for($i = 0; $i < sizeof($inputs) ; $i++){
							echo '<script>document.getElementById("'.$inputs[$i]->id.'").value="'."".'";</script>';
					}
				}
        }

		echo '<table class="table align-items-center mb-0" width="300px">
				<tr>
          <th>Cover</th>
					<th>Title</th>
					<th>Started</th>
                    <th>Status</th>
					<th>Rating</th>
					<th>Director</th>
					<th>Studio</th>
					<th>Trailer</th>
					<th>Description</th>
					<th>Genre</th>
					<th></th>
				</tr>';
		$sql = "SELECT * FROM `tvshows`";
		$result = mysqli_query( $conn, $sql);
				while( $row = mysqli_fetch_array($result) ){
					echo '
                    <tr>
                        <td><img src="'.$row['Cover'].'" width="70px" height="94.5px"></td>
                        <td><a href="movie-details.php?id='.$row['ID'].'&type=Movie&mode=info">'.$row['Title'].'</a></td>
                        <td>'.$row['StartDate'].'</td>
                        <td>'.$row['Status'].'</td>
                        <td>'.$row['Rating'].'</td>
                        <td>'.$row['Director'].'</td>
                        <td>'.$row['Studio'].'</td>
                        <td>'.substr($row['Trailer'],0,30).'</td>
                        <td>'.substr($row['Description'],0,40).'</td>
                        <td>'.$row['Genre'].'</td>
                        <td><a href="addMovie.php?removeID='.$row['ID'].'&mode=remove">x</a></td>
                    </tr>';
				}
		echo '</table>';
		if(isset($_GET['mode'])){
			echo '<form id="movie-remove" method="post">
					<div class="overlay">
  						<div class="modal">
    						<input type="hidden" name="popForm" value="submitted">
							<button style="background-color:red;margin:2%;"><a href="addMovie.php?removeID='.$_GET['removeID'].'&mode=remove&confirm=1">Remove</a></button>
							<button style="background-color:green;margin:2%;"><a href="addMovie.php">Cancel</a></button>
  						</div>
					</div>
					
					</form>';
		}
		if(isset($_GET['confirm'])){
			$removeID=$_GET['removeID'];
			$sql = "DELETE FROM `movies` WHERE `movies`.`ID` = $removeID";
            mysqli_query($conn, $sql);
			echo '<script>window.location.href = "addMovie.php";</script>';
		}
    ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart"></i> by BBEÇ
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js2/core/popper.min.js"></script>
  <script src="assets/js2/core/bootstrap.min.js"></script>
  <script src="assets/js2/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js2/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js2/material-dashboard.min.js?v=3.0.5"></script>
</body>

</html>