<?php
include_once("../config/database.php");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$query = "Insert into users set firstname='$fname',lastname='$lname', contact_number='$contact', email='$email', password='$password'";
$result = $mysqli->query($query);
if($mysqli->affected_rows > 0 )
echo 1;
else
echo 0;
?>