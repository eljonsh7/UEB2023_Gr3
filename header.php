
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
                    <li><form  style = "display: flex;" method = "post">
                        <input type="text" name = "search" placeholder = "Search..." >
                        <input type="submit" value="Go">
                    </form></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</header>
