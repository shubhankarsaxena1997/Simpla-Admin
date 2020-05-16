<?php

$base_url = "http://localhost/training/PHP/";


$servername = "localhost";
$username = "root";
$password = "";
$dbname= "user_db";
$edit_state = false;


$conn =mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
	echo "Connection failed";
}
else{
	echo '';
}

?>

