<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-bar input[type="text"] {
            width: 160px;
        }

        li div form input{
            width: 3%;
        }

        header {
            padding: 0;
        }
    </style>
</head>
<body style="background-color: #245953;">
	<header>
		<nav>
			<div class="logo">
				<a href="index.php"><img src="img/logo.png"></a>
			</div>
			<ul class="nav-links">
            <li><a href="home.php">Home</a></li>
				<li><a href="movies.php">Movies</a></li>
				<li><a href="shows.php">TV Shows</a></li>
				<li><a href="imdb.php">Top IMDb</a></li>
                <li>
					<div class="search-bar">
						<form method="get">
							<input type="text" id="movieSearch" name="movie" required name="search" placeholder="Search more...">
						</form>
					</div>
				</li>
                <li><a href="user.php" class="popup-trigger">Sign In</a></li>
			</ul>
		</nav>
    </header>
</body>
</html>