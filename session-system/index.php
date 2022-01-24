<?php
// core configuration
include_once "config/core.php";
include_once "config/database.php";
// include login checker
$require_login=true;
//include_once "login_checker.php";
if(isset($_GET['v']))
{
$sid= session_id();
$mysqli->query("Delete from session where session_id='$sid'");
session_unset();
session_destroy();
}
// include page header HTML
include_once 'header.php';
 
echo "<div class='col-md-12'>";
// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
// if login was successful
if($action=='login_success'){
echo "<div class='alert alert-info'>";
echo "<strong>Hi " . $_SESSION['firstname'] . ", welcome back!</strong>";
echo "</div>";
}
// if user is already logged in, shown when user tries to access the login page
else if($action=='already_logged_in'){
echo "<div class='alert alert-info'>";
echo "<strong>You are already logged in.</strong>";
echo "</div>";
}
echo "</div>";
// footer HTML and JavaScript codes
include 'footer.php';

?>