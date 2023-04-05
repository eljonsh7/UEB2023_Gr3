<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
.header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
    transition: top 0.3s;
}

.header.hide {
    top: -100px;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    header.classList.remove('hide');
});

let prevScrollPos = window.pageYOffset;

window.addEventListener('scroll', () => {
    const currentScrollPos = window.pageYOffset;
    const header = document.querySelector('.header');

    if (prevScrollPos > currentScrollPos) {
        // scrolling up
        header.classList.remove('hide');
    } else {
        // scrolling down
        header.classList.add('hide');
    }

    prevScrollPos = currentScrollPos;
});
</script>

</script>
<header class="header" id="header">
    <div class="container">
        <div class="header-area">
            <div class="logo">
                <a href="index.php"><img src="assets/img/logo.png" alt="logo" /></a>
            </div>

            <div class="menu-area">
                <div class="responsive-menu"></div>
                <div class="mainmenu">
                    <ul id="primary-menu">
                        <li><a class="home" href="index.php">Home</a></li>
                        <li><a class="movies" href="movies.php">Movies</a></li>
                        <li><a class="tv" href="tv-shows.php">Tv Shows</a></li>
                        <li><a class="imdb" href="imdb.php">Top IMDb</a></li>
                        <li>
                            <?php if (false) { ?>
                            <a href="#">Profile <i class="icofont icofont-simple-down"></i></a>
                            <ul>
                                <li><a href="" class="signup-popup">Edit</a></li>
                                <li><a href="" class="login-popup">Sign out</a></li>
                            </ul>
                            <?php } else { ?>
                            <a href="#">Profile <i class="icofont icofont-simple-down"></i></a>
                            <ul>
                                <li><a href="" class="signup-popup">Log in</a></li>
                                <li><a href="" class="login-popup">Sign up</a></li>
                            </ul>
                            <?php } ?>
                        </li>
                        <li>
                            <form style="display: flex;" method="post" action="results.php" id="myForm">
                                <input type="text" name="search" placeholder="Search..." class="form-control"
                                    id="live_search" autocomplete="off" onkeyup="liveSearch()" onchange="liveSearch()">
                                <input type="submit" name="submit" value="Go" id="submit" style="visibility: hidden;">

                            </form>
                            <div id="searchresult" style="display: flex; justify-content: left;">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function liveSearch() {
        var input = $('#live_search').val();
        if (input.length >= 2) {
            document.getElementById("submit").style.visibility = "visible";
            $.ajax({
                url: "livesearch.php",
                method: "POST",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#searchresult").html(data);
                }
            });
        } else {
            document.getElementById("submit").style.visibility = "hidden";
            $("#searchresult").html("");
        }
    }

    document.getElementById('live_search').addEventListener('input', function() {
        if (document.getElementById('live_search').value.length >= 2) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    });
    </script>
    <!-- <script>
        var anchorTag = document.getElementById('myAnchorTag');

        anchorTag.addEventListener('click', function(event) {

            var form = document.getElementById('myForm');

            form.submit();
        });
    </script> -->
</header>
<div class="login-area signup-area">
    <div class="login-box" style="background-color: #13151f; color: white;">
        <a href="#"><i class="icofont icofont-close"></i></a>
        <h2 style="color: white;">LOG IN</h2>
        <form action=" #" style="color: white;">
            <h6 style="color: white;">EMAIL ADDRESS</h6>
            <input type="text" id="email-field-login" style="color: white;" />
            <h6 style="color: white;">PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field-login" class="field input" required
                placeholder="Password" />
            <div class="login-remember">
                <input style="color: white;" type="checkbox" />
                <span style="color: white;">Remember Me</span>
            </div>
            <button class="theme-btn" name="login_submit">LOG IN</button>
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
    <div class="login-box" style="background-color: #13151f; color: white;">
        <a href="#"><i class="icofont icofont-close"></i></a>
        <h2 style="color: white;">SIGN UP</h2>
        <form method="post">
            <h6 style="color: white;">USERNAME</h6>
            <input style="color: white;" type="text" id="username-field" name="username-field" class="field input"
                required />
            <h6 style="color: white;">EMAIL ADDRESS</h6>
            <input style="color: white;" type="email" id="email-field" name="email-field" class="field input"
                required />
            <h6 style="color: white;">PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field" name="password-field" class="field input"
                required onkeyup="verifyPassword()" />
            <p id="all" style="display: none; justify-content: center; color: white;">Password must contain at least one
                capital
                letter, one digit and must be at least 8 characters long!</p>
            <h6 style="color: white;">CONFIRM PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field2" name="password-field2" class="field input"
                required onkeyup="verifyPassword()" />
            <p id="isItSame" style="display: none; justify-content: center;" style="color: white;">Passwords don't match
            </p>
            <div style="color: white;" class="login-remember">
                <input type="checkbox" />
                <span style="color: white;">Remember Me</span>
            </div>
            <button class="theme-btn" id="sign-up" disabled style="color: white;">SIGN UP</button>
            <span style="color: white;">Or Via Social</span>
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
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'moviedb';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username-field'];
    $email = $_POST['email-field'];
    $password = $_POST['password-field'];

    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $stmt = mysqli_prepare($conn, "INSERT INTO users (Username, Email, Password, Active) VALUES (?, ?, ?, 1)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>console.log('Data inserted successfully!')";
    } else {
        echo "<script>console.log('Error inserting data')";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
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