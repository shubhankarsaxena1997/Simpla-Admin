<?php
include("config.php");

	
	$id= $_GET['id'];
	$sql = "DELETE FROM color WHERE color_id = '$id'";
	$data = mysqli_query($conn,$sql);
	header('location:color.php');
	?>
