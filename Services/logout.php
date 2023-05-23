<?php
// start the session
session_start();

// unset the session variable
unset($_SESSION['user_logged_in']);
unset($_SESSION['user']);
setcookie('ID', '', time() - 3600, "/");

// destroy the session
session_destroy();

// redirect the user to the home page or login page
header('Location: ../index.php?signout=1');
exit;

?>