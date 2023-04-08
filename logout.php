<?php
// start the session
session_start();

// unset the session variable
unset($_SESSION['user_logged_in']);

// destroy the session
session_destroy();

// redirect the user to the home page or login page
header('Location: index.php');
exit;
?>