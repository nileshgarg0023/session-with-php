<?php
include("../config/core.php");
include("../config/database.php");
$pass=md5($_POST['lpassword']);
$query = "Select * from users where email='".$_POST['lemail']."' and "."password='".$pass."' and status=1";
//$query="Select * from users where email='fahmida@gmail.com' and password='111111'";
$result = $mysqli->query($query);
if($result->num_rows == 0)
{
echo false;
}
else
{
$mysqli->query("delete from session where email=".$_POST['lemail']);
session_unset();
session_destroy();
session_start();
$row=$result->fetch_assoc();
$_SESSION['email']=$row['email'];
$_SESSION['id']=session_id();
$_SESSION['firstname']=$row['firstname'];
if($row['type'] == 'admin')
echo $home_url."admin/index.php?email=".$row['email'];
else
echo $home_url."users/user.php?email=".$row['email'];
}
?>