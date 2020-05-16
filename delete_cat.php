<?php
include("config.php");

	
	$id= $_GET['cid'];
	$sql = "DELETE FROM category WHERE cat_id = '$id'";
	$data = mysqli_query($conn,$sql);
	header('location:category.php');
	?>
