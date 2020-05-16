<?php
session_start();
if (isset($_SESSION['username'])) {
	include ('config.php');
	$id = $_GET['id'];
	$qry = "SELECT * FROM brand WHERE brand_id='$id'";
	$data = mysqli_query($conn,$qry);
	$res = mysqli_fetch_assoc($data);
	if (isset($_POST['submit'])) {
		include('config.php');
		$brand_name = $_POST['name'];
			$sql = "UPDATE brand SET brand_name='$brand_name' WHERE brand_id='$id'";
			$run = mysqli_query($conn,$sql);
			if(!$run){
				echo "Error occured!";
			}
			else{
				header('location:brand.php');
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
				  	<h2 style="text-align: center;text-decoration: underline;">Update brand</h2>
				    <label for="brandname">Brand Name:</label>
				    <input type="text" class="form-control" name="name" value="<?php echo $res['brand_name'];?>">
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary">Update brand</button>
				</form>
			</div>	
		</div>
	</div>
</body>
</html>	