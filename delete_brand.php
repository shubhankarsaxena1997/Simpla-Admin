<?php
include("config.php");

	
	$id= $_GET['id'];
	$sql = "DELETE FROM brand WHERE brand_id = '$id'";
	$data = mysqli_query($conn,$sql);
	header('location:brand.php');
	?>
