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

    #searchresult a:hover h6 {
        transition: 0.6s;
        color: #00d9e1;
    }


    #searchresult a:hover~a h6 {
        transition: 0.6s;
        color: #00d9e1;
    }

    .login-box {
        position: fixed;
        /* left: 35.85%; */
        width: 100%;
        margin: 19% 35.4%;
    }

    .signup-box {
        margin: 10% 35.5%;
    }

    ::-webkit-scrollbar {
        background-color: #13151f;
        width: 5px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #3a444f;
        border-radius: 10px;
    }
</style>

</script>

<header class="header" id="header" style="background-color: rgba(18,21,30, 0.9)">
    <div class="container">
        <div class="header-area">
            <div class="img-fluid logo">
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
                            <?php
                            if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
                                echo '<a href="user.php?mode=info" class="profileo">Profile <i class="icofont icofont-simple-down"></i></a>
                                            <ul>
                                                <li><a href="user.php?mode=edit" class="edito">Edit</a></li>
                                                <li><a href="watchlist.php" class="watchlisto">Watchlist</a></li>';
                                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                                    echo '<li><a class="dashboard" href="dashboard/dashboard.php">Dashboard</a></li>';
                                }
                                echo '<li><a href="Services/logout.php">Sign out</a></li>';

                                echo '</ul>';
                            } else {
                                echo '<a href="#">Profile <i class="icofont icofont-simple-down"></i></a>
                                            <ul>
                                                <li><a href="" class="signup-popup">Log in</a></li>
                                                <li><a href="" class="login-popup">Sign up</a></li>
                                            </ul>';
                            }
                            ?>
                        </li>
                        <li>
                            <form style="display: flex;" method="get" action="results.php" id="myForm">
                                <input type="text" name="search" placeholder="Search..." class="form-control" id="live_search" autocomplete="off">
                                <input type="submit" name="" value="Go" id="submit" style="visibility: hidden;">

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
        function liveSearch(clear) {
            var input = $('#live_search').val();
            if (input.length >= 2) {
                document.getElementById("submit").style.visibility = "visible";
                $.ajax({
                    url: "Services/livesearch.php",
                    method: "POST",
                    data: {
                        input: input,
                        clear: clear
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
            liveSearch(false);
            if (document.getElementById('live_search').value.length >= 2) {
                document.getElementById('submit').disabled = false;

            } else {
                document.getElementById('submit').disabled = true;
            }
        });
        document.getElementById('live_search').addEventListener('blur', function() {
            this.removeEventListener('input', liveSearch(false));
            this.addEventListener('input', liveSearch(true));
            document.removeEventListener('click', handleClickOutside);
        });

        function handleClickOutside(event) {
            if (!event.target.closest('#live_search')) {
                document.getElementById('searchResults').style.display = 'none';
            }
        }

        function submitForm() {
            var form = document.getElementById('myForm');

            form.submit();
        }
    </script>
    <!-- <script>
        var anchorTag = document.getElementById('myAnchorTag');

        anchorTag.addEventListener('click', function(event) {

            var form = document.getElementById('myForm');

            form.submit();
        });
    </script> -->
</header>
<div class="login-area signup-area login-form" style="z-index: 10000;">
    <div class="login-box" style="background-color: #13151f; color: white;">
        <a href="#"><i class="icofont icofont-close"></i></a>
        <h2 style="color: white;">LOG IN</h2>
        <form method="post" style="color: white;">
            <input type="hidden" name="logInForm" value="1">
            <div role="alert" class="alert alert-danger" id="warn" style="display: none;">Email or password is invalid.
            </div>
            <h6 style="color: white;">EMAIL ADDRESS</h6>
            <input type="text" id="email-field-login" name="email-field-login" style="color: white;" />
            <h6 style="color: white;">PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field-login" name="password-field-login" class="field input" required />
            <div class="login-remember">
                <input id="remember-checkbox" style="color: white;" type="checkbox" name="remember-checkbox" />
                <span style="color: white;">Remember Me</span>
            </div>
            <button class="theme-btn" name="logInForm">LOG IN</button>
        </form>
    </div>
</div>
<div class="login-area" style="z-index: 10000;">
    <div class="login-box signup-box" style="background-color: #13151f; color: white;">
        <a href="#"><i class="icofont icofont-close"></i></a>
        <h2 style="color: white;">SIGN UP</h2>
        <form method="post">
            <input type="hidden" name="signUpForm" value="1">
            <div style="display: flex;">
                <div>
                    <h6 style="color: white;">FIRST NAME</h6>
                    <input style="color: white;" type="text" id="firstname-field" name="firstname-field" class="field input" required />
                </div>
                <div>
                    <h6 style="color: white;">LAST NAME</h6>
                    <input style="color: white;" type="text" id="lastname-field" name="lastname-field" class="field input" required />
                </div>
            </div>
            <div style="display: flex;">
                <div>
                    <h6 style="color: white;">USERNAME</h6>
                    <input style="color: white;" type="text" id="username-field" name="username-field" class="field input" required />
                </div>
                <div>
                    <h6 style="color: white;">BIRTHDATE</h6>
                    <input style="color: white; height:46%;" type="date" id="birthdate-field" name="birthdate-field" class="field input" required />
                </div>
            </div>
            <h6 style="color: white;">EMAIL ADDRESS</h6>
            <input style="color: white;" type="email" id="email-field" name="email-field" class="field input" required />
            <h6 style="color: white;">PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field" name="password-field" class="field input" required onkeyup="verifyPassword()" />
            <p id="all" style="display: none; justify-content: center; color: white; font-size:small;">Password must
                contain at least one
                capital
                letter, one digit and must be at least 8 characters long!</p>
            <h6 style="color: white;">CONFIRM PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field2" name="password-field2" class="field input" required onkeyup="verifyPassword()" />
            <p id="isItSame" style="display: none; justify-content: center; font-size:small;" style="color: white;">
                Passwords don't match
            </p>
            <button class="theme-btn" id="sign-up" disabled style="color: white;">SIGN UP</button>
        </form>
    </div>
</div>
<?php
include("Services/connection.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signUpForm'])) {
    $username = $_POST['username-field'];
    $email = $_POST['email-field'];
    $password = $_POST['password-field'];
    $birthdate = $_POST['birthdate-field'];
    $firstname = $_POST['firstname-field'];
    $lastname = $_POST['lastname-field'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ? OR Username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 0) {
        $token = bin2hex(random_bytes(32));
        $salt = bin2hex(random_bytes(16));
        $hashed_token = hash('sha256', $token . $salt);

        $salt2 = bin2hex(random_bytes(16));
        $accountID = bin2hex(random_bytes(32));
        $hashed_accID = hash('sha256', $accountID . $salt2);
        $hashed_accountID = substr($hashed_accID, 0, 16);

        $hashed_password = hash('sha256', $password);

        $stmt = mysqli_prepare($conn, "SELECT * FROM `temporary users` WHERE Email = ?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 0) {
            require_once("Services/config.php");
            require("Services/vendor/autoload.php");
            $SGemail = new \SendGrid\Mail\Mail();
            $SGemail->setFrom("flixfeastt@gmail.com", "FlixFeast");
            $SGemail->setTemplateId("d-b86719bb7e9a4cafbd0ef38bd39bb15c");
            $SGemail->addDynamicTemplateData('username', $username);
            $SGemail->addDynamicTemplateData('actToken', $hashed_token);
            $SGemail->addDynamicTemplateData('accID', $hashed_accountID);
            $SGemail->addTo($email, "Example User");
            $sendgrid = new \SendGrid(SENDGRID_API_KEY);
            try {
                $response = $sendgrid->send($SGemail);
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
            $stmt = $conn->prepare("INSERT INTO `temporary users` (ID,Birthdate, Username, Email, `Password`, ActToken, FirstName, LastName, Created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->bind_param("ssssssss", $hashed_accountID, $birthdate, $username, $email, $hashed_password, $hashed_token, $firstname, $lastname);
            $stmt->execute();
            $message = "Please check your email for verification!";
            include('Services/notify.php');
        } else {
            echo '<script>$(".login-area").show();
            document.getElementById("firstname-field").value="' . $firstname . '";
            document.getElementById("lastname-field").value="' . $lastname . '";
            document.getElementById("username-field").value="' . $username . '";
            document.getElementById("email-field").value="' . $email . '";
            document.getElementById("birthdate-field").value="' . $birthdate . '";
            document.getElementById("password-field").value="' . $password . '";
            document.getElementById("password-field2").value="' . $password . '";
            </script>';
            $message = "Please check your email for verification, cannot continue to register again!";
            include('Services/notify.php');
        }
    } else {
        echo '<script>$(".login-area").show();
        document.getElementById("firstname-field").value="' . $firstname . '";
        document.getElementById("lastname-field").value="' . $lastname . '";
        document.getElementById("username-field").value="' . $username . '";
        document.getElementById("email-field").value="' . $email . '";
        document.getElementById("birthdate-field").value="' . $birthdate . '";
        document.getElementById("password-field").value="' . $password . '";
        document.getElementById("password-field2").value="' . $password . '";
        </script>';
        $message = "Username or E-mail already in use";
        include('Services/notify.php');
    }
}
if (isset($_GET['activation_token']) && isset($_GET['accountID'])) {
    $tempAccID = $_GET['accountID'];
    $tempToken = 0;
    $stmt = $conn->prepare("SELECT * FROM `temporary users` WHERE ID = ?");
    $stmt->bind_param('s', $tempAccID);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $tempUsername = $row['Username'];
        $tempEmail = $row['Email'];
        $tempPassword = $row['Password'];
        $tempBirthdate = $row['Birthdate'];
        $tempToken = $row['ActToken'];
        $tempFirstname = $row['FirstName'];
        $tempLastname = $row['LastName'];
    }


    if ($_GET['activation_token'] == $tempToken) {
        // $hashed_password = password_hash($tempPassword);
        $photo = "assets/img/user_pic/default.png";
        $stmt = $conn->prepare("INSERT INTO users (Birthdate,Username, Email,`Password`, FirstName, LastName, Photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $tempBirthdate, $tempUsername, $tempEmail, $tempPassword, $tempFirstname, $tempLastname, $photo);
        $stmt->execute();

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>console.log('Data inserted successfully!')</script>";
            $_SESSION['user_logged_in'] = true;
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE Email = ?");
            $stmt->bind_param('s', $tempEmail);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $user['ID'];
            $_SESSION['admin'] = $user['Admin'];
            $_SESSION['profilePic'] = $user['Photo'];
            unlink("tempReg.txt");
            echo '<script>window.location.href = "index.php";</script>';
            $tempToken = "";
            $stmt = $conn->prepare("DELETE FROM `temporary users` WHERE ID = ?");
            $stmt->bind_param('s', $tempAccID);
            $stmt->execute();
            $message = "Registration completed, enjoy our website!";
            include('Services/notify.php');
        } else {
            $message = "Something went wrong, please try again!";
            include('Services/notify.php');
        }
    } else {
        $message = "The activation token is invalid!";
        include('Services/notify.php');
    }
}
if (isset($_POST['logInForm'])) {
    $email = $_POST['email-field-login'];
    $password = $_POST['password-field-login'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE Email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $PW_Hashed = hash('sha256', $password);
        $PW_Database = $user['Password'];
        if ($PW_Hashed === $PW_Database) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user'] = $user['ID'];
            $_SESSION['admin'] = $user['Admin'];
            $cookieID = $user['ID'];

            if (isset($_POST['remember-checkbox'])) {
                $_SESSION['settingRememberCookie'] = true;
                echo '<script>window.location="http://localhost/UEB2023_Gr3/index.php?cookieID=' . $cookieID . '";</script>';
            }
            echo '<script>window.location="index.php"</script>';
        } else {
            echo '<script>$(".login-form").show();
            document.getElementById("email-field-login").value="' . $email . '";
            </script>';
            $message = "Password is incorrect!";
            include("Services/notify.php");
        }
    } else {
        echo '<script>$(".login-form").show();
            </script>';
        $message = "There is no registered user with the email you have entered!";
        include("Services/notify.php");
    }
}

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

        if (password1.length != 0) {
            if (!passwordRegex.test(password1)) {
                allMessage.style.display = "flex";
                allMessage.style.color = "red";
            } else {
                allMessage.style.display = "none";
            }
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
        } else {
            errorMessage.style.display = "none";
        }

        signUpButton.disabled = !isPasswordValid;
    }
</script>
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