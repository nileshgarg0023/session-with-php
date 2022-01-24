<?php

include("../config/database.php");

$query = "Select * from users where email='".$_POST['email']."'";
$result = $mysqli->query($query);
if($result->num_rows > 0)
{
echo true;
}
else
echo false;
