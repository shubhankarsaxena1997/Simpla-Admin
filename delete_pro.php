<?php
include("config.php");

	
	$id= $_GET['ID'];
	$sql = "DELETE FROM  product WHERE product_id = '$id'";
	$data = mysqli_query($conn,$sql);
	header('location:dashboard.php');
	?>
