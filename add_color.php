<?php
session_start();
if(isset($_SESSION['username'])){
	if (isset($_POST['submit'])) {
	include ('config.php');

	$color = $_POST['name'];
	$qry = "INSERT INTO color VALUES (color_id,'$color')";
	$run = mysqli_query($conn,$qry);
	if ($run) {
		header('location:dashboard.php');
	}
	else{
		echo "Error occured";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-field">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<form action="" method="post">
				  <div class="form-group">
				  	<h2 style="text-align: center;text-decoration: underline;">Add Color</h2>
				    <label for="colorname">Color Name:</label>
				    <input type="text" class="form-control" name="name" placeholder="Enter color name">
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary">Add color</button>
				</form>
			</div>	
		</div>
	</div>
</body>
</html>