<?php
include("config.php");

	
	$id= $_GET['id'];
	$sql = "DELETE FROM tag WHERE tag_id = '$id'";
	$data = mysqli_query($conn,$sql);
	header('location:tag.php');
	?>
