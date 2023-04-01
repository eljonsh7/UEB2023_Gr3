<header class="header">
<div class="container">
    <div class="header-area">
        <div class="logo">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" /></a>
        </div>
        <?php 
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'moviedb';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);
		


		$sql = "SELECT * FROM `movies`";

		$result = mysqli_query( $conn, $sql );


        ?>
        <div class="menu-area">
            <div class="responsive-menu"></div>
            <div class="mainmenu">
                <ul id="primary-menu">
                    <li><a class="home" href="index.php">Home</a></li>
                    <li><a class="movies" href="movies.php">Movies</a></li>
                    <li><a class="tv" href="tv-shows.php">Tv Shows</a></li>
                    <li><a class="imdb" href="top-movies.php">Top IMDb</a></li>
                    <li><a href="#">Profile <i class="icofont icofont-simple-down"></i></a>
                        <ul>
                            <li><a href="" class="signup-popup">Log in</a></li>
                            <li><a href="" class="login-popup">Sign up</a></li>
                        </ul>
                    </li>
                    <li><form  style = "display: flex;" method = "post" >
                        <input type="text" name = "search" placeholder = "Search..." class = "form-control" id = "live_search" autocomplete = "off">
                        <input type="submit" value="Go">
                    </form>
                <div id = "searchresult">

                </div></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type = "text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
            alert (input);
            if(input != ""){
                $.ajax({
                    url: "livesearch.php",
                    method:"POST",
                    data:{input:input},

                    success: function(data){
                        $("#searchresult").html(data);
                    }
                });
            } else {
                $("#searchresult").css("display", "none");
            }
        });
    });

</script>
</header>
<div class="login-area signup-area">
			<div class="login-box">
				<a href="#"><i class="icofont icofont-close"></i></a>
				<h2>LOG IN</h2>
				<form action="#">
					<h6>USERNAME OR EMAIL ADDRESS</h6>
					<input type="text" />
					<h6>PASSWORD</h6>
					<input type="password" id="password-field-login" class="field input" required placeholder="Password"/>
					<div class="login-remember">
						<input type="checkbox" />
						<span>Remember Me</span>
					</div>
					<button class="theme-btn">LOG IN</button>
					<span>Or Via Social</span>
					<div class="login-social">
						<a href="#"><i class="icofont icofont-social-facebook"></i></a>
						<a href="#"><i class="icofont icofont-social-twitter"></i></a>
						<a href="#"><i class="icofont icofont-social-linkedin"></i></a>
						<a href="#"><i class="icofont icofont-social-google-plus"></i></a>
						<a href="#"><i class="icofont icofont-camera"></i></a>
					</div>
				</form>
			</div>
		</div>
		<div class="login-area">
			<div class="login-box">
				<a href="#"><i class="icofont icofont-close"></i></a>
				<h2>SIGN UP</h2>
				<form action="#">
					<h6>USERNAME OR EMAIL ADDRESS</h6>
					<input type="text" id="email-field" class="field input" required />
					<h6>PASSWORD</h6>
					<input type="password" id="password-field" class="field input" required onkeyup="verifyPassword()" />
					<p id="all" style="display: none; justify-content: center;">Password must contain at least one capital 
					letter, one digit and must be at least 8 characters long!</p>
					<h6>CONFIRM PASSWORD</h6>
					<input type="password" id="password-field2" class="field input" required onkeyup="verifyPassword()" />
					<p id="isItSame" style="display: none; justify-content: center;">Passwords don't match</p>
					<div class="login-remember">
						<input type="checkbox" />
						<span>Remember Me</span>
					</div>
					<button class="theme-btn" id="sign-up" disabled>SIGN UP</button>
					<span>Or Via Social</span>
					<div class="login-social">
						<a href="#"><i class="icofont icofont-social-facebook"></i></a>
						<a href="#"><i class="icofont icofont-social-twitter"></i></a>
						<a href="#"><i class="icofont icofont-social-linkedin"></i></a>
						<a href="#"><i class="icofont icofont-social-google-plus"></i></a>
						<a href="#"><i class="icofont icofont-camera"></i></a>
					</div>
				</form>
			</div>
		</div>
        <script>

function verifyPassword() {
  const password1 = document.getElementById("password-field").value;
  const password2 = document.getElementById("password-field2").value;
  const signUpButton = document.getElementById("sign-up");
  const errorMessage = document.getElementById("isItSame");
  const allMessage = document.getElementById("all");

  const passwordRegex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
  const isPasswordValid =
    password1 === password2 && passwordRegex.test(password1);

  if (!passwordRegex.test(password1)) {
    allMessage.style.display = "flex";
    allMessage.style.color = "red";
  } else {
    allMessage.style.display = "none";
  }

  if (password2.length != 0) {
    if (password1 !== password2) {
      errorMessage.style.display = "flex";
      errorMessage.style.color = "red";
    } else {
      errorMessage.style.display = "none";
    }
  }

  signUpButton.disabled = !isPasswordValid;
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