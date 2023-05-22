<?php
// start the session
session_start();

// unset the session variable
unset($_SESSION['user_logged_in']);

if(isset($_SESSION['checked']) && $_SESSION['checked'] == false) {
    setcookie('email', '', time() - 3600, '/');
    setcookie('pass', '', time() - 3600, '/');
}

// destroy the session
session_destroy();

// redirect the user to the home page or login page
header('Location: ../index.php?signout=1');
exit;

?>