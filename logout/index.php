<?php
include("../includes/dbconn.php");

date_default_timezone_set('Europe/Helsinki');
// Logout and destroy the session;
session_start();
// destroy the cookie
//if (isset($_COOKIE['auto_licenta'])) {   
    //deleteRememberMeCookie($db, $_SESSION['sess_user_email']);
//}
// destroy the session
session_destroy();
// go back to the login page
header("Location:../login/");
exit;
?>