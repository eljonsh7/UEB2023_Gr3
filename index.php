<!DOCTYPE html>
<html>
<head>
	<title>Movie Database</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyAJFJEU0kzalyoyPCcBRMM0HMATkEOm39Y",
            authDomain: "flixfeast-41f8a.firebaseapp.com",
            databaseURL: "https://flixfeast-41f8a-default-rtdb.europe-west1.firebasedatabase.app",
            projectId: "flixfeast-41f8a",
            storageBucket: "flixfeast-41f8a.appspot.com",
            messagingSenderId: "276052979687",
            appId: "1:276052979687:web:c3e353cb0413e657fa1742",
            measurementId: "G-RW79K5M3V3"
  };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);

        // import {getDatabase, ref, get, set, child, update, remove}
        // from "https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js";

        // const db = getDatabase();

        // function SelectData(){
        //     const dbref = ref(db);
        //     get(child(dbref, "movies/" + movieID)).then((snapshot) => {
        //         if(snapshot.exists()){
        //             console.log(snapshot.val().Title);
        //         }else{
        //             console.log("Doesn't exist!");
        //         }
        //     })
        // }

        // let movieID = 2;
        // let sub = document.getElementById("Test12345");

        // sub.addEventListener('click',SelectData);

        

        // var firebaseRef = firebase.database().ref("movies");
        // firebaseRef.once("value", function(snapshot){
        //     var data = snapshot.val();
        //     for(let i in data){
        //         console.log(data[i]);
        //     }
        // })
        
    </script>
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
                <li><a href="user.php" class="popup-trigger">Sign In</a></li>
			</ul>
		</nav>
	</header>

    <div>
        <div class="home-container">
            <section class="home-hero">
                <header class="home-header" style="background-color:transparent">
                    <h1 class="home-text07"><img src="img/logotab.png" width='50px' height='50px' style="margin-right: 10px;"> FlixFeast - Guide for unlimited movies, TV shows, and more.</h1>
                </header>
            </section>
        </div>
    </div>

    <div class="search-bar">
        <form method="get">
            <input type="text" id="movieSearch" onkeyup="" name="movie" required name="search" placeholder="Search movies and TV shows...">
            <button type="button" id="Test12345">Search</button>
        </form>
    </div>

    <div id="searchResult"></div>

    <?php
        // if (isset($_GET['movie'])) {
        //     echo "<div class='films'>";
        //     $movie_name = urlencode($_GET['movie']);
        //     $url = "http://www.omdbapi.com/?s={$movie_name}&apikey=9447b058";
        //     $json = file_get_contents($url);
        //     $data = json_decode($json, true);
        //     if ($data['Response'] == 'True') {
        //         foreach ($data['Search'] as $result) {
        //             echo "<div class='film'><a class='hovertext'>";
        //             echo "<img src='{$result['Poster']}' alt='{$result['Title']}' class='images'><br>";
        //             echo "<p>{$result['Title']}</p>";
        //             echo "</a></div>";
        //         }
        //     } else {
        //         echo "<p>No results found for '{$_GET['movie']}'</p>";
        //     }
        //     echo "<style>.aboutus{display: none;}</style></div>";
        // }
    ?>

    <?php
    echo '<script type="module" src ="searchM.js"></script>';
    ?>
    <br><br>

    <div class="aboutus">
        <p id="matches"><span style="font-size: 16px;"><strong>Watch Movies Online For Free</strong></span><br>
            FlixFeast is the best website that allows users to watch HD movies and TV shows online free with no
            registration required. The new HD movies and shows are updated daily on various genres such as romance,
            action, adventure, comedy, etc. FlixFeast is likely to have all the movies you are looking for on the site,
            If not you can simply request it and it will be available for you to watch shortly.</p>

        <p><br> <span style="font-size: 16px;"><strong>What is FlixFeast?</strong></span><br>
            FlixFeast is your go-to website to watch free HD movies and TV shows! Here you can download or watch
            thousands of movies and series online seamlessly. FlixFeast also provides the ad-free feature as well as
            private source links for their users safety.&nbsp;<br>
            We want to make movies and TV shows available for everyone regardless of their financial situation. Although
            this is a long journey, we strongly believe we can become the #1 Netflix alternative shortly with your
            support.</p>

        <p id="zevendeso"><br> <span style="font-size: 16px;"><strong>Is It legal to Use FlixFeast?</strong></span><br>
            If you can get access to FlixFeast website, it is legal in your area. According to copyright attorneys,
            streaming movies and TV shows online is not illegal but downloading and sharing pirated files are.
            Therefore, you should protect yourself by using a reliable VPN to download files anonymously.</p>
    </div>
    <div class="aboutus">
            <p id="matches"><span style="font-size: 16px;"><strong>Is FlixFeast safe?</strong></span><br>
            Although FlixFeast is newly-created, please rest assured about its security. This is an ad-free website that
            doesn’t ask for your information to sign up or download any apps, extensions and such to stream movies.
            Hence FlixFeast keeps you from common Internet risks such as data loss, identity theft, etc, which allows
            you to enjoy your movie night risk-free.<br>
            In addition to the above features, we also offer:<br>
            - Clean and optimized UX &amp; UI<br>
            - Mobile friendly, Chromecast and Android supported<br>
            - Best customer service – able to request titles<br>
            - Adjustable. HD Resolution (720p)<br>
            - No ads, pop-ups, commercials<br>
            - No registration<br>
            - Completely free!</p>

        <p>Give us a rating, if you have time!</p>
        <p id="addrating"></p>
    </div>

	<footer>
		<p>&copy; 2023 FlixFeast. All rights reserved.</p>
		<p>Made with commitment by BBEÇ.</p>
	</footer>
</body>
</html>