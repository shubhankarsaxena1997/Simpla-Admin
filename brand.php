<?php
session_start();
if(isset($_SESSION['username'])){
	include 'config.php';
	$qry = "SELECT * FROM brand";
	$run = mysqli_query($conn,$qry);
}
	/*for fetching data from database to table */
	/* else wala code check krna hai baad me*/
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style_table.css">
</head>
<body>
	<a href="dashboard.php"><h2>Home page</h2></a>
	<h1>Brands</h1>
	<table class="table">
		<tr>
			<th>Brand ID</th>
			<th>Brand Name</th>
			<th>Action </th>
		</tr>
		<?php
		
			while($rows = mysqli_fetch_assoc($run))
		{
			if (mysqli_num_rows($run)>0) {
				foreach ($run as $value) {

					?>
					<tr>
						<td ><?php echo $value['brand_id']; ?></td>
						<td><?php echo $value['brand_name']; ?></td>						
						<td>
							<a href="update_brand.php?id=<?php echo $value['brand_id']; ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
							
							<a href="delete_brand.php?id=<?php echo $value['brand_id']; ?>" onclick="return confirm('Are you sure ?')" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
						</td>
					</tr>
										
					<?php
				}
			}
		}
		?>
	</table>
</body>
</html>