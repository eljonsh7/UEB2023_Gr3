<?php session_start(); ?>
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
        margin: 20% 35.4%;
    }
    .signup-box{
        margin: 12% 35.4%;
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
                                echo '<a href="user.php?mode=info">Profile <i class="icofont icofont-simple-down"></i></a>
                                            <ul>
                                                <li><a href="user.php?mode=edit">Edit</a></li>';
                                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                                    echo '<li><a class="dashboard" href="dashboard/dashboard.php" target="_blank">Dashboard</a></li>';
                                }
                                echo '<li><a href="logout.php">Sign out</a></li>';

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
            liveSearch();
            if (document.getElementById('live_search').value.length >= 2) {
                document.getElementById('submit').disabled = false;

            } else {
                document.getElementById('submit').disabled = true;
            }
        });

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
<div class="login-area signup-area" style="z-index: 10000;">
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
            <input style="color: white;" type="password" id="password-field-login" name="password-field-login" class="field input" required placeholder="Password" />
            <!-- <div class="login-remember">
                <input style="color: white;" type="checkbox" />
                <span style="color: white;">Remember Me</span>
            </div> -->
            <button class="theme-btn" name="logInForm">LOG IN</button>
            <!-- <span>Or Via Social</span>
            <div class="login-social">
                <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                <a href="#"><i class="icofont icofont-camera"></i></a>
            </div> -->
        </form>
    </div>
