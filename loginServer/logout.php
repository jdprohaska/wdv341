<?php 
//use current session
session_start();

//user is not longer a valid user
$_SESSION["validUser"] = "no";

//remove session variables
session_unset();

//remove current session
session_destroy();

//redirect to login page
header('location: login.php');
?>