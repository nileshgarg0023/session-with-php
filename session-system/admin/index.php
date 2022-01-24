<?php
include_once("../config/database.php");
session_start();
if(isset($_GET['email']))
{
if(isset($_SESSION['id']))
{
$query = "Select * from session where session_id='".$_SESSION['id']."'";
$result = $mysqli->query($query);
if($result->num_rows > 0)
{
$row=$result->fetch_row();
$current_time=date("h:i");
if($current_time>$row[3])
{
$mysqli->query("Delete from session where session_id=".$_SESSION['id']);
die("Your session is expired");
}
$email = $row[0];
//$result = $mysqli->query("Select * from users where email='$email'");
//$row=$result->fetch_row();
echo "<center><h3>Welcome to Administrator Page</h3>" ;
echo "<a href='http://localhost/session_handling/index.php?sess_id=".$_SESSION['id']."'>Home</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<a href='http://localhost/session_handling/index.php?v=logout>Logout</a></center>";
}
else
{
$query = "Select firstname,lastname,email from users where email='".$_GET['email']."'";
$result = $mysqli->query($query);
$row=$result->fetch_assoc();
echo "<center><br/><br/><h3>Welcome to Administrator Page</h3>" ;
echo "<a href='http://localhost/session_handling/index.php?sess_id=".$_SESSION['id']."'>Home</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<a href='http://localhost/session_handling/index.php?v=logout'>Logout</a></center>";
$login_time=date("h:i");
//expired_time = date("h:i", strtotime('+30 minutes', strtotime("now")));
$insqry="Insert into session set login_time='$login_time', email='".$_GET['email']."',session_id='".$_SESSION['id']."'";
$result = $mysqli->query($insqry);
}
}
else
die ("Your session is expired");
}
else
echo "<center><h2>You are not logged in or your session is expired</h2></center>";
?>