</div>
<div class="login-area" style="z-index: 10000;">
    <div class="login-box signup-box" style="background-color: #13151f; color: white;">
        <a href="#"><i class="icofont icofont-close"></i></a>
        <h2 style="color: white;">SIGN UP</h2>
        <form method="post">
            <input type="hidden" name="signUpForm" value="1">
            <h6 style="color: white;">FIRST NAME</h6>
            <input style="color: white;" type="text" id="firstname-field" name="firstname-field" class="field input" required />
            <h6 style="color: white;">LAST NAME</h6>
            <input style="color: white;" type="text" id="lastname-field" name="lastname-field" class="field input" required />
            <h6 style="color: white;">USERNAME</h6>
            <input style="color: white;" type="text" id="username-field" name="username-field" class="field input" required />
            <h6 style="color: white;">EMAIL ADDRESS</h6>
            <input style="color: white;" type="email" id="email-field" name="email-field" class="field input" required />
            <h6 style="color: white;">BIRTHDATE</h6>
            <input style="color: white; width:100%;" type="date" id="birthdate-field" name="birthdate-field" class="field input" required />
            <h6 style="color: white;">PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field" name="password-field" class="field input" required onkeyup="verifyPassword()" />
            <p id="all" style="display: none; justify-content: center; color: white; font-size:small;">Password must contain at least one
                capital
                letter, one digit and must be at least 8 characters long!</p>
            <h6 style="color: white;">CONFIRM PASSWORD</h6>
            <input style="color: white;" type="password" id="password-field2" name="password-field2" class="field input" required onkeyup="verifyPassword()" />
            <p id="isItSame" style="display: none; justify-content: center; font-size:small;" style="color: white;">Passwords don't match
            </p>
            <!-- <div style="color: white;" class="login-remember">
                <input type="checkbox" />
                <span style="color: white;">Remember Me</span>
            </div> -->
            <button class="theme-btn" id="sign-up" disabled style="color: white;">SIGN UP</button>
            <!-- <span style="color: white;">Or Via Social</span>
            <div class="login-social">
                <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                <a href="#"><i class="icofont icofont-camera"></i></a>
            </div> -->
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

    // $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE Email = ? OR Username = ?");
    // mysqli_stmt_bind_param($stmt, 'ss', $email, $username);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);

    // $stmt1 = mysqli_prepare($conn, "SELECT * FROM users WHERE Username = ?");
    // mysqli_stmt_bind_param($stmt1, 's', $username);
    // mysqli_stmt_execute($stmt1);
    // $result1 = mysqli_stmt_get_result($stmt1);

    if (mysqli_num_rows($result) == 0) {
        $token = bin2hex(random_bytes(32));
        $salt = bin2hex(random_bytes(16));
        $hashed_token = hash('sha256', $token . $salt);

        $salt2 = bin2hex(random_bytes(16));
        $accountID = bin2hex(random_bytes(32));
        $hashed_accID = hash('sha256', $accountID . $salt2);
        $hashed_accountID = substr($hashed_accID,0,16);

        $hashed_password = hash('sha256', $password);

        $stmt = mysqli_prepare($conn, "SELECT * FROM `temporary users` WHERE Email = ?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 0){
            require_once("Services/config.php");
            require("Services/vendor/autoload.php");
            $SGemail = new \SendGrid\Mail\Mail();
            $SGemail->setFrom("flixfeastt@gmail.com", "FlixFeast");
            $SGemail->setTemplateId("d-b86719bb7e9a4cafbd0ef38bd39bb15c");
            $SGemail->addDynamicTemplateData('username', $username);
            $SGemail->addDynamicTemplateData('actToken', $hashed_token);
            $SGemail->addDynamicTemplateData('accID', $hashed_accountID);
            $SGemail->addTo($email, "Example User");
            $sendgrid = new \SendGrid( SENDGRID_API_KEY );
            try {
                $response = $sendgrid->send($SGemail);
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
            $stmt = $conn->prepare("INSERT INTO `temporary users` (ID,Birthdate, Username, Email, `Password`, ActToken, FirstName, LastName) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $hashed_accountID, $birthdate, $username, $email,$hashed_password, $hashed_token, $firstname,$lastname);
            $stmt->execute();
        }else{
            echo '<script>$(".login-area").show();
            document.getElementById("firstname-field").value="' . $firstname. '";
            document.getElementById("lastname-field").value="' . $lastname. '";
            document.getElementById("username-field").value="' . $username. '";
            document.getElementById("email-field").value="' . $email. '";
            document.getElementById("birthdate-field").value="' . $birthdate. '";
            document.getElementById("password-field").value="' . $password. '";
            document.getElementById("password-field2").value="' . $password. '";
            </script>';
            $_POST['message']="Please check your email for verification, cannot continue to register again!";
            include('notify.php');
        }
        
        
    } else {
        echo '<script>$(".login-area").show();
        document.getElementById("firstname-field").value="' . $firstname. '";
        document.getElementById("lastname-field").value="' . $lastname. '";
        document.getElementById("username-field").value="' . $username. '";
        document.getElementById("email-field").value="' . $email. '";
        document.getElementById("birthdate-field").value="' . $birthdate. '";
        document.getElementById("password-field").value="' . $password. '";
        document.getElementById("password-field2").value="' . $password. '";
        </script>';
        $_POST['message']="Username or E-mail already in use";
        include('notify.php');
    }
}
if (isset($_GET['activation_token'])) {
    $tempAccID = $_GET['accountID'];

    $stmt = $conn->prepare("SELECT * FROM `temporary users` WHERE ID = ?");
    $stmt->bind_param('s', $tempAccID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    $tempUsername = $row['Username'];
    $tempEmail = $row['Email'];
    $tempPassword = $row['Password'];
    $tempBirthdate = $row['Birthdate'];
    $tempToken = $row['ActToken'];
    $tempFirstname = $row['FirstName'];
    $tempLastname = $row['LastName'];

    if ($_GET['activation_token'] == $tempToken) {
        // $hashed_password = password_hash($tempPassword);
        $stmt = $conn->prepare("INSERT INTO users (Birthdate,Username, Email,`Password`, FirstName, LastName) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss",$tempBirthdate, $tempUsername, $tempEmail, $tempPassword, $tempFirstname, $tempLastname);
        $stmt->execute();

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>console.log('Data inserted successfully!')</script>";
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user'] = false;
            unlink("tempReg.txt");
            echo '<script>window.location.href = "index.php";</script>';
            $tempToken = "";
            $stmt = $conn->prepare("DELETE FROM `temporary users` WHERE ID = ?");
            $stmt->bind_param('s', $tempAccID);
            $stmt->execute();
        } else {
            echo "<script>console.log('Error inserting data')</script>";
        }
        
    }
}
?>
<?php
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
            echo '<script>window.location.href = "index.php";</script>';
        } else {
            echo "<script>document.getElementById('warn').style = 'flex';</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
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