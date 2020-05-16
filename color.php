<?php
session_start();
if(isset($_SESSION['username'])){
	include 'config.php';
	$qry = "SELECT * FROM color";
	$run = mysqli_query($conn,$qry);
}
	/*for fetching data from database to table */
	/* else wala code check krna hai baad me*/
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style_table.css">
</head>
<body>
	<h2><a href="dashboard.php">Home page</a></h2>
	<h1>Colors</h1>
	<table class="table">
		<tr>
			<th>Color ID</th>
			<th>Color Name</th>
			<th>Action </th>
		</tr>
		<?php
		
			while($rows = mysqli_fetch_assoc($run))
		{
			if (mysqli_num_rows($run)>0) {
				foreach ($run as $value) {

					?>
					<tr>
						<td><?php echo $value['color_id']; ?></td>
						<td><?php echo $value['color_name']; ?></td>						
						<td>
							<a href="update_color.php?id=<?php echo $value['color_id']; ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
	
							<a href="delete_color.php?id=<?php echo $value['color_id']; ?>" onclick="return confirm('Are you sure ?')" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
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